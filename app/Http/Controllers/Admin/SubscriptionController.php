<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Yajra\DataTables\DataTables;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Subscription::with(['user', 'plan'])->orderBy('id', 'desc')
                ->select('subscriptions.*');
            return DataTables::of($data)
                ->addColumn('user', function ($subscription) {
                    $user = $subscription->user;

                    $image = $user && $user->profile && $user->profile->profile_image
                        ? $user->profile->profile_image
                        : asset('backend/assets/images/profile_av.png');
                    $name = $user ? $user->name ?? 'N/A' : 'N/A';
                    return '<div class="d-flex align-items-center"><img src="' . $image . '" alt="' . $name . '" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">' . $name . '</div>';
                })
                ->editColumn('plan', function ($subscription) {
                    return $subscription->plan ? $subscription->plan->name ?? 'N/A' : 'N/A';
                })
               ->editColumn('date_subscribed', function ($subscription) {
                    return $subscription->start_date ? $this->formatDateWithOrdinal($subscription->start_date) : 'N/A';
                })
                ->editColumn('expiration_date', function ($subscription) {
                    return $subscription->end_date ? $this->formatDateWithOrdinal($subscription->end_date) : 'N/A';
                })
                ->editColumn('price', function ($subscription) {
                    return $subscription->amount ? number_format($subscription->amount, 2) : '0.00';
                })
                ->editColumn('tax', function ($subscription) {
                    return $subscription->tax_amount ? number_format($subscription->tax_amount, 2) : '0.00';
                })
                ->editColumn('total_amount', function ($subscription) {
                    return $subscription->total_amount ? number_format($subscription->total_amount, 2) : '0.00';
                })
                ->editColumn('status', function ($subscription) {
                    $status = $subscription->status ? 'Active' : 'Inactive';
                    return '<span class="badge bg-' . ($subscription->status ? 'success' : 'danger') . '">' . $status . '</span>';
                })
                ->rawColumns(['user', 'status'])
                ->toJson();
        }

        return view('subscriptions.index'); // Updated to match the folder structure
    }

    private function formatDateWithOrdinal($date)
    {
        $dateObj = new \DateTime($date);
        return $dateObj->format("d F Y");
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
