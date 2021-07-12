@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Vue Memberprojets
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
                            {{ $memberprojet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                         Chercheur
                        </th>
                        <td>
                            {{ $memberprojet->chercheur_id }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                         Projet
                        </th>
                        <td>
                            {{ $memberprojet->projet_id }}
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