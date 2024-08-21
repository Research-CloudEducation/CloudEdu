<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Right navbar links -->
  
    <ul class="navbar-nav mr-auto-navbav">
      

        <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ trans('home.lang') }}
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                   
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
            
            </div>
        </div>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                


            </div>
        </li>
 <!-- Messages Dropdown Menu -->
 <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <div>
            {{ Auth::user()->name ?? Auth::guard('agent')->user()->name }}
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <x-slot name="content">
                <x-dropdown-link :href="route('admin.profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
       


            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <!-- Message Start -->

             <!-- Authentication -->
             <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>

            <!-- Message End -->
        </a>

    </ul>
     <!-- Settings Dropdown -->
     {{-- <div class="hidden sm:flex sm:items-center sm:ms-6 navbar-nav mr-auto-navbav">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>
                        {{ Auth::user()->name }}
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('admin.profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div> --}}
</nav>
