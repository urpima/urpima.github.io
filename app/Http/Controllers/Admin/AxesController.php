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
class AxesController extends Controller
{
    public function index()
    {
       $axes = Axe::all();

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

        return redirect()->route('admin.axes.index');
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

        return redirect()->route('admin.axes.index');
    }

    public function show(Axe $axe)
    {
        $axe->load('user');
       return view('admin.axes.show', compact('axe'));
    }

    public function destroy(Axe $axe)
    {
       $axe->delete();

        return back();
    }

    public function massDestroy(MassDestroyaxeRequest $request)
    {
        Axe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
