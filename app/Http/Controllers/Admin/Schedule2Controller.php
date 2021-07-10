<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySchedule2Request;
use App\Http\Requests\StoreSchedule2Request;
use App\Http\Requests\UpdateSchedule2Request;
use App\Schedule2;
use App\Axe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class Schedule2Controller extends Controller
{
    public function index()
    {
       // abort_if(Gate::denies('Schedule2_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule2s = Schedule2::all();
        
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
  


        return view('admin.schedule2s.index', compact('schedule2s'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('Schedule2_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $axes = Axe::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.schedule2s.create', compact('axes'));
    }

    public function store(StoreSchedule2Request $request)
    {
        $schedule2 = Schedule2::create($request->all());

        return redirect()->route('admin.schedule2s.index')->withToastSuccess('Task Created Successfully!');
    }

    public function edit(Schedule2 $schedule2)
    {
       // abort_if(Gate::denies('Schedule2_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $axes = Axe::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schedule2->load('axe');

        return view('admin.schedule2s.edit', compact('axes', 'schedule2'));
    }

    public function update(UpdateSchedule2Request $request, Schedule2 $schedule2)
    {
        $schedule2->update($request->all());

        return redirect()->route('admin.schedule2s.index')->withSuccessMessage('Successfully added');
    }

    public function show(Schedule2 $schedule2)
    {
        //abort_if(Gate::denies('Schedule2_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule2->load('axe');

        return view('admin.schedule2s.show', compact('schedule2'));
    }

    public function destroy(Schedule2 $schedule2)
    {
        //abort_if(Gate::denies('Schedule2_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule2->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroySchedule2Request $request)
    {
        Schedule2::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
