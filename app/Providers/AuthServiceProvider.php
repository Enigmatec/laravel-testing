<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isUser', function($user){
            return $user->role == 'user';
        });

        Gate::define('isSubAdmin', function($user){
            return $user->role == 'sub-admin';
        });

        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });

        Gate::define('create-post', function($user) {
            return $user->email == 'admin@gmail.com';
        });
    }
}
