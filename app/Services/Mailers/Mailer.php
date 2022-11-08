<?php namespace EasyShop\Services\Mailers;

use Mail;

abstract class Mailer
{

    public function sendTo($user, $subject, $view, $data = [], $attachment = null, $cc = [])
    {
        Mail::queue($view, $data, function($message) use($user, $subject, $attachment, $cc) {

            $email = is_object($user) ? $user->email : $user;

            if (! is_null($attachment)) {
                $message->attach($attachment);
            }

            $message->to($email);

            foreach($cc as $ccEmail) {
                $message->cc($ccEmail);
            }

            $message->subject($subject);
        });
    }
}
