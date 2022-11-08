<?php

namespace EasyShop\Listeners;

use EasyShop\Events\UserRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegistrationEmailListener
{
    /**
     * @var
     */
    public $userMailer;

    /**
     * Create the event listener
     *
     * @param \EasyShop\Services\Mailers\UserMailer $userMailer
     */
    public function __construct(\EasyShop\Services\Mailers\UserMailer $userMailer)
    {
        $this->userMailer = $userMailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisterEvent  $event
     * @return void
     */
    public function handle(UserRegisterEvent $event)
    {
        $this->userMailer->register($event->user);
    }
}
