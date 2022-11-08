<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    const CLIENT_HERLINE = 'herline';
    const CLIENT_HOTSPOT = 'hotspot';
    const CLIENT_NATURATHERAPYSHOP = 'naturatherapyshop';
    const CLIENT_NATURATHERAPYSHOP_AL = 'naturatherapyshop_al';
    const CLIENT_NATURATHERAPYSHOP_ALB = 'naturatherapyshop_alb';
    const CLIENT_NATURATHERAPY_SHOPS = ['naturatherapyshop', 'naturatherapyshop_al', 'naturatherapyshop_alb'];
    const CLIENT_NATURATHERAPY_KSMK = ['naturatherapyshop', 'naturatherapyshop_al'];
    const CLIENT_EXPRESSBOOK = "expressbook";
    const CLIENT_PELETCENTAR = "peletcentar";
    const CLIENT_MOBI_IN = 'mobiin';
    const CLIENT_DRBROWNS = 'drbrowns';
    const CLIENT_TORTI = 'torti';
    const CLIENT_MY_MODA = 'mymoda';
    const CLIENT_LUXBOX = 'luxbox';
    const CLIENT_MATICA = 'matica';
    const CLIENT_SOFU = 'sofu';
    const CLIENT_YEPPEUDA = 'yeppeuda';
    const CLIENT_DOBRA_VODA = 'dobra_voda';
    const CLIENT_E_COMMERCE = 'e-commerce';

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var bool
     */
    public $timestamps = false;

    public static function checkPaymentFlag() {
        $setting = Settings::first();
        return $setting->payment_modal;    
    }
}
