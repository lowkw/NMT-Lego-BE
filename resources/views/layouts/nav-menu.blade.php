
<div id="top-navigation" class="blue sticky-top bg-light bg-lighten-md">
<div id="profile-navigation" class="sticky-top">
    <div class="container">
        <nav class="navbar justify-content-end">

            <div class="sm:flex sm:items-center sm:ml-6">
                @if (Auth::user())
                    <x-dropdown width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-decoration-none">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"  class="text-decoration-none">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <ul id="menu-menu-1" class="navbar-nav flex-row align-items-center gap-3 text-white">
                        <li itemscope="itemscope" itemtype="" id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42 nav-item">
                            <a title="Login" href="{{route('login')}}" class="nav-link text-white">Login</a>
                        </li>
                        <span>|</span>
                        <li itemscope="itemscope" itemtype="" id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43 nav-item">
                            <a title="Register" href="{{route('register')}}" class="nav-link text-white">Register</a>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>



    </div>
</div>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                    <a title="Home" href="{{route('home')}}">
                        <img src="{{ asset('/images/logo.png') }}" class="img-fluid" alt=""  width="270">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div id="main-navbar" class="collapse navbar-collapse justify-content-md-end">
                    <ul id="menu-menu-1" class="navbar-nav gap-3">
                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-41 nav-item">
                        <a title="Home" href="{{route('home')}}" class="nav-link">Home</a>
                        </li>
                        <li itemscope="itemscope" itemtype="" id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45 nav-item">
                            <a title="Sets" href="{{route('sets.index')}}" class="nav-link">Sets</a>
                        </li>
                        <li itemscope="itemscope" itemtype="" id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45 nav-item">
                            <a title="Contact Us" href="" class="nav-link">Contact</a>
                        </li>
                    </ul></div>        </div>
        </nav>
    </div>
</div>
