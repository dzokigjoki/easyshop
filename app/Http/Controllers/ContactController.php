<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Http\Requests;

use EasyShop\Models\City;
use \Mail;

class ContactController extends Controller
{
    //


    public function getIndex()
    {
        return view('contact.contact');
    }


    public function mailToAdmin(Request $request)
    {
        if ($request->input('anketa_yeppeuda')) {

            $secret = \EasyShop\Models\AdminSettings::getField('recaptchaSecret');
            $client = new \GuzzleHttp\Client();
            $params['form_params'] = array('secret' => $secret, 'response' => $request['g-recaptcha-response']);
            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            if (!json_decode($response)->success) {
                return redirect('/');
            }

            $email_data['name'] = $request->input('name');
            $email_data['email'] = $request->input('email');
            $email_data['age'] = $request->input('age');
            $email_data['time'] = $request->input('time');
            $email_data['how'] = $request->input('how');
            $email_data['wishlist'] = $request->input('wishlist');
            $email_data['amount'] = $request->input('amount');
            $email_data['dayskin'] = $request->input('dayskin');
            $email_data['morningskin'] = $request->input('morningskin');
            $email_data['acnes'] = $request->input('acnes');
            $email_data['goal'] = $request->input('goal');
            $email_data['stress'] = $request->input('stress');
            $email_data['skincare'] = $request->input('skincare');

            $email_data['photoProblems'] = $request->file('photoProblems');

            Mail::send('emails.anketa_yeppeuda', ['email_data' => $email_data], function ($message) use ($email_data) {
                $name = $email_data['name'];
                $email = $email_data['email'];
                $subject = 'Имате нова пополнета анкета од сајтот Yeppeuda';
                if (isset($email_data['photoProblems']) && $email_data['photoProblems'] !== '' && !is_null($email_data['photoProblems'])) {
                    $message->attach(
                        $email_data['photoProblems']->getRealPath(),
                        [
                            'as' => $email_data['photoProblems']->getClientOriginalName(),
                            'mime' => $email_data['photoProblems']->getClientMimeType(),
                        ]
                    );
                }
                $message->from($email);
                $message->subject($subject);
                $message->to("info@yeppeuda.mk");
            });
            return redirect('/');
        } else if ($request->input('request_sovet_natura')) {
            $email_data['name'] = $request->input('name');
            $email_data['email'] = $request->input('email');
            $email_data['opstina'] = $request->input('municipality');
            $email_data['phone'] = $request->input('phone');
            $email_data['message'] = $request->input('message');

            $city_id = $request->input('city');

            $all_cities = City::all();

            foreach ($all_cities as $ac) {
                if ($ac->id == $city_id) {
                    $city_name = $ac->city_name_en;
                    break;
                }
            }

            $email_data['city'] = $city_name;


            Mail::send('emails.request_sovet_natura', ['email_data' => $email_data], function ($message) use ($email_data) {
                // $message->addPart('Emri dhe mbiemri: ' . $email_data['name']);
                // $message->addPart('E-mail ' . $email_data['email']);
                // $message->addPart('Qyteti ' . $email_data['city']);
                // $message->addPart('Komuna ' . $email_data['opstina']);
                // $message->addPart('Numri i telefonit ' . $email_data['phone']);

                $subject = 'Ju keni një kërkesë të re për këshilla';

                $message->from($email_data['email']);
                $message->subject("Kërkesë për këshilla");
                $message->to(\EasyShop\Models\AdminSettings::getField('contactemail'));
            });
            return redirect('/');
        } else if ($request->input('naturakontakt')) {
            $email_data['name'] = $request->input('name');
            $email_data['email'] = $request->input('email');
            $email_data['phone'] = $request->input('phone');
            $email_data['subject'] = $request->input('subject');
            $email_data['comment'] = $request->input('comment');
            Mail::send('emails.naturakontakt', ['email_data' => $email_data], function ($message) use ($email_data) {
                $message->from($email_data['email']);
                $message->subject($email_data['subject']);
                $message->to(\EasyShop\Models\AdminSettings::getField('contactemail'));
            });
            return redirect('/');
        } 
        if ($request->file('cv')){
            $email_data['cv']=$request->file('cv');
        }


        $email_data['name'] = $request->input('name');
        $email_data['email'] = $request->input('email');
        $email_data['customOrder'] = false;
        if ($request->input('po-naracka')) {
            $email_data['image'] = $request->file('image');
            $email_data['customOrder'] = true;
        }
        $email_data['subject'] = $request->input('subject');
        $email_data['phone'] = $request->input('phone');
        $email_data['message'] = $request->input('message');

        Mail::send('emails.contact-admin', ['email_data' => $email_data], function ($message) use ($email_data) {
            $name = $email_data['name'];
            $email = $email_data['email'];
            if ($email_data['customOrder']) {
                $subject = 'Имате барање за специфична нарачка';
            } else {
                $subject = 'Имате нова порака од сајтот ' . config( 'app.client');
            }
            $emailMessage = $email_data['message'];
            if (isset($email_data['image']) && $email_data['image'] !== '' && !is_null($email_data['image'])) {
                $message->attach(
                    $email_data['image']->getRealPath(),
                    [
                        'as' => $email_data['image']->getClientOriginalName(),
                        'mime' => $email_data['image']->getClientMimeType(),
                    ]
                );
            }
            if (isset($email_data['cv']) && $email_data['cv'] !== '' && !is_null($email_data['cv'])) {
                $message->attach(
                    $email_data['cv']->getRealPath(),
                    [
                        'as' => $email_data['cv']->getClientOriginalName(),
                        'mime' => $email_data['cv']->getClientMimeType(),
                    ]
                );
            }
            $message->from($email);
            $message->subject($subject);
            $message->addPart('Порака: ' . $emailMessage);
            $message->to(\EasyShop\Models\AdminSettings::getField('contactemail'));
        });
        return redirect(detectUrlLang());
    }
}
