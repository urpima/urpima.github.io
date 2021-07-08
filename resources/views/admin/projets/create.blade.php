@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projet.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Titre*</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', isset($projet) ? $projet->titre : '') }}"/>
                 @if($errors->has('titre'))
                    <p class="help-block">
                        {{ $errors->first('titre') }}
                    </p>
                @endif
              
            </div>

            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Type*</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type', isset($projet) ? $projet->type : '') }}" />
                 @if($errors->has('type'))
                    <p class="help-block">
                        {{ $errors->first('type') }}
                    </p>
                @endif
               
            </div>

            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Responsable*</label>
                <select name="responsable_id" id="user" class="form-control select2" >
             
             @foreach($users as $id => $user)
                 <option value="{{ $id }}" {{ (isset($axe) && $axe->user ? $axe->user->id : old('responsable_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
             @endforeach
         </select>
                
                 @if($errors->has('responsable_id'))
                    <p class="help-block">
                        {{ $errors->first('responsable_id') }}
                    </p>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Members*</label>
                <select name="id_member" id="user" class="form-control select2" >
             
             @foreach($users as $id => $user)
                 <option value="{{ $id }}" {{ (isset($projet) && $projet->user ? $axe->user->id : old('id_member')) == $id ? 'selected' : '' }}>{{ $user }}</option>
             @endforeach
         </select>
                
                 @if($errors->has('id_member'))
                    <p class="help-block">
                        {{ $errors->first('id_member') }}
                    </p>
                @endif
              
            </div>
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Nature*</label>
                <input type="text" name="nature" id="nature" class="form-control" value="{{ old('nature', isset($projet) ? $projet->nature : '') }}" />
                @if($errors->has('nature'))
                    <p class="help-block">
                        {{ $errors->first('nature') }}
                    </p>
                @endif
              
            </div>

            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Description*</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description', isset($projet) ? $projet->description : '') }}" />
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
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