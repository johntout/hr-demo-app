<?php

namespace App\Middlewares;

use App\Facades\Auth;
use App\Facades\Session;
use Illuminate\Support\Str;
use App\Interfaces\Request as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class Authorization
{
    /*
     * @var array
     */
    protected $exceptions = [
        'portal.login',
        'panel.login',
        'portal.auth.login',
        'panel.auth.login',
    ];

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next) :Response
    {
        $route = $request->getAttribute('route');

        if (Str::contains($route->getName(), 'panel')) {
            Session::setSessionType('panel');

            if (Auth::user()->isGuest() && !in_array($route->getName(), $this->exceptions)) {
                if (Str::contains($route->getName(), 'panel.approvals')) {
                    flash_message('warning', 'Please login first and then click the approve/reject 
                        link you received!'
                    );
                }

                return $response->withRedirect('/panel', 301);
            }
        }
        else {
            Session::setSessionType('portal');

            if (Auth::user()->isGuest() && !in_array($route->getName(), $this->exceptions)) {
                return $response->withRedirect('/', 301);
            }
        }

        return $next($request, $response);
    }
}