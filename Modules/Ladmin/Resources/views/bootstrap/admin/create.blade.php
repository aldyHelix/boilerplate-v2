@if ($button)
    <x-ladmin-button type="button" data-bs-toggle="modal" data-bs-target="#modal-create-admin">
        &plus; Add New Admin
    </x-ladmin-button>
@endif

<form action="{{ route('ladmin.admin.store') }}" method="POST">
    @csrf
    <x-ladmin-modal id="modal-create-admin" size="xl">
        <x-slot name="title">Add New Admin</x-slot>
        <x-slot name="body">
            @include(ladmin()->view_path('admin._parts._form'), ['admin' => ladmin()->admin()])
            @include(ladmin()->view_path('admin._parts._role'), ['admin' => ladmin()->admin()])
        </x-slot>
        <x-slot name="footer">
            <x-ladmin-button type="button" color="secondary" data-bs-dismiss="modal">Close</x-ladmin-button>
            <x-ladmin-button>Submit</x-ladmin-button>
        </x-slot>
    </x-ladmin-modal>
</form>

