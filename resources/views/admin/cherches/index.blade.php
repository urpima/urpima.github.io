@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.cherches.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.speaker.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Speaker">
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
                            Prenom
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                           HDR
                        </th>
                        <th>
                            PHD
                        </th>
                        <th>
                           Grade
                        </th>
                        <th>
                           Spécialité
                        </th>
                        <th>
                            Statut
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            TypeEnc
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cherches as $key => $cherche)
                        <tr data-entry-id="{{ $cherche->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cherche->id ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->nom ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->email ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->password ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->HDR ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->PHD ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->Grade ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->Spécialité ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->Statut ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->type ?? '' }}
                            </td>
                            <td>
                                {{ $cherche->typeEnc ?? '' }}
                            </td>
                            <td>
                                
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cherches.show', $cherche->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cherches.edit', $cherche->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                

                                
                                    <form action="{{ route('admin.cherches.destroy', $cherche->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.cherches.massDestroy') }}",
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
  $('.datatable-Cherche:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection