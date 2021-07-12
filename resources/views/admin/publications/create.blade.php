@extends('layouts.admin')
@section('content')
<style>
.choixhide {
    display: none;
}
</style>
<div class="card">
    <div class="card-header">
       Ajout Publication
    </div>

    <div class="card-body">
        <form action="{{ route("admin.publications.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('fichier') ? 'has-error' : '' }}">
                <label for="fichier">Fichier</label>
                <input type="file" id="fichier" name="fichier"  v-on:change="(e) => {this.onChangeFileUpload(e)}" class="form-control" value="{{ old('fichier', isset($publication) ? $publication->fichier : '') }}" />
                 @if($errors->has('fichier'))
                    <p class="help-block">
                        {{ $errors->first('fichier') }}
                    </p>
                @endif
            </div>
         
            <div class="form-group {{ $errors->has('typedocument') ? 'has-error' : '' }}">
                <label for="typedocument">Type de Document*</label>
                <select name="typedocument" id="choix" class="form-control" >

                <option value="" selected="selected">------</option>
    <option value="Article">Article</option>
    <option value="Poste">Poster</option>
    <option value="Chapitre">Chapitre </option>
    <option value="REPORTmaster">Rapport master</option>
    <option value="THESE">Thèse</option>
    <option value="HDR">HDR</option>
    <option value="livre">Livre</option>
    <option value="conférence">Conférence</option>
    <option value="Autre">Autre</option>
                </select>
                
                 @if($errors->has('typedocument'))
                    <p class="help-block">
                        {{ $errors->first('typedocument') }}
                    </p>
                @endif
              
        </div>
      
            <div class="form-group {{ $errors->has('titre') ? 'has-error' : '' }}">
                <label for="key">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', isset($publication) ? $publication->titre : '') }}" />
                 @if($errors->has('titre'))
                    <p class="help-block">
                        {{ $errors->first('titre') }}
                    </p>
                @endif
             
            </div>
            
             
<div  id="Article" class="choixhide">


            <div class="form-group {{ $errors->has('page') ? 'has-error' : '' }}">
                <label for="page">Page</label>
                <input type="text" name="page" id="page" class="form-control" value="{{ old('page', isset($publication) ? $publication->page : '') }}" />
                 @if($errors->has('page'))
                    <p class="help-block">
                        {{ $errors->first('page') }}
                    </p>
                @endif
               
            </div>

<div class="form-group {{ $errors->has('journal') ? 'has-error' : '' }}">

                <label for="journal">Journal</label>
                <input type="text" name="journal" id="journal" class="form-control" value="{{ old('journal', isset($publication) ? $publication->journal: '') }}" />
                 @if($errors->has('journal'))
                    <p class="help-block">
                        {{ $errors->first('journal') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('volume') ? 'has-error' : '' }}">
                <label for="volume">volume</label>
                <input type="number" name="volume" id="volume" class="form-control" value="{{ old('volume', isset($publication) ? $publication->volume: '') }}" />
                 @if($errors->has('volume'))
                    <p class="help-block">
                        {{ $errors->first('volume') }}
                    </p>
                @endif
              
            </div>
            <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                <label for="numero">Numéro</label>
                <input type="number" name="numero" id="numero" class="form-control" value="{{ old('numero', isset($publication) ? $publication->numero: '') }}" />
                 @if($errors->has('numero'))
                    <p class="help-block">
                        {{ $errors->first('numero') }}
                    </p>
                @endif
              
            </div>
            <div class="form-group {{ $errors->has('editeur') ? 'has-error' : '' }}">
                <label for="key">éditeur</label>
                <input type="text" name="editeur" id="editeur" class="form-control" value="{{ old('editeur', isset($publication) ? $publication->editeur: '') }}" />
                 @if($errors->has('editeur'))
                    <p class="help-block">
                        {{ $errors->first('editeur') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="key">Url</label>
                <input type="text" name="url" id="url" class="form-control" value="{{ old('url', isset($publication) ? $publication->url: '') }}" />
                 @if($errors->has('editeur'))
                    <p class="help-block">
                        {{ $errors->first('editeur') }}
                    </p>
                @endif
            
            </div>
            <div class="form-group {{ $errors->has('doi') ? 'has-error' : '' }}">
                <label for="key">Doi</label>
                <input type="text" name="doi" id="doi" class="form-control" value="{{ old('doi', isset($publication) ? $publication->doi: '') }}" />
                 @if($errors->has('doi'))
                    <p class="help-block">
                        {{ $errors->first('doi') }}
                    </p>
                @endif
</div>
<div class="form-group {{ $errors->has('annee') ? 'has-error' : '' }}">
                <label for="annee">Année</label>
                <input type="date" name="annee" id="annee" class="form-control" value="{{ old('annee', isset($publication) ? $publication->annee: '') }}" />
                 @if($errors->has('annee'))
                    <p class="help-block">
                        {{ $errors->first('annee') }}
                    </p>
                @endif
             
            </div>

</div>
<div  id="THESE"  class="choixhide">

<div class="form-group {{ $errors->has('anneeuniverciteur') ? 'has-error' : '' }}">
                <label for="key">Annee Universiteur</label>
                <input type="date" name="anneeuniverciteur" id="anneeuniverciteur" class="form-control" value="{{ old('anneeuniverciteur', isset($publication) ? $publication->anneeuniverciteur: '') }}" />
                 @if($errors->has('anneeuniverciteur'))
                    <p class="help-block">
                        {{ $errors->first('anneeuniverciteur') }}
                    </p>
                @endif
            
            </div>
<div class="form-group {{ $errors->has('anneesoutenance') ? 'has-error' : '' }}">
                <label for="key">Annee de Soutenance</label>
                <input type="date" name="anneesoutenance" id="anneesoutenance" class="form-control" value="{{ old('anneesoutenance', isset($publication) ? $publication->anneesoutenance: '') }}" />
                 @if($errors->has('anneesoutenance'))
                    <p class="help-block">
                        {{ $errors->first('anneesoutenance') }}
                    </p>
                @endif
                
            </div>


            <div class="form-group {{ $errors->has('resume') ? 'has-error' : '' }}">
                <label for="key">Résumé</label>
                <input type="text" name="resume" id="resume" class="form-control" value="{{ old('resume', isset($publication) ? $publication->resume: '') }}" />
                 @if($errors->has('resume'))
                    <p class="help-block">
                        {{ $errors->first('resume') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('motcle') ? 'has-error' : '' }}">
                <label for="key">Mot Clé</label>
                <input type="text" name="motcle" id="motcle" class="form-control" value="{{ old('motcle', isset($publication) ? $publication->motcle: '') }}" />
                 @if($errors->has('motcle'))
                    <p class="help-block">
                        {{ $errors->first('motcle') }}
                    </p>
                @endif
            
            </div>   <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                <label for="key">ID</label>
                <input type="text" name="id" id="id" class="form-control" value="{{ old('id', isset($publication) ? $publication->id: '') }}" />
                 @if($errors->has('id'))
                    <p class="help-block">
                        {{ $errors->first('id') }}
                    </p>
                @endif
             
            </div>
            </div>
            <div  id="REPORTmaster" class="choixhide">
           
            <div class="form-group {{ $errors->has('anneeuniverciteur') ? 'has-error' : '' }}">
                <label for="key">Annee Universiteur</label>
                <input type="date" name="anneeuniverciteur" id="anneeuniverciteur" class="form-control" value="{{ old('anneeuniverciteur', isset($publication) ? $publication->anneeuniverciteur: '') }}" />
                 @if($errors->has('anneeuniverciteur'))
                    <p class="help-block">
                        {{ $errors->first('anneeuniverciteur') }}
                    </p>
                @endif
            
            </div>
<div class="form-group {{ $errors->has('anneesoutenance') ? 'has-error' : '' }}">
                <label for="key">Annee de Soutenance</label>
                <input type="date" name="anneesoutenance" id="anneesoutenance" class="form-control" value="{{ old('anneesoutenance', isset($publication) ? $publication->anneesoutenance: '') }}" />
                 @if($errors->has('anneesoutenance'))
                    <p class="help-block">
                        {{ $errors->first('anneesoutenance') }}
                    </p>
                @endif
                
            </div>
            <div class="form-group {{ $errors->has('encadreur') ? 'has-error' : '' }}">
                <label for="encadreur">Encadreur</label>
                <select name="encadreur" id="user" class="form-control select2" >
             
             @foreach($users as $id => $user)
                 <option value="{{ $id }}" {{ (isset($publication) && $publication->user ? $publication->user->id : old('encadreur')) == $id ? 'selected' : '' }}>{{ $user }}</option>
             @endforeach
         </select>
         @if($errors->has('encadreur'))
                    <p class="help-block">
                        {{ $errors->first('encadreur') }}
                    </p>
                @endif
               
            </div>
            </div>
            <div  id="HDR" class="choixhide">

<div class="form-group {{ $errors->has('anneeuniverciteur') ? 'has-error' : '' }}">
                <label for="key">Annee Universiteur</label>
                <input type="date" name="anneeuniverciteur" id="anneeuniverciteur" class="form-control" value="{{ old('anneeuniverciteur', isset($publication) ? $publication->anneeuniverciteur: '') }}" />
                 @if($errors->has('anneeuniverciteur'))
                    <p class="help-block">
                        {{ $errors->first('anneeuniverciteur') }}
                    </p>
                @endif
            
            </div>
<div class="form-group {{ $errors->has('anneesoutenance') ? 'has-error' : '' }}">
                <label for="key">Annee de Soutenance</label>
                <input type="date" name="anneesoutenance" id="anneesoutenance" class="form-control" value="{{ old('anneesoutenance', isset($publication) ? $publication->anneesoutenance: '') }}" />
                 @if($errors->has('anneesoutenance'))
                    <p class="help-block">
                        {{ $errors->first('anneesoutenance') }}
                    </p>
                @endif
                
            </div>


            <div class="form-group {{ $errors->has('resume') ? 'has-error' : '' }}">
                <label for="key">Résumé</label>
                <input type="text" name="resume" id="resume" class="form-control" value="{{ old('resume', isset($publication) ? $publication->resume: '') }}" />
                 @if($errors->has('resume'))
                    <p class="help-block">
                        {{ $errors->first('resume') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('motcle') ? 'has-error' : '' }}">
                <label for="key">Mot Clé</label>
                <input type="text" name="motcle" id="motcle" class="form-control" value="{{ old('motcle', isset($publication) ? $publication->motcle: '') }}" />
                 @if($errors->has('motcle'))
                    <p class="help-block">
                        {{ $errors->first('motcle') }}
                    </p>
                @endif
            
            </div>   <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                <label for="key">ID</label>
                <input type="text" name="idApp" id="idApp" class="form-control" value="{{ old('idApp', isset($publication) ? $publication->idApp: '') }}" />
                 @if($errors->has('idApp'))
                    <p class="help-block">
                        {{ $errors->first('idApp') }}
                    </p>
                @endif
             
            </div>
            </div>

<div  id="conférence" class="choixhide">

            <div class="form-group {{ $errors->has('page') ? 'has-error' : '' }}">
                <label for="page">Page</label>
                <input type="text" name="page" id="page" class="form-control" value="{{ old('page', isset($publication) ? $publication->page : '') }}" />
                 @if($errors->has('page'))
                    <p class="help-block">
                        {{ $errors->first('page') }}
                    </p>
                @endif
               
            </div>

<div class="form-group {{ $errors->has('titredelivre') ? 'has-error' : '' }}">
                <label for="key">Titre de livre</label>
                <input type="text" name="titredelivre" id="titredelivre" class="form-control" value="{{ old('titredelivre', isset($publication) ? $publication->titredelivre: '') }}" />
                 @if($errors->has('titredelivre'))
                    <p class="help-block">
                        {{ $errors->first('titredelivre') }}
                    </p>
                @endif
                
            </div>


            <div class="form-group {{ $errors->has('volume') ? 'has-error' : '' }}">
                <label for="key">volume</label>
                <input type="number" name="volume" id="volume" class="form-control" value="{{ old('volume', isset($publication) ? $publication->volume: '') }}" />
                 @if($errors->has('volume'))
                    <p class="help-block">
                        {{ $errors->first('volume') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                <label for="key">Numéro</label>
                <input type="number" name="numero" id="numero" class="form-control" value="{{ old('numero', isset($publication) ? $publication->numero: '') }}" />
                 @if($errors->has('numero'))
                    <p class="help-block">
                        {{ $errors->first('numero') }}
                    </p>
                @endif
            
            </div>
            <div class="form-group {{ $errors->has('doi') ? 'has-error' : '' }}">
                <label for="key">Doi</label>
                <input type="text" name="doi" id="doi" class="form-control" value="{{ old('doi', isset($publication) ? $publication->doi: '') }}" />
                 @if($errors->has('doi'))
                    <p class="help-block">
                        {{ $errors->first('doi') }}
                    </p>
                @endif
</div>
<div class="form-group {{ $errors->has('annee') ? 'has-error' : '' }}">
                <label for="annee">Année</label>
                <input type="date" name="annee" id="annee" class="form-control" value="{{ old('annee', isset($publication) ? $publication->annee: '') }}" />
                 @if($errors->has('annee'))
                    <p class="help-block">
                        {{ $errors->first('annee') }}
                    </p>
                @endif
             
            </div>

            </div>
<div  id="Chapitre" class="choixhide">


            <div class="form-group {{ $errors->has('page') ? 'has-error' : '' }}">
                <label for="page">Page</label>
                <input type="text" name="page" id="page" class="form-control" value="page1" />
                 @if($errors->has('page'))
                    <p class="help-block">
                        {{ $errors->first('page') }}
                    </p>
                @endif
               
            </div>

<div class="form-group {{ $errors->has('itle') ? 'has-error' : '' }}">
                <label for="key">itle</label>
                <input type="text" name="itle" id="itle" class="form-control" value="{{ old('itle', isset($publication) ? $publication->itle: '') }}" />
                 @if($errors->has('itle'))
                    <p class="help-block">
                        {{ $errors->first('itle') }}
                    </p>
                @endif
             
            </div>

<div class="form-group {{ $errors->has('volume') ? 'has-error' : '' }}">
                <label for="key">Volune</label>
                <input type="number" name="volume" id="volume" class="form-control" value="{{ old('volume', isset($publication) ? $publication->volume: '') }}" />
                 @if($errors->has('volume'))
                    <p class="help-block">
                        {{ $errors->first('volume') }}
                    </p>
                @endif
             </div>
                <div class="form-group {{ $errors->has('annee') ? 'has-error' : '' }}">
                <label for="annee">Année</label>
                <input type="date" name="annee" id="annee" class="form-control" value="{{ old('annee', isset($publication) ? $publication->annee: '') }}" />
                 @if($errors->has('annee'))
                    <p class="help-block">
                        {{ $errors->first('annee') }}
                    </p>
                @endif
             
            </div>

<div class="form-group {{ $errors->has('titredelivre') ? 'has-error' : '' }}">
                <label for="key">Titre de livre</label>
                <input type="text" name="titredelivre" id="titredelivre" class="form-control" value="{{ old('titredelivre', isset($publication) ? $publication->titredelivre: '') }}" />
                 @if($errors->has('titredelivre'))
                    <p class="help-block">
                        {{ $errors->first('titredelivre') }}
                    </p>
                @endif
            
            </div>
<div class="form-group {{ $errors->has('editeur') ? 'has-error' : '' }}">
                <label for="key">éditeur</label>
                <input type="text" name="editeur" id="editeur" class="form-control" value="{{ old('editeur', isset($publication) ? $publication->editeur: '') }}" />
                 @if($errors->has('editeur'))
                    <p class="help-block">
                        {{ $errors->first('editeur') }}
                    </p>
                @endif
            
                </div>
                <div class="form-group {{ $errors->has('chapitre') ? 'has-error' : '' }}">
                <label for="key">Chapitre</label>
                <input type="text" name="chapitre" id="chapitre" class="form-control" value="{{ old('chapitre', isset($publication) ? $publication->chapitre: '') }}" />
                 @if($errors->has('chapitre'))
                    <p class="help-block">
                        {{ $errors->first('chapitre') }}
                    </p>
                @endif
             
            </div>

<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="key">Url</label>
                <input type="text" name="url" id="url" class="form-control" value="{{ old('url', isset($publication) ? $publication->url: '') }}" />
                 @if($errors->has('url'))
                    <p class="help-block">
                        {{ $errors->first('url') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('issn') ? 'has-error' : '' }}">
                <label for="key">Issn</label>
                <input type="number" name="issn" id="issn" class="form-control" value="{{ old('issn', isset($publication) ? $publication->issn: '') }}" />
                 @if($errors->has('issn'))
                    <p class="help-block">
                        {{ $errors->first('issn') }}
                    </p>
                @endif
             
            </div>
            <div class="form-group {{ $errors->has('doi') ? 'has-error' : '' }}">
                <label for="key">Doi</label>
                <input type="text" name="doi" id="doi" class="form-control" value="{{ old('doi', isset($publication) ? $publication->doi: '') }}" />
                 @if($errors->has('doi'))
                    <p class="help-block">
                        {{ $errors->first('doi') }}
                    </p>
                @endif

</div>
</div>
<div  id="livre" class="choixhide">


            <div class="form-group {{ $errors->has('page') ? 'has-error' : '' }}">
                <label for="page">Page</label>
                <input type="text" name="page" id="page" class="form-control" value="{{ old('page', isset($publication) ? $publication->page : '') }}" />
                 @if($errors->has('page'))
                    <p class="help-block">
                        {{ $errors->first('page') }}
                    </p>
                @endif
               
            </div>

<div class="form-group {{ $errors->has('itle') ? 'has-error' : '' }}">
                <label for="key">itle</label>
                <input type="text" name="itle" id="itle" class="form-control" value="{{ old('itle', isset($publication) ? $publication->itle: '') }}" />
                 @if($errors->has('itle'))
                    <p class="help-block">
                        {{ $errors->first('itle') }}
                    </p>
                @endif
             
            </div>

<div class="form-group {{ $errors->has('volume') ? 'has-error' : '' }}">
                <label for="key">Journal</label>
                <input type="number" name="volume" id="volume" class="form-control" value="{{ old('volume', isset($publication) ? $publication->volume: '') }}" />
                 @if($errors->has('volume'))
                    <p class="help-block">
                        {{ $errors->first('volume') }}
                    </p>
                @endif
             
      
</div>
<div class="form-group {{ $errors->has('editeur') ? 'has-error' : '' }}">
                <label for="key">éditeur</label>
                <input type="text" name="editeur" id="editeur" class="form-control" value="{{ old('editeur', isset($publication) ? $publication->editeur: '') }}" />
                 @if($errors->has('editeur'))
                    <p class="help-block">
                        {{ $errors->first('editeur') }}
                    </p>
                @endif
</div>
<div class="form-group {{ $errors->has('annee') ? 'has-error' : '' }}">
                <label for="annee">Année</label>
                <input type="date" name="annee" id="annee" class="form-control" value="{{ old('annee', isset($publication) ? $publication->annee: '') }}" />
                 @if($errors->has('annee'))
                    <p class="help-block">
                        {{ $errors->first('annee') }}
                    </p>
                @endif
             
            </div>

<div class="form-group {{ $errors->has('doi') ? 'has-error' : '' }}">
                <label for="key">Doi</label>
                <input type="text" name="doi" id="doi" class="form-control" value="{{ old('doi', isset($publication) ? $publication->doi: '') }}" />
                 @if($errors->has('doi'))
                    <p class="help-block">
                        {{ $errors->first('doi') }}
                    </p>
                @endif
</div>

</div>


<div>
                <input class="btn btn-danger" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#choix").change(function(){
      // alert($(this).val());
      $(this).find("option:selected").each(function(){
          var optionValue=$(this).attr("value");
          if(optionValue){
            $(".choixhide").not("."+ optionValue).hide();
            $("#" + optionValue).show();
          }
            else{
                $(".choixhide").hide;
            }
          
      })
      // $(".choixhide").hide;
       // $("#" + $(this).val()).fadeIn(0);
    });
});
</script>
@endsection