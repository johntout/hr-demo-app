<?php

namespace App\Controllers\Panel;

use App\Facades\Auth;
use App\Controllers\MasterController;
use App\Interfaces\Request as Request;
use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;

class PanelController extends MasterController
{
    /**
     * Show portal login form
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request) :Response
    {
        if (!Auth::user()->isGuest()) {
            return response()->withRedirect('/panel/dashboard', 301);
        }

        return view('panel.login', $this->csrf($request))->render();
    }

    /**
     * Show portal dashboard
     *
     * @param Request $request
     * @return Response
     */
    public function dashboard(Request $request) :Response
    {
        $users = User::all();

        return view('panel.dashboard', ['users' => $users])->render();
    }
}