@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.schedule2s.create") }}">
                Ajouter Sous Axe
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
       Liste des Sous Axes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-schedule2">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                         ID
                        </th>
                        <th>
                           Nom
                        </th>
                        <th>
                            Axe
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedule2s as $key => $schedule2)
                        <tr data-entry-id="{{ $schedule2->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $schedule2->id ?? '' }}
                            </td>
                            <td>
                                {{ $schedule2->nom ?? '' }}
                            </td>
                            <td>
                                {{ $schedule2->Axe_id ?? '' }}
                            </td>
                          
                            <td>
                                
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.schedule2s.show', $schedule2->id) }}">
                                       Vue
                                    </a>
                                

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.schedule2s.edit', $schedule2->id) }}">
                                        Modifier
                                    </a>
                                

                                
                                    <form action="{{ route('admin.schedule2s.destroy', $schedule2->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Supprimer">
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
    url: "{{ route('admin.schedule2s.massDestroy') }}",
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
  $('.datatable-schedule2:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection