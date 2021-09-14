<div class="header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <div class="nav-logo align-self-center">
            <a class="navbar-brand"
               href="{{ route('dashboard') }}"><img alt="logo" src="{{ asset('assets/img/logo2.svg') }}">
                <span class="navbar-brand-name">SMART VOTO</span></a>
        </div>

        <ul class="navbar-item topbar-navigation">

            <!--  BEGIN TOPBAR  -->
            <div class="topbar-nav header navbar" role="banner">
                <nav id="topbar">
                    <ul class="navbar-nav theme-brand flex-row  text-center">
                        <li class="nav-item theme-logo">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('assets/img/logo2.svg') }}" class="navbar-logo" alt="logo">
                            </a>
                        </li>
                        <li class="nav-item theme-text">
                            <a href="{{ route('dashboard') }}" class="nav-link"> SMART VOTO </a>
                        </li>
                    </ul>

                    <ul class="list-unstyled menu-categories" id="topAccordion">

                        <li class="menu single-menu {{ Route::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}"
                               class="dropdown-toggle autodroprown">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>


                        <li class="menu single-menu {{ Route::is('polls.*') && !Route::is('polls.create') ? 'active' : '' }}">
                            <a href="{{ route('polls.index') }}"
                               class="dropdown-toggle autodroprown">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-trello">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <rect x="7" y="7" width="3" height="9"></rect>
                                        <rect x="14" y="7" width="3" height="5"></rect>
                                    </svg>
                                    <span>My Polls</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu single-menu {{ Route::is('polls.create') ? 'active' : '' }}">
                            <a href="{{ route('polls.create') }}"
                               class="dropdown-toggle autodroprown">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-plus-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    <span>New Poll</span>
                                </div>
                            </a>
                        </li>


                        <li class="menu single-menu {{ Route::is('profile.index') ? 'active' : '' }}">
                            <a href="{{ route('profile.index') }}"
                               class="dropdown-toggle autodroprown">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Profile</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <!--  END TOPBAR  -->

        </ul>


        <ul class="navbar-item flex-row nav-dropdowns ml-auto">

            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <img src="{{ asset('assets/img/avatar.png') }}" class="img-fluid" alt="admin-profile">
                    </div>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <div class="media-body">
                                <h5>{{ Auth::user()->name }}</h5>
                                <p>{{ 'Joined '.Auth::user()->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="{{ route('profile.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profile</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Log Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>