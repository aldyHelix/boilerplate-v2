@php
    $back = route('ladmin.admin.index');
@endphp

@can(['ladmin.admin.index'])
    <a href="{{ route('ladmin.admin.edit', [$id, 'back' => $back]) }}" class="btn btn-icon btn-outline-info"><i class="fas fa-eye"></i></a>
@endcan
