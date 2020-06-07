<?php

namespace App\Controllers\Portal;

use App\Facades\Auth;
use App\Models\Application;
use App\Controllers\MasterController;
use App\Interfaces\Request as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PortalController extends MasterController
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
            return response()->withRedirect('/portal', 301);
        }

        return view('portal.login', $this->csrf($request))->render();
    }

    /**
     * Show portal dashboard
     *
     * @return Response
     */
    public function dashboard(Request $request) :Response
    {
        $applications = Application::all(['user_id' => user()->id()]);

        return view('portal.dashboard', ['applications' => $applications])->render();
    }
}