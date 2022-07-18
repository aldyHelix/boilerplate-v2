<x-ladmin-auth-layout>
    <x-slot name="title">Admin Details</x-slot>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <form action="{{ route('ladmin.admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include( ladmin()->view_path('admin._parts._form'), ['admin' => $admin] )

                @include(ladmin()->view_path('admin._parts._role'), ['admin' => $admin])

                <input type="hidden" name="id" value="{{ $admin->id }}">

                <div class="text-end">
                    <x-ladmin-button>Update</x-ladmin-button>
                </div>

            </form>
        </div>
    </div>

</x-ladmin-auth-layout>
