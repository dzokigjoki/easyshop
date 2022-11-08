<?php namespace EasyShop\Services\Mailers;


class ContactMailer extends Mailer {

    /**
     * @param User $user
     */
    public function sendContactForm($name, $email, $message)
    {
        $view = 'clients.emails.contact';
        if(view()->exists('clients.'. config( 'app.client') .'.emails.contact')){
            $view =  'clients.'. config( 'app.client') .'.emails.contact';
        }

        $data = [];
        $subject = 'Kontakt';
        $data['name'] = $name;
        $data['email'] = $email;
        $data['message'] = $message;

        return $this->sendTo(\EasyShop\Models\AdminSettings::getField('contactemail'), $subject, $view, $data);
    }
}
