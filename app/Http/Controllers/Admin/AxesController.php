<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyaxeRequest;
use App\Http\Requests\StoreaxeRequest;
use App\Http\Requests\UpdateaxeRequest;
use App\Axe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class AxesController extends Controller
{
    public function index()
    {
       $axes = Axe::all();
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

        return view('admin.axes.index', compact('axes'));
    }

    public function create()
    {
        $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');
        return view('admin.axes.create',compact('users'));
    }

    public function store(StoreaxeRequest $request)
    {
        $axe = Axe::create($request->all());

        return redirect()->route('admin.axes.index')->withToastSuccess('Task Created Successfully!');
    }

    public function edit(Axe $axe)
    {
        $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');

        $axe->load('user');
      return view('admin.axes.edit', compact('axe','users'));
    }

    public function update(UpdateaxeRequest $request, Axe $axe)
    {
        $axe->update($request->all());

        return redirect()->route('admin.axes.index')->withSuccessMessage('Successfully added');
    }

    public function show(Axe $axe)
    {
        $axe->load('user');
       return view('admin.axes.show', compact('axe'));
    }

    public function destroy(Axe $axe)
    {
       $axe->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroyaxeRequest $request)
    {
        Axe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
