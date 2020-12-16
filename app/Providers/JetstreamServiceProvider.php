<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Fortify;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        //Get Session Link for Login View

        Fortify::loginView(function () {
            if (session('link')) {
                $myPath = session('link');
                $loginPath = url('/login');
                $previous = url()->previous();

                if ($previous = $loginPath) {
                    session(['link' => $myPath]);
                } else {
                    session(['link' => $previous]);
                }
            } else {
                session(['link' => url()->previous()]);
            }
            return view('auth.login');
        });
        Fortify::registerView(function () {
            if (session('link')) {
                $myPath = session('link');
                $registerPath = url('/register');
                $previous = url()->previous();

                if ($previous = $registerPath) {
                    session(['link' => $myPath]);
                } else {
                    session(['link' => $previous]);
                }
            } else {
                session(['link' => url()->previous()]);
            }
            return view('auth.register');
        });
         // register new LoginResponse
         $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );
        $this->app->singleton(
            \Laravel\Fortify\Contracts\RegisterResponse::class,
            \App\Http\Responses\RegisterResponse::class
        );
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
