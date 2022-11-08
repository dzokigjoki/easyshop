<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Http\Requests;
use \Mail;

class ContactController extends Controller
{
    //


    public function getIndex()
    {
        return view('admin.contact.contact');
    }


    public function mailToAdmin(Request $request)
    {
        $email_data['name'] = $request->input('name');
        $email_data['email'] = $request->input('email');
        $email_data['subject'] = $request->input('subject');
        $email_data['client'] = $request->input('client');
        $email_data['description'] = $request->input('description');
        $email_data['screeshot'] = $request->file('screeshot');

        Mail::send('emails.contact-admin',['email_data' => $email_data], function ($message) use ($email_data) {
            $name = $email_data['name'];
            $email = $email_data['email'];
            $subject = $email_data['subject'];
            $client = $email_data['client'];
            $description = $email_data['description'];


            $message->from($email);
            $message->subject($subject);
            if (isset($email_data['screeshot']) && $email_data['screeshot'] !== '' && !is_null($email_data['screeshot'])) {
                $message->attach(
                    $email_data['screeshot']->getRealPath(),
                    [
                        'as' => $email_data['screeshot']->getClientOriginalName(),
                        'mime' => $email_data['screeshot']->getClientMimeType(),
                    ]
                );
            }
//            $message->attach('Клиент: '.$client.' - '.$name);
//            $message->attach('Опис: '.$description);
            $message->to('aleksandar@generadevelopment.com','gjorgje@generadevelopment.com','info@generadevelopment.com');

        });
        return redirect('/admin');
    }
}
