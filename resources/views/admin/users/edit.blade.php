@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                <label for="prenom">Prenom*</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom', isset($user) ? $user->prenom : '') }}" required>
                @if($errors->has('prenom'))
                    <p class="help-block">
                        {{ $errors->first('prenom') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('HDR') ? 'has-error' : '' }}">
              <fieldset class="form-group">
    <div class="row">
      <label class="control-label col-md-4">HDR*</label>
      <div class="col-md-8">
        <div class="form-check">
          @if($user->HDR=='Oui')
       
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
      
        @else 
        
          <input class="form-check-input" type="radio" name="HDR" id="HDR" value="Oui" >
          <label class="form-check-label" for="gridRadios1">
            OUI
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="HDR" id="HDR" value="Non" checked>
          <label class="form-check-label" for="gridRadios2">
            NON
          </label>
        </div>
        
        @endif

      </div>
    </div>
  </fieldset>
  </div>

  <div class="form-group {{ $errors->has('PHD') ? 'has-error' : '' }}">
  <fieldset class="form-group">
    <div class="row">
      <label class="control-label col-md-4">PHD*</label>
      <div class="col-md-8">
        <div class="form-check">
        @if($user->PHD=='Oui')
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
    @else 
    <input class="form-check-input" type="radio" name="PHD" id="PHD" value="Oui" >
          <label class="form-check-label" for="gridRadios1">
            OUI
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="PHD" id="PHD" value="Non" checked>
          <label class="form-check-label" for="gridRadios2">
            NON
          </label>
        </div>
      </div>
    </div>
    @endif
  </fieldset>
</div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('Grade') ? 'has-error' : '' }}">
            <label class="control-label col-md-4" >Qualité/ Grade* </label>
             @if($user->Grade=='Maitre Conférences')
            <select class="form-control" name="Grade" id="Grade" type="text" >
                    <option selected>Maitre Conférences</option>
                    <option>Maitre-Assistant</option>
             </select>
             
             @else
            <select class="form-control" name="Grade" id="Grade" type="text" >
                    <option >Maitre Conférences</option>
                    <option selected>Maitre-Assistant</option>
             </select>
             @endif
           </div>
           <div class="form-group">
            <label class="control-label col-md-4"> Spécialité*: </label>
            @if($user->Spécialité=='Intelligence artificielle')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option selected>Intelligence artificielle</option>
                    <option>Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
              @endif
             @if($user->Spécialité=='Réseau et télécommunication')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option selected>Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
             @endif
             @if($user->Spécialité=='Statistiques')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option >Réseau et télécommunication</option>
                    <option selected>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
             @endif
             @if($user->Spécialité=='Optimisation combinatoire')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option >Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option selected>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
             @endif
             @if($user->Spécialité=='Bases de données')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option >Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option selected>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
             @endif
             @if($user->Spécialité=='Equations aux dérivées partielles')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option >Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option selected>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
             @endif
             @if($user->Spécialité=='Analyse Numérique')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option >Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option selected>Analyse Numérique</option>
             </select>
             @endif
             @if($user->Spécialité=='Réseau et télécommunication')
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
                    <option >Intelligence artificielle</option>
                    <option selected>Réseau et télécommunication</option>
                    <option>Statistiques</option>
                    <option>Optimisation combinatoire</option>
                    <option>Bases de données</option>
                    <option>Equations aux dérivées partielles</option>
                    <option>Analyse Numérique</option>
             </select>
             @endif
           </div>
            <div class="form-group">
            <label class="control-label col-md-4">Statut* : </label>
            @if($user->Statut=='Permanent')
             <select type="text" name="Statut" id="Statut" class="form-control" >
                    <option selected>Permanent</option>
                    <option>Associé</option>
             </select>
             @else
             <select type="text" name="Statut" id="Statut" class="form-control" >
                    <option >Permanent</option>
                    <option selected>Associé</option>
             </select>
             @endif
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">TypeEnc* : </label>
            @if($user->typeEnc=='Interne')
             <select type="text" name="typeEnc" id="typeEnc" class="form-control" >
                    <option selected>Interne</option>
                    <option>Externe</option>
             </select>
             @else
             <select type="text" name="typeEnc" id="typeEnc" class="form-control" >
                    <option >Interne</option>
                    <option selected >Externe</option>
             </select>
             @endif
           </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <p class="help-block">
                        {{ $errors->first('roles') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="photo">Photo</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('url'))
                    <p class="help-block">
                        {{ $errors->first('url') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.speaker.fields.photo_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </form>


    </div>
</div>
@endsection
@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
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
      $('form').find('input[name="url"]').remove()
      $('form').append('<input type="hidden" name="url" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="url"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->url)
      var file = {!! json_encode($user->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="url" value="' + file.file_name + '">')
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