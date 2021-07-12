@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.memberprojet.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.memberprojets.update", [$memberprojet->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Chercheur*</label>
                <select name="chercheur_id" id="user" class="form-control select2" >
             
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (isset($memberprojet) && $memberprojet->user ? $memberprojet->user->id : old('chercheur_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                
                 @if($errors->has('chercheur_id'))
                    <p class="help-block">
                        {{ $errors->first('chercheur_id') }}
                    </p>
                @endif
            </div>
           

            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Projet*</label>
                <select name="projet_id" id="projet" class="form-control select2" >
             
                    @foreach($projets as $id => $projet)
                        <option value="{{ $id }}" {{ (isset($memberprojet) && $memberprojet->projet ? $memberprojet->projet->id : old('projet_id')) == $id ? 'selected' : '' }}>{{ $projet }}</option>
                    @endforeach
                </select>
                
                 @if($errors->has('projet_id'))
                    <p class="help-block">
                        {{ $errors->first('projet_id') }}
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