<?php

namespace EasyShop\Http\Controllers\Auth;

use EasyShop\Http\Controllers\Controller;
use EasyShop\Http\Controllers\FrontController;
use EasyShop\Services\CategoryService;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Config;

class PasswordController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $linkRequestView;
    protected $subject;
    protected $resetView;
    protected $redirectPath;
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {

        parent::__construct($categoryService);

        $this->middleware('guest');
        $this->linkRequestView  = 'clients.' . config( 'app.client') . '.auth.passwords.email';
        $this->resetView        = 'clients.' . config( 'app.client') . '.auth.passwords.reset';
        $this->subject          = "Линк за ресетирање на вашата лозинка";
        $this->redirectPath     = route('home');

        Config::set('auth.passwords.users.email', 'clients.' . config( 'app.client') . '.emails.password-reset');
    }
}
