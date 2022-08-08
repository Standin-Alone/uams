<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/api/sign_in',
        '/api/get_voucher_info',
        '/api/resend-otp',
        '/api/submit-voucher',
        '/api/get-scanned-vouchers',
        '/api/get-transacted-items',
        '/api/get-transaction-history',
        '/api/get-items',
        '/api/submit-voucher-rrp',
        '/api/submit-voucher-cfsmff',
        '/api/validate-otp',
        '/api/discard_transaction',
        '/api/save-to-cart',
        '/api/check-draft-transaction',
        '/api/delete-cart',
        '/api/checkout-update-cart',
        '/api/check-if-category-has-draft',
        '/api/form_reset_password_link/sending_request',
        'api'
        
    ];
    // sample
    // sample
}
