<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'نمق') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
      
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css?ver=142') }}"> -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=142') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme-method.css?ver=142') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.css?ver=142') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172360510-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-172360510-1');
    </script>
    </head>
    
    <body class="bg-light is-rtl" dir="rtl">
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
            <div class="container ">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                   <!--  <x-jet-application-mark width="36" /> -->
                   
                   <img class="logo " alt="logo" src="{{ asset('images/logo-full-white.png') }}" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('لوحة التحكم') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('managePosts') }}" :active="request()->routeIs('managePosts')">
                            {{ __('نشر تدوينة جديدة') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('manageComments') }}" :active="request()->routeIs('manageComments')">
                            {{ __('التحكم بالتعليقات') }}
                        </x-jet-nav-link>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <x-jet-dropdown id="navbarDropdown">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <h6 class="dropdown-header small text-muted">
                                        {{ __('إدارة الحساب') }}
                                    </h6>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('الملف الشخصي') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                <!-- Team Management -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())

                                        <hr class="dropdown-divider">

                                        <h6 class="dropdown-header">
                                            {{ __('Manage Team') }}
                                        </h6>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan

                                        <hr class="dropdown-divider">

                                        <!-- Team Switcher -->
                                        <h6 class="dropdown-header">
                                            {{ __('Switch Teams') }}
                                        </h6>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    @endif

                                    <hr class="dropdown-divider">

                                    <!-- Authentication -->
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </x-jet-dropdown-link>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5 text-right">
            {{ $slot }}
        </main>

        @stack('modals')

        <script src="{{ asset('js/app.js') }}"></script>
        @livewireScripts
        @stack('scripts')
        <div id="preloader">
		<div id="loader"></div>
		<div class="loader-section loader-top"></div>
   		<div class="loader-section loader-bottom"></div>
	</div>

        <script src="{{ asset('assets/js/jquery.bundle.js?ver=142') }}"></script>
        <script src="{{ asset('assets/js/script.js?ver=142') }}"></script>


    </body>
</html>
