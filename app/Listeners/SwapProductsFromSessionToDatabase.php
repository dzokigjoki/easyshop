<?php

namespace EasyShop\Listeners;

use EasyShop\Events\UserLoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use EasyShop\Repositories\CartRepository\CartRepositoryInterface;
use Illuminate\Http\Request;


class SwapProductsFromSessionToDatabase
{
    protected $cartRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Handle the event.
     *
     * @param  UserLoginEvent  $event
     * @return void
     */
    public function handle(Request $request, UserLoginEvent $event)
    {
        $user = \Auth::user();

        if(!is_null($user))
        {
            $this->cartRepository->swap($request->session->get('user_id'), $user->id);
        }
    }
}
