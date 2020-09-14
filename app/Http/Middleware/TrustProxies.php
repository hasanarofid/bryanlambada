<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
    // protected $proxies;
    protected $proxies = [
        'http://ux.lambada.id/',
        '192.168.1.2',
    ];

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
     protected $headers = Request::HEADER_X_FORWARDED_ALL;
    // protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
