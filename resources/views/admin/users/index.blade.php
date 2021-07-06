@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                           Nom
                        </th>
                        <th>
                            Prénom
                        </th>
                        <th>
                            HDR
                        </th>
                        <th>
                            PHD
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
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
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $user->HDR ?? '' }}
                            </td>
                            <td>
                                {{ $user->PHD ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->Grade ?? '' }}
                            </td>
                            <td>
                                {{ $user->Spécialité ?? '' }}
                            </td>
                            <td>
                                {{ $user->Statut ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
    <div class="dropdown text-center">
        <a class="dropdown-button" id="dropdown-menu-{{ $user->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $user->id }}">
            
                <a class="dropdown-item" href="{{ route('admin.users.show', $user->id) }}">
                    <i class="fa fa-user fa-lg"></i>
                    {{ trans('global.view') }}
                </a>
            

            
                <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}">
                    <i class="fa fa-edit"></i>
                    {{ trans('global.edit') }}
                </a>
            
            
            
                <form id="delete-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
                <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $user->id }}').submit()">
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
    url: "{{ route('admin.users.massDestroy') }}",
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
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection