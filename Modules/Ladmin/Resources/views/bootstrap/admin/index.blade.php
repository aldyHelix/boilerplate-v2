<x-ladmin-auth-layout>
    <x-slot name="title">List of Admin accounts</x-slot>

    <x-ladmin-card>
        <x-slot name="body">
            {{ \Modules\Ladmin\Datatables\AdminDatatables::table() }}
        </x-slot>
    </x-ladmin-card>

</x-ladmin-auth-layout>
