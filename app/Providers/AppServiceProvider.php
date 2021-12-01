<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Observers\PostCommentObserver;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function() {
                $client = (new ApiClient())->setConfig([
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => 'us20'
                ]);
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();
        Schema::defaultStringLength(191);

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
    }
}
