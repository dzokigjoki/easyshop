<?php

namespace EasyShop\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/articles/upload',
        'admin/articles/uploadRedactor',
        'admin/blog/uploadRedactor',
        'admin/categories/uploadRedactor',
        'checkout/success',
        'checkout/fail',
        'halk-check-status',
        'checkout/halk-success',
        'checkout/halk-fail',
        'coupon/wheel-of-fortune/generate'
    ];
}
