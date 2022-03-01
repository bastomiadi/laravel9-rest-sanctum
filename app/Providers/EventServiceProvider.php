<?php

namespace App\Providers;

use App\Models\v1\Category;
use App\Models\v1\Product;
use App\Models\v1\Review;
use App\Observers\v1\CategoryObserver;
use App\Observers\v1\ProductObserver;
use App\Observers\v1\ReviewObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Review::observe(ReviewObserver::class);
    }

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        Category::class => [CategoryObserver::class],
        Product::class => [ProductObserver::class],
        Review::class => [ReviewObserver::class],
    ];
}
