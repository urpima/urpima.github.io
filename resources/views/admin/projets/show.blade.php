@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projet.title') }}
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
                            {{ $projet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Titre
                        </th>
                        <td>
                            {{ $projet->titre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Type
                        </th>
                        <td>
                            {{ $projet->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Responsable
                        </th>
                        <td>
                            {{ $projet->responsable_id }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                          Member
                        </th>
                        <td>
                            {{ $projet->id_member }}
                        </td>
                    </tr>
                  
                    <tr>
                        <th>
                            Nature
                        </th>
                        <td>
                            {{ $projet->nature }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{ $projet->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
            Retour à la liste
            </a>
        </div>


    </div>
</div>
@endsection