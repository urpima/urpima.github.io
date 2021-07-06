@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.sponsors.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.sponsor.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sponsor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Sponsor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sponsor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sponsor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.sponsor.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.sponsor.fields.link') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sponsors as $key => $sponsor)
                        <tr data-entry-id="{{ $sponsor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sponsor->id ?? '' }}
                            </td>
                            <td>
                                {{ $sponsor->name ?? '' }}
                            </td>
                            <td>
                                @if($sponsor->logo)
                                    <a href="#" target="_blank">
                                        <img src="{{ URL::to('/') }}/upload/{{ $sponsor->logo }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $sponsor->link ?? '' }}
                            </td>
                            <td>
    <div class="dropdown text-center">
        <a class="dropdown-button" id="dropdown-menu-{{ $sponsor->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $sponsor->id }}">
            
                <a class="dropdown-item" href="{{ route('admin.sponsors.show', $sponsor->id) }}">
                    <i class="fa fa-user fa-lg"></i>
                    {{ trans('global.view') }}
                </a>
            

            
                <a class="dropdown-item" href="{{ route('admin.sponsors.edit', $sponsor->id) }}">
                    <i class="fa fa-edit"></i>
                    {{ trans('global.edit') }}
                </a>
            
            
            
                <form id="delete-{{ $sponsor->id }}" action="{{ route('admin.sponsors.destroy', $sponsor->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
                <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $sponsor->id }}').submit()">
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
    url: "{{ route('admin.sponsors.massDestroy') }}",
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
  $('.datatable-Sponsor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection