@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.publications.create") }}">
               Ajouter Publication
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
      Liste de Publication
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-publication">
                <thead>
                    <tr>
                    <th>
                            
                        </th>
                       
                        <th>
                            ID
                            </th>
                        <th>
                            Fichier
                        </th>
                        <th>
                           Type Document
                        </th>
                        <th>
                            Titre
                        </th>
                        <th>
                        Titre Livre
                        </th>
                        <th>
                        Auteur
                        </th>
                        <th>
                           Journale
                        </th>
                        <th>
                        Volume
                        </th>
                        <th>
                        Numero
                        </th>
                        <th>
                        Page
                        </th>
                        <th>
                        Année
                        </th>
                        <th>
                        éditeur
                        </th>
                        <th>
                        Encadreur
                        </th>
                        <th>
                        Chapitre
                        </th>
                        <th>
                        Année Universitaire
                        </th>
                        <th>
                        Année de Soutenance
                        </th>
                        <th>
                       Résumé
                        </th>
                        <th>
                      Mots Clés
                        </th>
                        <th>
                        itle
                        </th>
                        <th>
                        Issn
                        </th>
                        <th>
                        Doi
                        </th>
                        <th>
                        Url
                        </th>
                        <th>
                      ID
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publications as $key => $publication)
                        <tr data-entry-id="{{ $publication->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $publication->id ?? '' }}
                            </td>
                            <td>
                                {{ $publication->fichier ?? '' }}
                            </td>
                            <td>
                                {{ $publication->typedocument ?? '' }}
                            </td>
                            <td>
                                {{ $publication->titre ?? '' }}
                            </td>
                            <td>
                                {{ $publication->titredelivre ?? '' }}
                            </td>
                            <td>
                                {{ $publication->auteur ?? '' }}
                            </td>
                            <td>
                                {{ $publication->journal ?? '' }}
                            </td>
                            <td>
                                {{ $publication->volume ?? '' }}
                            </td>
                            <td>
                                {{ $publication->numero ?? '' }}
                            </td>
                            <td>
                                {{ $publication->page ?? '' }}
                            </td>
                            <td>
                                {{ $publication->annee ?? '' }}
                            </td>
                            <td>
                                {{ $publication->editeur ?? '' }}
                            </td>
                            <td>
                                {{ $publication->encadreur ?? '' }}
                            </td>
                            <td>
                                {{ $publication->chapitre ?? '' }}
                            </td>
                            <td>
                                {{ $publication->anneeuniverciteur	 ?? '' }}
                            </td>
                            <td>
                                {{ $publication->anneesoutenance ?? '' }}
                            </td>
                            <td>
                                {{ $publication->resume ?? '' }}
                            </td>
                            <td>
                                {{ $publication->motcle ?? '' }}
                            </td>
                            <td>
                                {{ $publication->itle ?? '' }}
                            </td>
                            <td>
                                {{ $publication->issn ?? '' }}
                            </td>
                            <td>
                                {{ $publication->doi ?? '' }}
                            </td>
                            <td>
                                {{ $publication->url ?? '' }}
                            </td>
                            <td>
                                {{ $publication->idApp ?? '' }}
                            </td>
                            <td>
                                <div class="dropdown text-center">
                                    <a class="dropdown-button" id="dropdown-menu-{{ $publication->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $publication->id }}">
                                        
                                            <a class="dropdown-item" href="{{ route('admin.publications.show', $publication->id) }}">
                                                <i class="fa fa-user fa-lg"></i>
                                                {{ trans('global.view') }}
                                            </a>
                                        
                            
                                        
                                            <a class="dropdown-item" href="{{ route('admin.publications.edit', $publication->id) }}">
                                                <i class="fa fa-edit"></i>
                                                {{ trans('global.edit') }}
                                            </a>
                                        
                                        
                                        
                                            <form id="delete-{{ $publication->id }}" action="{{ route('admin.publications.destroy', $publication->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $publication->id }}').submit()">
                                                <i class="fa fa-trash"></i>
                                                {{ trans('global.delete') }}
                                            </a>
                                        
                                    </div>
                                </div>
                            
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
.dataTables_scrollBody, .dataTables_wrapper {
    position: static !important;
}
.dropdown-button {
    cursor: pointer;
    font-size: 2em;
    display:block
}
.dropdown-menu i {
    font-size: 1.33333333em;
    line-height: 0.75em;
    vertical-align: -15%;
    color: #000;
}
</style>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.publications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-publication:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection