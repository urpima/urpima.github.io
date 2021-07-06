<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyChercheRequest;
use App\Http\Requests\StoreChercheRequest;
use App\Http\Requests\UpdateChercheRequest;
use App\Cherche;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CherchesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $cherches = Cherche::all();

        return view('admin.cherches.index', compact('cherches'));
    }

    public function create()
    {
        //abort_if(Gate::denies('speaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cherches.create');
    }

    public function store(StoreChercheRequest $request)
    {
        $cherche = Cherche::create($request->all());

        if ($request->input('photo', false)) {
            $cherche->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.cherches.index');
    }

    public function edit(Cherche $cherche)
    {
      
        return view('admin.cherches.edit', compact('cherche'));
    }

    public function update(UpdateChercheRequest $request, Cherche $cherche)
    {
        $cherche->update($request->all());

        if ($request->input('photo', false)) {
            if (!$cherche->photo || $request->input('photo') !== $cherche->photo->file_name) {
                $cherche->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($cherche->photo) {
            $cherche->photo->delete();
        }

        return redirect()->route('admin.cherches.index');
    }

    public function show(Cherche $cherche)
    {
       
        return view('admin.cherches.show', compact('cherche'));
    }

    public function destroy(Cherche $cherche)
    {
       // abort_if(Gate::denies('speaker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cherche->delete();

        return back();
    }

    public function massDestroy(MassDestroyChercheRequest $request)
    {
        Cherche::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
}

