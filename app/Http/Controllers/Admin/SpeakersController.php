<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpeakerRequest;
use App\Http\Requests\StoreSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;
use App\Speaker;
use App\Axe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class SpeakersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('speaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speakers = Speaker::all();
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

        return view('admin.speakers.index', compact('speakers'));
    }

    public function create()
    {
        //abort_if(Gate::denies('speaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$axes = Axe::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');
        $axes = Axe::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.speakers.create',compact('axes'));
    }

    public function store(StoreSpeakerRequest $request)
    {
        $speaker = Speaker::create($request->all());

       /* if ($request->input('photo', false)) {
            $speaker->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }*/

        return redirect()->route('admin.speakers.index')->withToastSuccess('Task Created Successfully!');
    }

    public function edit(Speaker $speaker)
    {
       // abort_if(Gate::denies('speaker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $axes = Axe::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $speaker->load('axe');

        return view('admin.speakers.edit', compact('axes','speaker'));
    }

    public function update(UpdateSpeakerRequest $request, Speaker $speaker)
    {
        $speaker->update($request->all());

        /*if ($request->input('photo', false)) {
            if (!$speaker->photo || $request->input('photo') !== $speaker->photo->file_name) {
                $speaker->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } else
        if ($speaker->photo) {
            $speaker->photo->delete();
        }*/

        return redirect()->route('admin.speakers.index')->withSuccessMessage('Successfully added');
    }

    public function show(Speaker $speaker)
    {
        //abort_if(Gate::denies('speaker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            
        $speaker->load('axe');
        return view('admin.speakers.show', compact('speaker'));
    }

    public function destroy(Speaker $speaker)
    {
       // abort_if(Gate::denies('speaker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $speaker->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroySpeakerRequest $request)
    {
        Speaker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT)->withSuccess('Task Created Successfully!');
    }
}
