@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      Ajouter Axes
    </div>

    <div class="card-body">
        <form action="{{ route("admin.axes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Nom*</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', isset($axe) ? $axe->nom : '') }}"/>
                 @if($errors->has('nom'))
                    <p class="help-block">
                        {{ $errors->first('nom') }}
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
           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection