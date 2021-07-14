@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.schedule2s.create") }}">
            <i class="fas fa-user-plus"></i>
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
                                <div class="dropdown text-center">
                                    <a class="dropdown-button" id="dropdown-menu-{{ $schedule2->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $schedule2->id }}">
                                        
                                            <a class="dropdown-item" href="{{ route('admin.schedule2s.show', $schedule2->id) }}">
                                                <i class="fa fa-user fa-lg"></i>
                                                {{ trans('global.view') }}
                                            </a>
                                        
                            
                                        
                                            <a class="dropdown-item" href="{{ route('admin.schedule2s.edit', $schedule2->id) }}">
                                                <i class="fa fa-edit"></i>
                                                {{ trans('global.edit') }}
                                            </a>
                                        
                                        
                                        
                                            <form id="delete-{{ $schedule2->id }}" action="{{ route('admin.schedule2s.destroy', $schedule2->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $schedule2->id }}').submit()">
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