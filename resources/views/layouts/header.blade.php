<!-- start: project logo -->
<div class="px-md-4 px-2 pt-2 pb-2 auto border" data-bs-theme="none">
    <div>
        <div class="d-flex align-items-center justify-content-center pt-1">
            <button class="btn d-inline-flex d-xl-none border-0 p-0 pe-2 bars_button" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas_Navbar">
                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l16 0"></path>
                </svg>
            </button>
            <a href="{{ route('admin.dashboard.index') }}" class="brand-icon text-decoration-none d-flex align-items-center mh-brand">
                <span class="mh-mark"><span class="material-symbols-outlined">shield</span></span>
                <span class="mh-word">Movie<span>Hub</span></span>
            </a>
        </div>
    </div>
</div>

<!-- start: page header -->
<header class="px-md-4 px-2" data-bs-theme="none">
    <button class="btn d-none d-xl-inline-flex me-3 px-0 sidebar-toggle" type="button">
            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                <path d="M9 4v16"></path>
                <path d="M15 10l-2 2l2 2"></path>
            </svg>
    </button>
    <div class="d-flex justify-content-between align-items-center py-2 w-100">

        <div class="main-search me-md-4 w-50 d-none d-md-inline-flex mb-0 position-relative">
            <div class="w-100 position-relative">
                <svg class="svg-stroke search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
                <input type="text" class="form-control search-input" id="globalSearchInput" placeholder="Search movies, TV shows, episodes..." aria-label="Search...">
                <button type="button" class="btn btn-primary position-absolute end-0 top-0 h-100 search-button" style="border-radius: 0 0.375rem 0.375rem 0;" id="searchButton">
                    Search
                </button>

                <!-- Search Results Dropdown -->
                <div class="search-results-dropdown position-absolute w-100 bg-white border shadow-lg rounded-3 mt-1" id="searchResultsDropdown" style="display: none; z-index: 1050; max-height: 400px; overflow-y: auto;">
                    <div class="p-3">
                        <div class="search-loading text-center py-3" id="searchLoading" style="display: none;">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="ms-2">Searching...</span>
                        </div>

                        <div class="search-results" id="searchResults">
                            <!-- Results will be populated here -->
                        </div>

                        <div class="no-results text-center py-3 text-muted" id="noResults" style="display: none;">
                            <i class="bi bi-search" style="font-size: 2rem; opacity: 0.5;"></i>
                            <p class="mb-0 mt-2">No results found for "<span id="noResultsQuery"></span>"</p>
                            <small class="text-muted">Try different keywords or check spelling</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="header-menu flex-grow-1">
            <li class="nav-item py-2 py-md-1 col-auto">
                <div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
            </li>
            <li class="nav-item dropdown px-md-1">
                <a class="dropdown-toggle gray-6" href="#" id="bd-theme" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"
                        class="theme-icon-active">
                        <use href="#sun-fill"></use>
                    </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-2 p-xl-3 shadow rounded-4" aria-labelledby="bd-theme">
                    <li class="mb-1"><a class="dropdown-item rounded-pill" href="#"
                            data-bs-theme-value="light"><svg class="avatar xs me-2 opacity-50 theme-icon"
                                fill="currentColor">
                                <use href="#sun-fill"></use>
                            </svg> Light</a></li>
                    <li class="mb-1"><a class="dropdown-item rounded-pill active" href="#"
                            data-bs-theme-value="dark"><svg class="avatar xs me-2 opacity-50 theme-icon"
                                fill="currentColor">
                                <use href="#moon-stars-fill"></use>
                            </svg> Dark</a></li>
                    <li class="mb-1"><a class="dropdown-item rounded-pill" href="#"
                            data-bs-theme-value="auto"><svg class="avatar xs me-2 opacity-50 theme-icon"
                                fill="currentColor">
                                <use href="#circle-half"></use>
                            </svg> Auto</a></li>
                </ul>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16" style="display: none;">
                    <symbol id="sun-fill" viewBox="0 0 16 16">
                        <path
                            d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 0 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                    </symbol>
                    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                        <path
                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                        <path
                            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 antifungal 1.162c.173 .518 .579 .924 1.097 1.097l1.162 .387a.217 .217 0 0 1 0 .412l-1.162 .387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217 .217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217 .217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863 .099a.145 .145 0 0 1 .274 0l.258 .774c.115 .346 .386 .617 .732 .732l.774 .258a.145 .145 0 0 1 0 .274l-.774 .258a1.156 1.156 0 0 0-.732 .732l-.258 .774a.145 .145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145 .145 0 0 1 0-.274l.774-.258c.346-.115 .617-.386 .732-.732L13.863 .1z" />
                    </symbol>
                    <symbol id="circle-half" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                    </symbol>
                </svg>
            </li>
            <li class="nav-item py-2 py-md-1 col-auto">
                <div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
            </li>
            <li class="nav-item user ms-3">
                <a class="dropdown-toggle gray-6 d-flex text-decoration-none align-items-center lh-sm p-0"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="User"
                    data-bs-auto-close="outside">
                    <img class="avatar rounded-circle border border-3 nav-profile-img"
                        src="{{ auth()->user()->profile->image ?? asset('backend/assets/images/profile_av.png') }}" alt="avatar">
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow p-2 p-xl-3 rounded-4">
                    <div class="bg-body p-3 rounded-3">
                        <h4 class="mb-1 title-font text-gradient">{{ ucfirst(auth()->user()->name ?? '') }}</h4>
                        <p class="small text-muted">{{ auth()->user()->email ?? '' }}</p>
                    </div>
                    <ul class="list-unstyled mt-3">
                        <li><a class="dropdown-item rounded-pill" aria-label="my profile"
                                href="{{ route('admin.profile.show') }}">My Profile</a></li>
                        <li><a class="dropdown-item rounded-pill" aria-label="Change Password"
                                href="{{ route('admin.password.change.show') }}">Change Password</a></li>
                        <li class="dropdown-divider"></li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" class="w-100 mt-3">
                        @csrf
                        <button type="submit" class="btn py-2 btn-primary w-100 rounded-pill">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>

    <script>
        // Global navigation function - must be accessible globally
        function navigateToItem(type, id, itemType = null) {
            let url = '';
            switch(type) {
                case 'entertainment':
                    // Check if it's a movie or tv show based on the itemType
                    if (itemType === 'movie') {
                        url = `{{ url('admin/movies') }}/${id}/edit`;
                    } else if (itemType === 'tvshow') {
                        url = `{{ url('admin/tvshows') }}/${id}/edit`;
                    } else {
                        // Fallback to movies if type is not specified
                        url = `{{ url('admin/movies') }}/${id}/edit`;
                    }
                    break;
                case 'season':
                    url = `{{ url('admin/seasons') }}/${id}/edit`;
                    break;
                case 'episode':
                    url = `{{ url('admin/episodes') }}/${id}/edit`;
                    break;
            }

            if (url) {
                window.location.href = url;
            }
        }

        // Global viewAllResults function - must be accessible globally
        function viewAllResults() {
            const searchInput = document.getElementById('globalSearchInput');
            if (searchInput) {
                const query = searchInput.value.trim();
                if (query) {
                    // You can customize this URL to point to a dedicated search results page
                    window.location.href = `{{ route('admin.movies.index') }}?search=${encodeURIComponent(query)}`;
                }
            }
        }

        // Global Search Functionality - Execute when DOM is ready
        function initializeGlobalSearch() {
            let searchTimeout;
            const searchInput = document.getElementById('globalSearchInput');
            const searchButton = document.getElementById('searchButton');
            const searchResultsDropdown = document.getElementById('searchResultsDropdown');
            const searchResults = document.getElementById('searchResults');
            const searchLoading = document.getElementById('searchLoading');
            const noResults = document.getElementById('noResults');

            // Check if elements exist before proceeding
            if (!searchInput || !searchButton || !searchResultsDropdown || !searchResults || !searchLoading || !noResults) {
                console.warn('Global search elements not found on this page');
                return;
            }

        // Global search functionality
        function performGlobalSearch(query) {
            showLoading();
            hideNoResults();

            fetch(`{{ route('admin.global.search') }}?search=${encodeURIComponent(query)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    hideLoading();

                    if (data.success && data.data.total > 0) {
                        displaySearchResults(data.data);
                    } else {
                        showNoResults(query);
                    }
                })
                .catch(error => {
                    console.error('Search error:', error);
                    hideLoading();
                    showNoResults(query);
                });
        }

        function displaySearchResults(data) {
            let html = '';

            // Add total results header
            if (data.total > 0) {
                html += `<div class="search-header mb-3 pb-2 border-bottom">
                    <h6 class="mb-0 text-primary"><i class="bi bi-search"></i> Search Results (${data.total} found)</h6>
                </div>`;
            }

            // Movies/TV Shows (Entertainments)
            if (data.entertainments && data.entertainments.length > 0) {
                html += '<div class="search-section mb-3">';
                html += '<h6 class="text-primary mb-2"><i class="bi bi-film"></i> Movies & TV Shows</h6>';

                data.entertainments.forEach(item => {
                    const typeLabel = item.type === 'movie' ? 'Movie' : 'TV Show';
                    const thumbnail = item.thumbnail_url || '{{ asset("backend/assets/images/no-image.png") }}';

                    html += `
                        <div class="search-result-item d-flex align-items-center p-2 rounded mb-1 hover-bg-light cursor-pointer"
                             onclick="navigateToItem('entertainment', ${item.id}, '${item.type}')">
                            <img src="${thumbnail}" alt="${item.name}" class="me-3" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                            <div class="flex-grow-1">
                                <div class="fw-semibold">${item.name}</div>
                                <small class="text-muted">${typeLabel}</small>
                            </div>
                        </div>
                    `;
                });

                html += '</div>';
            }

            // Seasons
            if (data.seasons && data.seasons.length > 0) {
                html += '<div class="search-section mb-3">';
                html += '<h6 class="text-success mb-2"><i class="bi bi-collection-play"></i> Seasons</h6>';

                data.seasons.forEach(item => {
                    const thumbnail = item.poster_url || '{{ asset("backend/assets/images/no-image.png") }}';

                    html += `
                        <div class="search-result-item d-flex align-items-center p-2 rounded mb-1 hover-bg-light cursor-pointer"
                             onclick="navigateToItem('season', ${item.id})">
                            <img src="${thumbnail}" alt="${item.name}" class="me-3" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                            <div class="flex-grow-1">
                                <div class="fw-semibold">${item.name}</div>
                                <small class="text-muted">${item.entertainment_name} - Season ${item.season_index}</small>
                            </div>
                        </div>
                    `;
                });

                html += '</div>';
            }

            // Episodes
            if (data.episodes && data.episodes.length > 0) {
                html += '<div class="search-section mb-3">';
                html += '<h6 class="text-warning mb-2"><i class="bi bi-play-circle"></i> Episodes</h6>';

                data.episodes.forEach(item => {
                    const thumbnail = item.poster_url || '{{ asset("backend/assets/images/no-image.png") }}';

                    html += `
                        <div class="search-result-item d-flex align-items-center p-2 rounded mb-1 hover-bg-light cursor-pointer"
                             onclick="navigateToItem('episode', ${item.id})">
                            <img src="${thumbnail}" alt="${item.name}" class="me-3" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                            <div class="flex-grow-1">
                                <div class="fw-semibold">${item.name}</div>
                                <small class="text-muted">${item.entertainment_name} - S${item.season_index} E${item.episode_number}</small>
                            </div>
                        </div>
                    `;
                });

                html += '</div>';
            }

            // Add "View All Results" button if there are results
            if (data.total > 0) {
                html += `<div class="text-center mt-3 pt-2 border-top">
                    <button class="btn btn-outline-primary btn-sm" onclick="viewAllResults()">
                        <i class="bi bi-arrow-right"></i> View All Results
                    </button>
                </div>`;
            }

            searchResults.innerHTML = html;
            showDropdown();
        }

        function showDropdown() {
            searchResultsDropdown.style.display = 'block';
        }

        function hideDropdown() {
            searchResultsDropdown.style.display = 'none';
        }

        function showLoading() {
            searchLoading.style.display = 'block';
            searchResults.innerHTML = '';
        }

        function hideLoading() {
            searchLoading.style.display = 'none';
        }

        function showNoResults(query = '') {
            noResults.style.display = 'block';
            searchResults.innerHTML = '';
            document.getElementById('noResultsQuery').textContent = query;
            showDropdown();
        }

        function hideNoResults() {
            noResults.style.display = 'none';
        }

        // Event listeners
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();

            if (query.length >= 2) {
                searchTimeout = setTimeout(() => {
                    performGlobalSearch(query);
                }, 300); // 300ms delay
            } else {
                hideDropdown();
            }
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const query = this.value.trim();
                if (query.length >= 2) {
                    performGlobalSearch(query);
                }
            }
        });

        searchButton.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query.length >= 2) {
                performGlobalSearch(query);
            } else {
                // Show a brief message for short queries
                const originalPlaceholder = searchInput.placeholder;
                searchInput.placeholder = 'Please enter at least 2 characters';
                searchInput.style.borderColor = '#dc3545';
                setTimeout(() => {
                    searchInput.placeholder = originalPlaceholder;
                    searchInput.style.borderColor = '';
                }, 2000);
            }
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.main-search')) {
                hideDropdown();
            }
        });

        // Focus management
        searchInput.addEventListener('focus', function() {
            if (this.value.trim().length >= 2) {
                performGlobalSearch(this.value.trim());
            }
        });
        } // End of initializeGlobalSearch function

        // Initialize search functionality
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeGlobalSearch);
        } else {
            initializeGlobalSearch();
        }
    </script>

    <style>
        .search-result-item:hover {
            background-color: #f8f9fa !important;
            transition: background-color 0.2s;
        }

        .search-section h6 {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .search-results-dropdown {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .search-header {
            background-color: #f8f9fa;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
        }

        .search-section h6 {
            font-size: 0.875rem;
            font-weight: 600;
        }

        .search-result-item {
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .search-result-item:hover {
            background-color: #f8f9fa !important;
            border-color: #dee2e6;
            transform: translateY(-1px);
        }

        .search-results-dropdown {
            border: 1px solid #dee2e6 !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
    </style>
