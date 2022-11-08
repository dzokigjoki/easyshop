<?php

namespace EasyShop\Http\Middleware;

use Session;
use EasyShop\Models\Settings;
use Closure;


class filterLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (strpos(\Request::path(), 'admin') !== false) {
            return $next($request);
        }
        $request->route()->forgetParameter('lang');  
        if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {

            if (!Session::has('langExtension')) {
                $GeoIpService =  new \EasyShop\Services\GeoIpService();
                Session::put('langExtension', $GeoIpService->getLangExtension());
                Session::save();

                $after = trim(\Request::path(), Session::get('langExtension'));
                return redirect()->to($GeoIpService->getLangExtension(). $after);
            } else if (Session::has('langExtension') && (Session::get('langExtension') != detectUrlLang())) {
                $after = trim(\Request::path(), Session::get('langExtension'));
                return redirect()->to(Session::get('langExtension'). $after);
            }
        }

        return $next($request);
    }
}
