@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Vue Axes
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
                            {{ $axe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Nom
                        </th>
                        <td>
                            {{ $axe->nom }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                          Responsable
                        </th>
                        <td>
                            {{ $axe->responsable_id }}
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