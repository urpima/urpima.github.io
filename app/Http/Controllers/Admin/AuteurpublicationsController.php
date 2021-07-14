<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAuteurpublicationRequest;
use App\Http\Requests\StoreAuteurpublicationRequest;
use App\Http\Requests\UpdateAuteurpublicationRequest;
use App\Auteurpublication;
use Gate;
use App\User;
use App\Publication;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class AuteurpublicationsController extends Controller
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
      $auteurpublications = Auteurpublication::all();

        return view('admin.auteurpublications.index', compact('auteurpublications'));
    }

    public function create()
    {
      $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');
      $publications = Publication::all()->pluck('titre', 'id')->prepend('Veuillez sélectionner', '');
        return view('admin.auteurpublications.create',compact('users','publications'));
    }

    public function store(StoreAuteurpublicationRequest $request)
    {
       $auteurpublication = Auteurpublication::create($request->all());

        return redirect()->route('admin.auteurpublications.index')->withToastSuccess('Task Created Successfully!');
    }

    public function edit(Auteurpublication $auteurpublication)
    {
      $users = User::all()->pluck('name', 'id')->prepend('Veuillez sélectionner', '');

     
      $publications = Publication::all()->pluck('titre', 'id')->prepend('Veuillez sélectionner', '');

      $auteurpublication->load('publication','user');
      return view('admin.auteurpublications.edit', compact('auteurpublication','users','publications'));
    }

    public function update(UpdateAuteurpublicationRequest $request, Auteurpublication $auteurpublication)
    {
       $auteurpublication->update($request->all());

        return redirect()->route('admin.auteurpublications.index')->withSuccessMessage('Successfully added');
    }

    public function show(Auteurpublication $auteurpublication)
    {
       return view('admin.auteurpublications.show', compact('auteurpublication'));
    }

    public function destroy(Auteurpublication $auteurpublication)
    {
      $auteurpublication->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroyAuteurpublicationRequest $request)
    {
        Auteurpublication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT)->withSuccess('Task Created Successfully!');
    }
}
