<?php

namespace EasyShop\Http\Controllers\Auth;

use EasyShop\Events\UserRegisterEvent;
use EasyShop\Models\User;
use EasyShop\Models\Role;
use Illuminate\Http\Request;
use Validator;
use EasyShop\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use EasyShop\Http\Controllers\FrontController;

use EasyShop\Services\CategoryService;

class AuthController extends FrontController
{

    /**
     * @var CategoryService
     */
    protected $categoryService;

    protected $redirectTo = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct($categoryService);
        
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);

        $this->categoryService = $categoryService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->confirmed = 0;
        $user->confirmation_code =  md5(microtime() . config('app.key'));

        if (in_array(config( 'app.client'), ['tehnopolis'])) {
            // Add Macedonia as country
            $user->country_id = 1;
            $user->country_id_shipping = 1;
        }

        $user->save();

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request,
                $validator
            );
        }

        // Prevent bots
        if ($request->input('name')) {
            return redirect()->back()->withInput();
        }

        $user = $this->create($request->all());

        \Auth::guard($this->getGuard());

        event(new UserRegisterEvent($user));
        return redirect()->route('profile.RegisterSuccess');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $menuCategories = $this->categoryService->getNestedCategoryList($onlyActive = TRUE);

        return view('clients.' . config( 'app.theme') . '.register', compact('menuCategories'));
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $menuCategories = $this->categoryService->getNestedCategoryList($onlyActive = TRUE);

        return view('clients.' . config( 'app.theme') . '.login', compact('menuCategories'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (User::where('email', $credentials["email"])->first()) {

            if (!User::where('email', $credentials["email"])->first()->confirmed) {

                return redirect()->back()
                    ->withInput($request->only($this->loginUsername(), 'remember'))
                    ->withErrors([
                        $this->loginUsername() => "Вашата е-пошта не е потврдена.",
                    ]);
            }
        }


        if (\Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && !$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function authenticated(Request $request, User $user)
    {
        event($request);
        return redirect()->intended($this->urlLang);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        session()->flush();
        $redirect = $this->urlLang;
        
        return redirect($redirect);
    }
}
