@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Aouter Sous Axe
    </div>

    <div class="card-body">
        <form action="{{ route("admin.schedule2s.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">Nom*</label>
                <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', isset($sousaxe) ? $sousaxe->nom : '') }}" required>
                @if($errors->has('nom'))
                    <p class="help-block">
                        {{ $errors->first('nom') }}
                    </p>
                @endif
              
            </div>
            <div class="form-group {{ $errors->has('axe_id') ? 'has-error' : '' }}">
                <label for="axe">Axe</label>
                <select name="Axe_id" id="axe" class="form-control select2">
                    @foreach($axes as $id => $axe)
                        <option value="{{ $id }}" {{ (isset($schedule2) && $schedule2->axe ? $schedule2->axe->id : old('Axe_id')) == $id ? 'selected' : '' }}>{{ $axe }}</option>
                    @endforeach
                </select>
                @if($errors->has('Axe_id'))
                    <p class="help-block">
                        {{ $errors->first('Axe_id') }}
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