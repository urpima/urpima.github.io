<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMemberprojetRequest;
use App\Http\Requests\StoreMemberprojetRequest;
use App\Http\Requests\UpdateMemberprojetRequest;
use App\Memberprojet;
use App\User;
use App\Projet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;
class MemberprojetsController extends Controller
{
    public function index()
    {
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
      $memberprojets = Memberprojet::all();

        return view('admin.memberprojets.index', compact('memberprojets'));
    }

    public function create()
    {
      $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');
      $projets = Projet::all()->pluck('titre', 'id')->prepend('Veuillez sélectionner', '');
        return view('admin.memberprojets.create',compact('users','projets'));
    }

    public function store(StoreMemberprojetRequest $request)
    {
       $memberprojet = Memberprojet::create($request->all());

        return redirect()->route('admin.memberprojets.index');
    }

    public function edit(Memberprojet $memberprojet)
    {
      $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');

      $memberprojet->load('user');
      $projets = Projet::all()->pluck('titre', 'id')->prepend('Veuillez sélectionner', '');

      $memberprojet->load('projet');
      return view('admin.memberprojets.edit', compact('memberprojet','users','projets'));
    }

    public function update(UpdateMemberprojetRequest $request, Memberprojet $memberprojet)
    {
       $memberprojet->update($request->all());

        return redirect()->route('admin.memberprojets.index');
    }

    public function show(Memberprojet $memberprojet)
    {
       return view('admin.memberprojets.show', compact('memberprojet'));
    }

    public function destroy(Memberprojet $memberprojet)
    {
      $memberprojet->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberprojetRequest $request)
    {
        Memberprojet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
