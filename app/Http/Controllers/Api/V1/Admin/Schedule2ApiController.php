<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchedule2Request;
use App\Http\Requests\UpdateSchedule2Request;
use App\Http\Resources\Admin\Schedule2Resource;
use App\Schedule2;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Schedule2ApiController extends Controller
{
    public function index()
    {
       // abort_if(Gate::denies('schedule2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Schedule2Resource(Schedule2::with(['axe'])->get());
    }

    public function store(StoreSchedule2Request $request)
    {
        $schedule2 = Schedule2::create($request->all());

        return (new Schedule2Resource($schedule2))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Schedule2 $schedule2)
    {
      //  abort_if(Gate::denies('Schedule2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Schedule2Resource($schedule2->load(['axe']));
    }

    public function update(UpdateSchedule2Request $request, Schedule2 $schedule2)
    {
        $schedule2->update($request->all());

        return (new Schedule2Resource($schedule2))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Schedule2 $schedule2)
    {
      //  abort_if(Gate::denies('Schedule2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule2->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
