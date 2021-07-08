@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Vue Publication
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
                            {{ $publication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Fichier
                        </th>
                        <td>
                            {{ $publication->fichier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Type de Document
                        </th>
                        <td>
                            {{ $publication->typedocument }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Titre
                        </th>
                        <td>
                            {{ $publication->titre }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                        Titre de Livre
                        </th>
                        <td>
                            {{ $publication->titredelivre }}
                        </td>
                    </tr>
                  
                    <tr>
                        <th>
                      Auteur
                        </th>
                        <td>
                            {{ $publication->auteur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Journal
                        </th>
                        <td>
                            {{ $publication->journal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Volume
                        </th>
                        <td>
                            {{ $publication->volume }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                       Numéro
                        </th>
                        <td>
                            {{ $publication->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                       Page
                        </th>
                        <td>
                            {{ $publication->page }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                      Année
                        </th>
                        <td>
                            {{ $publication->annee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                     éditeur
                        </th>
                        <td>
                            {{ $publication->editeur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                     Encadreur
                        </th>
                        <td>
                            {{ $publication->encandreur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                     Chapitre
                        </th>
                        <td>
                            {{ $publication->chapitre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                     Année Universitaire
                        </th>
                        <td>
                            {{ $publication->anneeuniverciteur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                     Année de Soutenance
                        </th>
                        <td>
                            {{ $publication->anneesoutenance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                    Résumé
                        </th>
                        <td>
                            {{ $publication->resume }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                    Mots Clés
                        </th>
                        <td>
                            {{ $publication->motcle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Itle
                        </th>
                        <td>
                            {{ $publication->itle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Issn
                        </th>
                        <td>
                            {{ $publication->issn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                       Doi
                        </th>
                        <td>
                            {{ $publication->doi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Url
                        </th>
                        <td>
                            {{ $publication->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                 ID
                        </th>
                        <td>
                            {{ $publication->idApp }}
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