<?php

namespace App\Controllers\Auth;

use App\Facades\Auth;
use Illuminate\Support\Str;
use App\Interfaces\Request as Request;
use \Psr\Http\Message\ResponseInterface;

class AuthController
{
    /**
     * @var string
     */
    protected $gate;

    /**
     * @var string
     */
    protected $redirect;

    /**
     * @var string
     */
    protected $failedLoginRedirect;

    /**
     * @param Request $request
     */
    protected function defineGate(Request $request)
    {
        $this->gate = Str::contains($request->getAttribute('route')->getName(), 'portal')
            ? 'portal' : 'panel';

        if ($this->gate == 'portal') {
            $this->redirect = '/portal';
            $this->failedLoginRedirect = '/';
        }
        else {
            $this->redirect = '/panel/dashboard';
            $this->failedLoginRedirect = '/panel';
        }
    }

    /**
     * @param Request $request
     * @return ResponseInterface
     */
    public function login(Request $request) :ResponseInterface
    {
        $this->defineGate($request);
        $email = $request->inputs('email');
        $password = $request->inputs('password');

        if(Auth::login($email, $password, $this->gate)) {
            return response()->withRedirect($this->redirect, 301);
        }
        else {
            flash_message('danger', implode('<br>', Auth::getErrors()));

            return response()->withRedirect($this->failedLoginRedirect, 301);
        }
    }

    /**
     * @param Request $request
     * @return ResponseInterface
     */
    public function logout(Request $request) :ResponseInterface
    {
        Auth::logout();
        $this->defineGate($request);

        return response()->withRedirect($this->redirect, 301);
    }
}