<?php namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Http\Controllers\Controller;
use EasyShop\Http\Requests\AdminLoginRequest;
use Illuminate\Contracts\Auth\Guard;

class AuthenticationController extends Controller
{

    /**
     * Show login view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        //CLIENT
        $client = config( 'app.client');

        if((substr($client,0,11) == 'globalstore') && ($client!='globalstore_mk'))
        {
            echo "<p>Користете го главниот админ за најава.</p>";
            exit();
        }

        if((substr($client,0,11) == 'topprodukti') && ($client!='topprodukti_mk'))
        {
            echo "<p>Користете го главниот админ за најава.</p>";
            exit();
        }



        return view('admin.login');
    }

    /**
     * Attempt login
     *
     * @param AdminLoginRequest $request
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(AdminLoginRequest $request, Guard $auth)
    {
        // Try to log in the user
        if ($auth->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirmed' => 1,
            'aktiven' => 1
        ],
            $request->has('remember'))
        ) {

            $user = $auth->user();

            // If the user is admin
            if ($user->hasAnyRole()) {
                return redirect()->route('admin.dashboard');
            } // If the user is registered for frontend
            else {
                return redirect()->route('home');
            }

        } else {
            return redirect()->back()
                ->withError("Е-Поштата и лозинката што ги внесовте не се совпаѓаат. Обидете се повторно.")
                ->withInput();
        }
    }

    /**
     * Logout user
     *
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout(Guard $auth)
    {
        $auth->logout();
        return redirect()->route('admin.login');
    }
}