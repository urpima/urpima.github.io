@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.galleries.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.gallery.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.gallery.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Gallery">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.gallery.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.gallery.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.gallery.fields.photos') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $key => $gallery)
                        <tr data-entry-id="{{ $gallery->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $gallery->id ?? '' }}
                            </td>
                            <td>
                                {{ $gallery->name ?? '' }}
                            </td>
                            <td>
                                @if($gallery->photos)
                                
                                        <a href="{{ URL::to('/') }}/upload/{{ $gallery->photos }}" target="_blank">
                                            <img src="{{ URL::to('/') }}/upload/{{ $gallery->photos }}" width="50px" height="50px">
                                        </a>
                                 
                                @endif
                            </td>
                            <td>
                                
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.galleries.show', $gallery->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.galleries.edit', $gallery->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                

                                
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.galleries.massDestroy') }}",
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
  $('.datatable-Gallery:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection