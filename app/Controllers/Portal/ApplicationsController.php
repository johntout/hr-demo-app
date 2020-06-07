<?php

namespace App\Controllers\Portal;

use App\Helpers\App;
use App\Factories\ApplicationFactory;
use App\Controllers\MasterController;
use App\Interfaces\Request as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ApplicationsController extends MasterController
{
    /**
     * Show user creation form
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) :Response
    {
        return view('portal.applications.create', $this->csrf($request))->render();
    }

    /**
     * Insert Application
     *
     * @param Request $request
     * @return Response
     */
    public function insert(Request $request) :Response
    {
        $inputStartDate = $request->inputs('start_date');
        $inputEndDate = $request->inputs('end_date');
        $startDate = date('Y-m-d', strtotime($inputStartDate));
        $endDate = date('Y-m-d', strtotime($inputEndDate));
        $startDateTime = new \DateTime($startDate);
        $endDateTime = new \DateTime($endDate);
        $totalDays = $startDateTime->diff($endDateTime)->days + 1;

        $data = [
            'user_id' => user()->id(),
            'created_at' => now(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_days' => $totalDays,
            'reason' => $request->inputs('reason'),
            'status' => App::applicationStatus()[0],
        ];

        $validateData = $this->validateData($data);
        if ($validateData === false) {
            session()->set('applications.create.start_date', $inputStartDate);
            session()->set('applications.create.end_date', $inputEndDate);
            session()->set('applications.create.reason', $data['reason']);

            return response()->withRedirect('/portal/applications/create', 301);
        }

        $application = ApplicationFactory::build($data);
        $application->insert();
        session()->unset('applications');

        flash_message('success', 'Application Created!');

        return response()->withRedirect('/portal', 301);
    }

    /**
     * @param array $data
     * @return bool
     */
    private function validateData(array $data) :bool
    {
        $success = true;

        if(empty($data['start_date'])) {
            flash_message('danger', 'Start date is required!');
            $success = false;
        }

        if(empty($data['end_date'])) {
            flash_message('danger', 'End date is required!');
            $success = false;
        }

        if(empty($data['reason'])) {
            flash_message('danger', 'Reason is required!');
            $success = false;
        }

        return $success;
    }
}