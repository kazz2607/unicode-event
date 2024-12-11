<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Create User
        User::creating(function ($user) {
            file_put_contents(base_path() . '/logs.txt', $user->email.' - Creating');
            echo 'Creating';
        });

        User::created(function ($user) {
            file_put_contents(base_path() . '/logs2.txt', $user->email.' - Created');
            echo 'Created';
        });

        // Save User
        User::saving(function ($user) {
            file_put_contents(base_path() . '/logs.txt', $user->email.' - Saving');
            echo 'Saving';
        });

        User::saved(function ($user) {
            file_put_contents(base_path() . '/logs2.txt', $user->email.' - Saved');
            echo 'Saved';
        });
    }
}
