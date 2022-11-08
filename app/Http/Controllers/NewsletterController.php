<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;
use EasyShop\Http\Requests;
use EasyShop\Services\Mailers\UserMailer;
use Newsletter;


class NewsletterController extends Controller
{
    public function __construct()
    {
        if (!session()->get('newsletters')) {
            session()->put('newsletters', []);
        }
    }

    public function checkNewsletter(Request $request)
    {
    }

    public function NewsletterSubscribe(Request $request)
    {
        if(Newsletter::isSubscribed($request->email)){
            return response()->json(['error' => 'Е-поштата е веќе искористена'], 405); 
        }
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribe($request->email);
            //Sofu - potvrda i kupon za 10% za newsletter
            if(config('app.client') == 'sofu'){
                $view = 'clients.emails.newsletter';
                $promo_code = md5(microtime() . config('app.key'));
                if (view()->exists('clients.' . config( 'app.client') . '.emails.newsletter')) {
                    $view =  'clients.' . config( 'app.client') . '.emails.newsletter';
                }
                $userMailer = new UserMailer();
                $userMailer->generatePromoCode($request->email, $promo_code, false);

                $data = [];
                $subject = 'Успешна претплата на нашиот билтен';
                $data['confirmationCode'] = $request->email;
                $data['promo_code'] = $promo_code;
                $userMailer->newsletterSubscription($request->email, $subject, $view, $data);
            }
            return redirect()->to(app('url')->previous() . "#newsletter")->with('success', 'Ви благодариме за претплатата');
        }
        return redirect()->to(app('url')->previous() . "#newsletter")->with('error', 'Претплатата не беше успешна, ве молиме обидете се повторно');
    }
}
