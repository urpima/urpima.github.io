@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Cherche
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $cherche->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nom
                        </th>
                        <td>
                            {{ $cherche->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Prenom
                        </th>
                        <td>
                            {!! $cherche->prenom !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $cherche->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email_verified_at
                        </th>
                        <td>
                            {{ $cherche->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Photo
                        </th>
                        <td>
                            @if($cherche->photo)
                                <a href="{{ $cherche->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $cherche->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Password
                        </th>
                        <td>
                            {{ $cherche->password}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          HDR
                        </th>
                        <td>
                            {{ $cherche->HDR }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           PHD
                        </th>
                        <td>
                            {{ $cherche->PHD }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Grade
                        </th>
                        <td>
                            {{ $cherche->Grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Spécialité
                        </th>
                        <td>
                            {{ $cherche->Spécialité }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Statut
                        </th>
                        <td>
                            {{ $cherche->Statut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Type
                        </th>
                        <td>
                            {{ $cherche->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        TypeEnc
                        </th>
                        <td>
                            {{ $cherche->typeEnc }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection