@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.projets.create") }}">
               Ajouter Projet
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
      Liste de Projets
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-projet">
                <thead>
                    <tr>
                      
                        <th>
                          
                        </th>
                        <th>
                          Id
                        </th>
                        <th>
                           Titre
                        </th>
                        <th>
                           Type
                        </th>
                        <th>
                           Responsable
                        </th>
                        <th>
                           Member
                        </th>
                        <th>
                            Nature
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projets as $key => $projet)
                        <tr data-entry-id="{{ $projet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $projet->id ?? '' }}
                            </td>
                            <td>
                                {{ $projet->titre ?? '' }}
                            </td>
                            <td>
                                {{ $projet->type ?? '' }}
                            </td>
                            <td>
                                {{ $projet->responsable_id ?? '' }}
                            </td>
                            <td>
                                {{ $projet->id_member ?? '' }}
                            </td>
                            <td>
                                {{ $projet->nature ?? '' }}
                            </td>
                            <td>
                                {{ $projet->description ?? '' }}
                            </td>
                            <td>
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.projets.show', $projet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                             
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.projets.edit', $projet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                              
                                    <form action="{{ route('admin.projets.destroy', $projet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.projets.massDestroy') }}",
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
  $('.datatable-projet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection