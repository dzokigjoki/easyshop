<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;

use EasyShop\Models\User;
use EasyShop\Models\City;
use EasyShop\Models\Document;
use EasyShop\Models\Country;
use EasyShop\Models\Warehouse;
use EasyShop\Models\Role as Roles;
use EasyShop\Models\Wishlist;
use EasyShop\Models\Product;
use EasyShop\Models\AssignedRoles;

use ImagesHelper;

use Hash;

use Auth;

class ProfileController extends FrontController
{

    /**
     * @var
     */
    protected $categoryService;

    /**
     * @var
     */
    protected $articleRepository;

    /**
     * @var
     */
    protected $user;

    /**
     * @param CategoryService $categoryService
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(
        CategoryService $categoryService,
        ArticleRepositoryInterface $articleRepository
    ) {
        parent::__construct($categoryService);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfile()
    {
        $client = auth()->user();
        $client->country_id = is_null($client->country_id) ? 1 : $client->country_id;
        $client->country_id_shipping = is_null($client->country_id_shipping) ? 1 : $client->country_id_shipping;
        $cities = City::all();
        $countries = Country::all();

        if (Auth::user()) {
            $order_data = Document::select('id', 'document_number', 'created_at')
                ->where('type', '=', 'narachka')
                ->where('user_id', '=', Auth::user()->id)
                ->with('items')
                ->get();
        }
        $pids = Wishlist::where('user_id', auth()->user()->id)->pluck('product_id');

        $wishlist_items = Product::whereIn('id', $pids)->get();
        foreach ($wishlist_items as $product) {
            $product->price = (int) $product->{$this->priceGroup};
            $product->image = ImagesHelper::getProductImage($product, $id = null, $size = 'sm_');
        }
        return view('clients.' . config( 'app.theme') . '.profile', compact('client', 'cities', 'countries', 'order_data', 'wishlist_items'));
    }

    /**
     * Store user profile
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'gender' => 'in:male,female',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required',
            'phone' => 'required',
            'password' => ['string', 'min:6', 'same:password_confirmation'],

        ]);
        if (config( 'app.client') == "dobra_voda") {
            $this->validate($request, [
                'municipality' => 'required',
            ]);
        }

        $user = auth()->user();
        //$user->email = $request->get('email');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');

        $user->gender = $request->get('gender');
        $user->phone = $request->get('phone');

        $user->address = $request->get('address');
        $user->address_shiping = $request->get('address');


        // billing address
        $user->city_id = $request->get('city_id');
        if (config( 'app.client') == "dobra_voda") {
            $user->municipality = $request->get('municipality');
        }

        //        $user->country_id = $request->get('country_id');

        // shipping address
        $user->city_id_shipping = $request->get('city_id_shipping');
        if (config( 'app.client') == "dobra_voda") {
            $user->municipality_shipping = $request->get('municipality_shipping');
        }

        //        $user->country_id_shipping = $request->get('country_id_shipping');

        if ($request->has('old_password')) {

            if (password_verify($request->old_password, $user->password)) {

                if ($request->has('password')) {
                    $user->password = Hash::make($request->password);
                }
            } else {
                return redirect()->back()->withErrors(['Моменталната лозинка е погрешно внесена']);
            }
        }
        
        $user->save();

        return redirect()->route('profiles.get');
    }

    /**
     * @param $code
     */
    public function getConfirmation($code)
    {
        $user = User::where('confirmation_code', '=', $code)->first();
        if (is_null($user)) {
            return redirect()->route('home')->withError('Настана грешка при активација.');
        } else {
            if ($user->confirmed) {
                return redirect()->route('home')->withSuccess('Вашиот профил е веќе активиран.');
            } else {
                $user->confirmed = 1;
                $user->save();
                return redirect()->route('home')->withSuccess('Успешно го активиравте вашиот профил.');
            }
        }
    }
    public function registrationSuccess()
    {
        if (view()->exists('clients.' . '_partials' . '.registration-successful')) {
            return view('clients.' . '_partials' . '.registration-successful');
        } else {
            return view('clients.' . config( 'app.client') . '.register');

        }
    }

    public function getShowOrders()
    {
    }
}
