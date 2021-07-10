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
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.publications.show', $publication->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    <a href="{{ url('/images',$publication->fichier )}}" class="btn btn-xs btn-primary"><i class="icon-download-alt"> Telechager le Fichier </i>  </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.publications.edit', $publication->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                              
                                    <form action="{{ route('admin.publications.destroy', $publication->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                          

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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