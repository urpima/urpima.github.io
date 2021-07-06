@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.axes.create") }}">
               Ajouter axe
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
      Liste de axes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-axe">
                <thead>
                    <tr>
                      
                        <th>
                          
                        </th>
                        <th>
                          Id
                        </th>
                        <th>
                         Nom
                        </th>
                        <th>
                           Responsable
                        </th>
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($axes as $key => $axe)
                        <tr data-entry-id="{{ $axe->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $axe->id ?? '' }}
                            </td>
                            <td>
                                {{ $axe->nom ?? '' }}
                            </td>
                            <td>
                                {{ $axe->responsable_id ?? '' }}
                            </td>
                           
                            <td>
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.axes.show', $axe->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                             
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.axes.edit', $axe->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                              
                                    <form action="{{ route('admin.axes.destroy', $axe->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                   
            <a class="btn btn-xs btn-primary" href="{{ route("admin.axes.create") }}">
               Ajouter Axe
            </a>
      

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
    url: "{{ route('admin.axes.massDestroy') }}",
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
  $('.datatable-axe:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection