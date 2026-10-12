<!-- start: page menu link -->
<aside class="ps-4 pe-3 py-3 sidebar" data-bs-theme="none">
    <nav class="navbar navbar-expand-xl py-0">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas_Navbar">
            <div class="offcanvas-body flex-column custom_scroll ps-4 ps-xl-0">
                <!-- start: Workspace -->
                <h6 class="fl-title title-font ps-2 small text-uppercase text-muted"
                    style="--text-color: var(--theme-color1)">Menu</h6>
                <ul class="list-unstyled mb-4 menu-list sidebar_menu_list">
                    <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard.index') }}" aria-label="My Dashboard">
                            <i class="bi bi-house"></i>
                            <span class="mx-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.movies.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.movies.index') }}" aria-label="Movies">
                            <i class="bi bi-film"></i>
                            <span class="mx-2">Movies</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.tvshows.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.tvshows.index') }}" aria-label="TV Shows">
                            <i class="bi bi-tv"></i>
                            <span class="mx-2">TV Shows</span>
                        </a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('admin.seasons.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.seasons.index') }}" aria-label="Seasons">
                           <i class="bi bi-view-list"></i>
                            <span class="mx-2">Seasons</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.episodes.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.episodes.index') }}" aria-label="Episodes">
                            <i class="bi bi-collection-play"></i>
                            <span class="mx-2">Episodes</span>
                        </a>
                    </li> --}}
                    <li class="{{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.genres.index') }}" aria-label="Genres">
                            <i class="bi bi-view-list"></i>
                            <span class="mx-2">Genres</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.cast-crews.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.cast-crews.index') }}" aria-label="Cast & Crew">
                            <i class="bi bi-emoji-smile"></i>
                            <span class="mx-2">Cast & Crew</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" aria-label="Users">
                           <i class="bi bi-people"></i>
                            <span class="mx-2">Users</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('admin.settings') || request()->routeIs('admin.site.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}" aria-label="Settings">
                            <i class="bi bi-gear"></i>
                            <span class="mx-2">Settings</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.logs') ? 'active' : '' }}">
                        <a href="{{ route('admin.logs') }}" aria-label="Logs">
                            <i class="bi bi-clock"></i>
                            <span class="mx-2">Logs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.home') }}" aria-label="Storefront">
                            <i class="bi bi-shop"></i>
                            <span class="mx-2">Storefront</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</aside>
