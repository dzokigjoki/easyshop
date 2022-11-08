<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 4/16/2018
 * Time: 10:42 AM
 */


namespace EasyShop\Http\Controllers;


use EasyShop\Http\Requests\ContactFormRequest;
use EasyShop\Services\CategoryService;

class PagesController extends FrontController
{
    /**
     * @var
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct($categoryService);
    }

    public function getContact()
    {
        return view('clients.' . config( 'app.theme') . '.contact');
    }

    public function postContact(ContactFormRequest $request, \EasyShop\Services\Mailers\ContactMailer $mailer)
    {
//        return $request->input('name');


        $mailer->sendContactForm($request->input('name'), $request->input('email'), $request->input('message'));
        return redirect()->back()->withSuccess('Пораката е успешно испратена! Ќе Ве исконтактираме наскоро!');
    }


    public function getContactPeleti(){
        return view('clients.peletcentar.contact-peleti');
    }
}