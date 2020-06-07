<?php

namespace App\Controllers\Panel;

use App\Helpers\App;
use App\Models\Application;
use App\Controllers\MasterController;
use App\Interfaces\Request as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ApprovalsController extends MasterController
{
    /**
     * Approve Application
     *
     * @param Request $request
     * @return Response
     */
    public function approve(Request $request) :Response
    {
        $id = App::sanitizeInput($request->getAttribute('id'));
        $application = Application::findOrFail($id);
        $application->approve();

        flash_message('success', 'Application approved!');

        return response()->withRedirect('/panel', 301);
    }

    /**
     * Reject Application
     *
     * @param Request $request
     * @return Response
     */
    public function reject(Request $request) :Response
    {
        $id = App::sanitizeInput($request->getAttribute('id'));
        $application = Application::findOrFail($id);
        $application->reject();

        flash_message('success', 'Application rejected!');

        return response()->withRedirect('/panel', 301);
    }
}