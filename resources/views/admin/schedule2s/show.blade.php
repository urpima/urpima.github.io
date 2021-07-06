@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
     Vue Sous Axes
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
                            {{ $schedule2->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Nom
                        </th>
                        <td>
                            {{ $schedule2->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Axe
                        </th>
                        <td>
                            {{ $schedule2->Axe_id }}
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