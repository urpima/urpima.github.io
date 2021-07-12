@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.gallery.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{route('galleryStore')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.gallery.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($gallery) ? $gallery->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.gallery.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
                <div class="form-group">
                    <label for="cover">Gallery Cover:</label>
                    <input  type="file" class="form-control" id="cover" name="cover" >
                </div>
                @if($errors->has('cover'))
                    <p class="help-block">
                        {{ $errors->first('cover') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.gallery.fields.photos_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
