<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPublicationRequest;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Publication;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PublicationController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
       $publications = Publication::all();
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

        return view('admin.publications.index', compact('publications'));
    }

    public function create()
    {
       $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');



        return view('admin.publications.create', compact('users'));
    }

    public function store(StorePublicationRequest $request)
    {
       

       // $Publication = Publication::create($request->all());
        $rules = array(
            'fichier' => 'required|file|max:2048',
               'typedocument'    =>  'required',
               'titre'    =>  'required',
               
         );
    
         $error = Validator::make($request->all(), $rules);
    
         if($error->fails())
         {
             return response()->json(['errors' => $error->errors()->all()]);
         }
    
    
         $image = $request->file('fichier');
    
         $new_name = rand() . '.' . $image->getClientOriginalExtension();
    
         $image->move(public_path('images'), $new_name);
           $form_data = array(
               'fichier'  =>     $new_name,
               'typedocument'  =>  $request->typedocument,
               'titre'        =>  $request->titre,
               'titredelivre'         =>  $request->titredelivre,
               'auteur'        =>  $request->auteur,
               'journal'         =>  $request->journal,
               'volume'        =>  $request->volume,
               'numero'         =>  $request->numero,
               'page'            =>  $request->page,
               'annee'         =>  $request->annee,
               'editeur'      =>  $request->editeur,
               'chapitre'     =>  $request->chapitre,
               'itle'     =>  $request->itle,
               'isbn'     =>  $request->isbn,
               'doi'     => $request->doi,
               'url'     =>  $request->url,
               'anneeuniverciteur'     =>  $request->anneeuniverciteur,
               'anneesoutenance'     =>  $request->anneesoutenance,
               'encadreur'     =>  $request->encadreur,
               'resume'     => $request->resume,
               'motcle'     =>  $request->motcle,
               'idApp'     =>  $request->idApp
           );
    
           Publication::create($form_data);
          // return response()->json(['success' => 'Data Added successfully.']);
          // return response()->json(['success' => 'Data Added successfully.']);
        return redirect()->route('admin.publications.index')->withToastSuccess('Task Created Successfully!');
    }

    public function edit(Publication $publication)
    {
       $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publication->load('user');

        return view('admin.publications.edit', compact('users', 'publication'));
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $publication->update($request->all());

        return redirect()->route('admin.publications.index')->withSuccessMessage('Successfully added');
    }

    public function show(Publication $publication)
    {
       $publication->load('user');

        return view('admin.publications.show', compact('publication'));
    }

    public function destroy(Publication $publication)
    {
       $publication->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroyPublicationRequest $request)
    {
        Publication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
