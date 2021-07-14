@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      Ajouter Auteurpublications
    </div>

    <div class="card-body">
        <form action="{{ route("admin.auteurpublications.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Chercheur*</label>
                <select name="chercheur_id" id="user" class="form-control select2" >
             
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (isset($auteurpublication) && $auteurpublication->user ? $auteurpublication->user->id : old('chercheur_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                
                 @if($errors->has('chercheur_id'))
                    <p class="help-block">
                        {{ $errors->first('chercheur_id') }}
                    </p>
                @endif
            </div>
           

            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Publication*</label>
                <select name="publication_id" id="publication" class="form-control select2" >
             
                    @foreach($publications as $id => $publication)
                        <option value="{{ $id }}" {{ (isset($auteurpublication) && $auteurpublication->publication ? $auteurpublication->publication->id : old('publication_id')) == $id ? 'selected' : '' }}>{{ $publication }}</option>
                    @endforeach
                </select>
                
                 @if($errors->has('publication_id'))
                    <p class="help-block">
                        {{ $errors->first('publication_id') }}
                    </p>
                @endif
            </div>
           
            
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection