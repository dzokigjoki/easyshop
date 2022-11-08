<?php

namespace EasyShop\Services\Mailers;

use Carbon\Carbon;
use \EasyShop\Models\User;
use EasyShop\PromoCode;

class UserMailer extends Mailer
{

    /**
     * @param User $user
     */
    public function register(User $user)
    {
        $view = 'clients.emails.register';
        if (view()->exists('clients.' . config( 'app.client') . '.emails.register')) {
            $view =  'clients.' . config( 'app.client') . '.emails.register';
        }

        // Dokolku treba da se isprati promo code za prvata naracka na emejl
        if (\EasyShop\Models\AdminSettings::getField('firstOrderDiscount')) {
            $this->generatePromoCode($user->id, $user->confirmation_code);
        }

        $data = [];
        $subject = 'Успешна регистрација';
        $data['confirmationCode'] = $user->confirmation_code;
        $data['first_name'] = $user->first_name;

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function newsletterSubscription($email, $subject, $view, $data){
        $this->sendTo($email, $subject, $view, $data);
    }

    public function generatePromoCode($userId, $confirmationCode, $noUser = true)
    {
        
        $promo_code = new PromoCode();
        $promo_code->code = $confirmationCode;
        $promo_code->discount_type = \EasyShop\Models\AdminSettings::getField('firstOrderDiscountTip');
        $promo_code->value = \EasyShop\Models\AdminSettings::getField('firstOrderDiscountValue');
        $promo_code->type = "cart";
        $promo_code->reuse_number = 1;
        $promo_code->start = Carbon::now();
        $promo_code->end = Carbon::now()->addWeeks(3);
        if($noUser == true){
            $promo_code->user_id = $userId;
        }
        $promo_code->save();
    }
}
