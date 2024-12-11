<?php

namespace App\Listeners;

use App\Events\OrderPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailAfterOrderPayment
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPayment $event)
    {
        // Xử lý Logic gửi Email
        // Amount
        $amount = $event->order->amount;
        $note = $event->order->note;

        $content =  "Amount : $amount \nNote: $note";

        dd($event->order);

        // Viết logic gửi email
        file_put_contents('./data.txt', $content);
    }
}
