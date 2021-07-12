@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.memberprojets.create") }}">
               Ajouter Memberprojet
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
      Liste de Memberprojets
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-memberprojet">
                <thead>
                    <tr>
                      
                        <th>
                          
                        </th>
                        <th>
                          Id
                        </th>
                        <th>
                        Chercheur
                        </th>
                        <th>
                           Projet
                        </th>
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($memberprojets as $key => $memberprojet)
                        <tr data-entry-id="{{ $memberprojet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $memberprojet->id ?? '' }}
                            </td>
                            <td>
                                {{ $memberprojet->chercheur_id ?? '' }}
                            </td>
                            <td>
                                {{ $memberprojet->projet_id ?? '' }}
                            </td>
                           
                            <td>
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.memberprojets.show', $memberprojet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                             
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.memberprojets.edit', $memberprojet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                              
                                    <form action="{{ route('admin.memberprojets.destroy', $memberprojet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.memberprojets.massDestroy') }}",
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
  $('.datatable-memberprojet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection