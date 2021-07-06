<div class="dropdown text-center">
    <a class="dropdown-button" id="dropdown-menu-{{ $row->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $row->id }}">
        
            <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
                <i class="fa fa-eye fa-lg"></i>
                {{ trans('global.view') }}
            </a>
        

        
            <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
                <i class="fa fa-edit"></i>
                {{ trans('global.edit') }}
            </a>
        
        
        
            <form id="delete-{{ $row->id }}" action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST">
                @method('DELETE')
                @csrf
            </form>
            <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $row->id }}').submit()">
                <i class="fa fa-trash"></i>
                {{ trans('global.delete') }}
            </a>
        
    </div>
</div>