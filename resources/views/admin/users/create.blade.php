@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nom*</label>
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
  </div>
  <div class="form-group {{ $errors->has('PHD') ? 'has-error' : '' }}">
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
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
  <label for="password">{{ trans('cruds.user.fields.password') }}</label>
  <div class="input_box">
  <input type="password" id="password" name="password" class="form-control" required>
  <i class="fa fa-eye"  id="show_hide"></i></div>
  @if($errors->has('password'))
      <p class="help-block">
          {{ $errors->first('password') }}
      </p>
  @endif
  <p class="helper-block">
      {{ trans('cruds.user.fields.password_helper') }}
  </p>
</div>
            <div class="form-group {{ $errors->has('Grade') ? 'has-error' : '' }}">
            <label class="control-label col-md-4" >Qualité/ Grade* </label>
             <select class="form-control" name="Grade" id="Grade" type="text">
                    <option>Maitre Conférences</option>
                    <option>Maitre-Assistant</option>
             </select>
           </div>
            
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">Roles*
                    <span class="btn btn-info btn-xs select-all">Tout sélectionner</span>
                    <span class="btn btn-info btn-xs deselect-all">Tout déselectionner</span></label>
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
            
           <div class="form-group">
            <label class="control-label col-md-4"> Spécialité*: </label>
             <select class="form-control" type="text" name="Spécialité" id="Spécialité">
             @foreach($axes as $id => $axe)
                 <option value="{{ $id }}" {{ (isset($user) && $projet->user ? $axe->id : old('Spécialité')) == $id ? 'selected' : '' }}>{{ $axe }}</option>
             @endforeach
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
            <label class="control-label col-md-4">TypeEnc* : </label>
             <select type="text" name="typeEnc" id="typeEnc" class="form-control" >
                    
                    <option>Interne</option>
                    <option>Externe</option>
             </select>
           </div>
           <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
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
      var file = {!! json_encode($user->url) !!}
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

<script>
var password = document.getElementById("password");
var show_hide = document.getElementById("show_hide");

show_hide.onclick = function()
{
  if(password.type == "password")
  {
    password.type = "text";
    show_hide.style.color="green";
  }
  else{
    password.type = "password";
    show_hide.style.color="#ccc";
  }
}
</script> 
<script>
  
  const inputs = document.querySelectorAll('input');

// regex patterns
const patterns = {
  name: /^[a-z\d]{2,12}$/i,
  prenom: /^[a-z\d]{2,12}$/i,
  password: /^[a-z\d\.-\d\.!]{6,16}$/i,
  email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/
        //             yourname @ domain   .  com          ( .uk )
};

// validation function
function validate(field, regex){

    if(regex.test(field.value)){
        field.className = 'valid';
    } else {
        field.className = 'invalid';
    }

}

// attach keyup events to inputs
inputs.forEach((input) => {
    input.addEventListener('keyup', (e) => {
            // console.log(patterns[e.target.attributes.name.value]);
            validate(e.target, patterns[e.target.attributes.name.value]);
    });
});
  </script>
@stop