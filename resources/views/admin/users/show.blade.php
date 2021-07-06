@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Nom
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Prenom
                        </th>
                        <td>
                            {{ $user->prenom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            HDR
                        </th>
                        <td>
                            {{ $user->HDR }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            PHD
                        </th>
                        <td>
                            {{ $user->PHD }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Grade
                        </th>
                        <td>
                            {{ $user->Grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Spécialité
                        </th>
                        <td>
                            {{ $user->Spécialité}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Statut
                        </th>
                        <td>
                            {{ $user->Statut}}
                           
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                            @if($user->url)
                                <a href="{{ URL::to('/') }}/upload/{{ $user->url }}" target="_blank">
                                    <img src="{{ URL::to('/') }}/upload/{{ $user->url }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            TypeEnc
                        </th>
                        <td>
                            {{ $user->typeEnc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>
                            @foreach($user->roles as $id => $roles)
                                <span class="label label-info label-many">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection