<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Schedule;
use App\Speaker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function index()
    {
       // abort_if(Gate::denies('schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedules = Schedule::all();
        if (session( 'success_message'))
    {
        Alert::success('Excellent!', 'Modifier Avec Succès!')->persistent(true,false);
    }
    if(session('toast_success')){
        Alert::success('Excellent!', 'Ajouté Avec Succès!')->persistent(true,false);
    }
    if(session('success')){
        Alert::success('Excellent!', 'Supprimer Avec Succès!')->persistent(true,false);
    }

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speakers = Speaker::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.schedules.create', compact('speakers'));
    }

    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')->withToastSuccess('Task Created Successfully!');
    }

    public function edit(Schedule $schedule)
    {
       // abort_if(Gate::denies('schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speakers = Speaker::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schedule->load('speaker');

        return view('admin.schedules.edit', compact('speakers', 'schedule'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')->withSuccessMessage('Successfully added');
    }

    public function show(Schedule $schedule)
    {
        //abort_if(Gate::denies('schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->load('speaker');

        return view('admin.schedules.show', compact('schedule'));
    }

    public function destroy(Schedule $schedule)
    {
        //abort_if(Gate::denies('schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroyScheduleRequest $request)
    {
        Schedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
