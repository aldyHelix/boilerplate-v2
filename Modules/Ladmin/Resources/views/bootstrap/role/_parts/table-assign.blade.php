@can('role.assign')
    <a href="{{ route('ladmin.role.show', ladmin()->back($role->id)) }}" class="btn btn-sm btn-primary">Assign
        Permission</a>
@endcan
