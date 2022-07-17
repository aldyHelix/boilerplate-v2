@can(['role.update'])
    <a href="" data-bs-toggle="modal" class="btn btn-icon btn-outline-primary"
        data-bs-target="#modal-edit-role-{{ $role->id }}"
        data-bs-toggle="tooltip"
        data-bs-custom-class="tooltip-inverse"
        data-bs-placement="top"
        title="Edit data">
        <i class="fas fa-edit"></i>

    </a>


    <x-ladmin-modal id="modal-edit-role-{{ $role->id }}">
        <x-slot name="title">Edit Role</x-slot>
        <x-slot name="body">
            <form action="{{ route('ladmin.role.update', $role->id) }}" method="POST" name="form-update-role-{{ $role->id }}" id="form-update-role-{{ $role->id }}">
                @csrf
                @method('PUT')
                @include(ladmin()->view_path('role._parts._form'), ['role' => $role])
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-ladmin-button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
            </x-ladmin-button>
            <x-ladmin-button form="form-update-role-{{ $role->id }}">Update</x-ladmin-button>
        </x-slot>
    </x-ladmin-modal>
@endcan

@if ($role->id > 1)
    @can(['role.destroy'])
        <a href="" data-bs-toggle="modal" class="btn btn-icon btn-outline-danger"
            data-bs-target="#modal-delete-role-{{ $role->id }}"
            data-bs-toggle="tooltip"
            data-bs-custom-class="tooltip-inverse"
            data-bs-placement="top"
            title="Delete data">
            <i class="fas fa-trash"></i>
        </a>

        <x-ladmin-modal id="modal-delete-role-{{ $role->id }}" class="text-start">
            <x-slot name="title">Delete Role</x-slot>
            <x-slot name="body">
                Are you sure you want to delete this role?
            </x-slot>
            <x-slot name="footer">
                <form action="{{ route('ladmin.role.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-ladmin-button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No
                    </x-ladmin-button>
                    <x-ladmin-button type="submit" class="text-white" color="danger">Yes</x-ladmin-button>
                </form>
            </x-slot>
        </x-ladmin-modal>
    @endcan
@endif
