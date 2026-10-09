<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\JsonResponse;

class GlobalSearchController extends Controller
{
    /**
     * Perform global search across entertainments, seasons, and episodes
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->input('search', '');

        if (empty($query) || strlen($query) < 2) {
            return response()->json([
                'success' => false,
                'message' => 'Search query must be at least 2 characters long',
                'data' => [
                    'entertainments' => [],
                    'seasons' => [],
                    'episodes' => [],
                    'total' => 0
                ]
            ]);
        }

        try {
            // Search entertainments (movies/TV shows)
            $entertainments = Entertainment::where('status', 1)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->select(['id', 'name', 'thumbnail_url', 'type', 'slug'])
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'thumbnail_url' => $item->thumbnail_url ?? null,
                        'type' => $item->type,
                    ];
                });

            // Search seasons
            $seasons = Season::where('status', 1)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->with(['entertainmentdata:id,name,type'])
                ->select(['id', 'name', 'poster_url', 'entertainment_id', 'season_index'])

                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'poster_url' => $item->poster_url ?? null,
                        'entertainment_name' => $item->entertainmentdata ? $item->entertainmentdata->name : null,
                        'entertainment_type' => $item->entertainmentdata ? $item->entertainmentdata->type : null,
                        'season_index' => $item->season_index,
                        'result_type' => 'season'
                    ];
                });

            // Search episodes
            $episodes = Episode::where('status', 1)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->with([
                    'entertainmentdata:id,name,type',
                    'seasondata:id,name,season_index'
                ])
                ->select([
                    'id', 'name', 'poster_url',
                    'entertainment_id', 'season_id', 'episode_number'
                ])
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'poster_url' => $item->poster_url ?? null,
                        'entertainment_name' => $item->entertainmentdata ? $item->entertainmentdata->name : null,
                        'entertainment_type' => $item->entertainmentdata ? $item->entertainmentdata->type : null,
                        'season_name' => $item->seasondata ? $item->seasondata->name : null,
                        'season_index' => $item->seasondata ? $item->seasondata->season_index : null,
                        'episode_number' => $item->episode_number,
                        'result_type' => 'episode'
                    ];
                });

            $totalResults = $entertainments->count() + $seasons->count() + $episodes->count();

            return response()->json([
                'success' => true,
                'message' => 'Search completed successfully',
                'data' => [
                    'entertainments' => $entertainments,
                    'seasons' => $seasons,
                    'episodes' => $episodes,
                    'total' => $totalResults,
                    'query' => $query
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during search',
                'error' => $e->getMessage(),
                'data' => [
                    'entertainments' => [],
                    'seasons' => [],
                    'episodes' => [],
                    'total' => 0
                ]
            ], 500);
        }
    }

    /**
     * Get search suggestions (for autocomplete)
     */
    public function suggestions(Request $request): JsonResponse
    {
        $query = $request->input('q', '');
        $limit = $request->input('limit', 10);

        if (empty($query) || strlen($query) < 2) {
            return response()->json([
                'success' => false,
                'message' => 'Search query must be at least 2 characters long',
                'suggestions' => []
            ]);
        }

        try {
            $suggestions = collect();

            // Get entertainment suggestions
            $entertainmentSuggestions = Entertainment::where('status', 1)
                ->where('name', 'like', '%' . $query . '%')
                ->select(['name', 'type'])
                ->limit($limit)
                ->get()
                ->map(function ($item) {
                    return [
                        'text' => $item->name,
                        'type' => 'entertainment',
                        'subtype' => $item->type
                    ];
                });

            // Get season suggestions
            $seasonSuggestions = Season::where('status', 1)
                ->where('name', 'like', '%' . $query . '%')
                ->with(['entertainmentdata:id,name,type'])
                ->select(['name', 'entertainment_id'])
                ->limit($limit)
                ->get()
                ->map(function ($item) {
                    return [
                        'text' => $item->name . ($item->entertainmentdata ? ' (' . $item->entertainmentdata->name . ')' : ''),
                        'type' => 'season',
                        'subtype' => $item->entertainmentdata ? $item->entertainmentdata->type : null
                    ];
                });

            // Get episode suggestions
            $episodeSuggestions = Episode::where('status', 1)
                ->where('name', 'like', '%' . $query . '%')
                ->with([
                    'entertainmentdata:id,name,type',
                    'seasondata:id,name,season_index'
                ])
                ->select(['name', 'entertainment_id', 'season_id', 'episode_number'])
                ->limit($limit)
                ->get()
                ->map(function ($item) {
                    $context = [];
                    if ($item->entertainmentdata) {
                        $context[] = $item->entertainmentdata->name;
                    }
                    if ($item->seasondata) {
                        $context[] = 'S' . $item->seasondata->season_index;
                    }
                    if ($item->episode_number) {
                        $context[] = 'E' . $item->episode_number;
                    }

                    return [
                        'text' => $item->name . (!empty($context) ? ' (' . implode(' - ', $context) . ')' : ''),
                        'type' => 'episode',
                        'subtype' => $item->entertainmentdata ? $item->entertainmentdata->type : null
                    ];
                });

            $suggestions = $suggestions
                ->merge($entertainmentSuggestions)
                ->merge($seasonSuggestions)
                ->merge($episodeSuggestions)
                ->unique('text')
                ->take($limit);

            return response()->json([
                'success' => true,
                'suggestions' => $suggestions->values(),
                'query' => $query
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching suggestions',
                'error' => $e->getMessage(),
                'suggestions' => []
            ], 500);
        }
    }
}
