<?php

namespace App\Providers;

use App\Models\User;
use App\Events\OrderPayment;
use App\Events\UserUpdateEvent;
use App\Observers\UserObserver;
use App\Events\UserBlockedEvent;
use App\Listeners\UserUpdateListener;
use Illuminate\Support\Facades\Event;
use App\Listeners\UserBlockedListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendEmailAfterOrderPayment;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Đăng ký Event
        OrderPayment::class =>[
            SendEmailAfterOrderPayment::class,
        ],
        UserUpdateEvent::class =>[
            UserUpdateListener::class,
        ],
        UserBlockedEvent::class =>[
            UserBlockedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // User::observe(new UserObserver);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
