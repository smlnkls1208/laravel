<?php

namespace App\Providers;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Policies\BookPolicy;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerPolicies();
        Gate::policy(Book::class, BookPolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }
}
