@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.cherches.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nom*</label>
                <input type="text" id="name" name="nom" class="form-control" value="{{ old('nom', isset($cherche) ? $cherche->nom : '') }}" required>
                @if($errors->has('nom'))
                    <p class="help-block">
                        {{ $errors->first('nom') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Prenom*</label>
                <input type="text" id="name" name="prenom" class="form-control" value="{{ old('prenom', isset($cherche) ? $cherche->prenom : '') }}" required>
                @if($errors->has('prenom'))
                    <p class="help-block">
                        {{ $errors->first('prenom') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($cherche) ? $cherche->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('Type') ? 'has-error' : '' }}">
                <label for="roles">Type*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="type" id="Type" class="form-control select2" multiple="multiple" required>
                    <option>Admin</option>
                    <option>User</option>
                </select>
                @if($errors->has('Type'))
                    <p class="help-block">
                        {{ $errors->first('Type') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">Photo*</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <p class="help-block">
                        {{ $errors->first('photo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.speaker.fields.photo_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('TypeEnc') ? 'has-error' : '' }}">
                <label for="roles">TypeEnc*</label>
                <select name="typeEnc" id="TypeEnc" class="form-control"  type="text">
                    <option>Interne</option>
                    <option>Externe</option>
                </select>
                @if($errors->has('TypeEnc'))
                    <p class="help-block">
                        {{ $errors->first('TypeEnc') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('Grade') ? 'has-error' : '' }}">
            <label class="control-label col-md-4" >Qualité/ Grade* </label>
             <select class="form-control" name="Grade" id="Grade" type="text">
                    <option>Maitre Conférences</option>
                    <option>Maitre-Assistant</option>
             </select>
           </div>
           
           <div class="form-group">
            <label class="control-label col-md-4">Statut* : </label>
             <select type="text" name="Statut" id="Statut" class="form-control" >
                    <option>Permanent</option>
                    <option>Associé</option>
             </select>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4"> Spécialité*: </label>
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option>Intelligence artificielle</option>
                    <option>Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
           </div>
           <fieldset class="form-group">
    <div class="row">
      <label class="control-label col-md-4">HDR*</label>
      <div class="col-md-8">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="HDR" id="HDR" value="Oui" checked>
          <label class="form-check-label" for="gridRadios1">
            OUI
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="HDR" id="HDR" value="Non">
          <label class="form-check-label" for="gridRadios2">
            NON
          </label>
        </div>
      </div>
    </div>
  </fieldset>

  <fieldset class="form-group">
    <div class="row">
      <label class="control-label col-md-4">PHD*</label>
      <div class="col-md-8">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="PHD" id="PHD" value="Oui" checked>
          <label class="form-check-label" for="gridRadios1">
            OUI
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="PHD" id="PHD" value="Non">
          <label class="form-check-label" for="gridRadios2">
            NON
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.cherches.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($cherche) && $cherche->photo)
      var file = {!! json_encode($cherche->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop