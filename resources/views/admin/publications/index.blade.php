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
                                <div class="dropdown text-center">
                                    <a class="dropdown-button" id="dropdown-menu-{{ $publication->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
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