<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjetRequest;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;
use App\Projet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
class ProjetsController extends Controller
{
    public function index()
    {
       $projets = Projet::all();

        return view('admin.projets.index', compact('projets'));
    }

    public function create()
    {
        
        $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');
        return view('admin.projets.create',compact('users'));
      
    }

    public function store(StoreProjetRequest $request)
    {
        $projet = Projet::create($request->all());

        return redirect()->route('admin.projets.index');
    }

    public function edit(Projet $projet)
    {
        $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');

        $projet->load('user');
      return view('admin.projets.edit', compact('projet','users'));
    }

    public function update(UpdateProjetRequest $request, Projet $projet)
    {
        $projet->update($request->all());

        return redirect()->route('admin.projets.index');
    }

    public function show(Projet $projet)
    {
        $projet->load('user');
       return view('admin.projets.show', compact('projet'));
    }

    public function destroy(Projet $projet)
    {
       $projet->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjetRequest $request)
    {
        Projet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
