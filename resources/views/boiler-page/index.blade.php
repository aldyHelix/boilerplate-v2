<x-base-layout>
    @section('styles')
        <style>
           .left-col {
                float: left !important;
                width: 25%;
            }

            .center-col {
                float: center !important;
                width: 50%;
            }

            .right-col {
                text-align: right;
                float: right !important;
                width: 25%;
            }

            .dt-buttons{
                padding: 1rem 0;
            }
        </style>
    @endsection
    <x-slot name="button_create">
        {!! $button_create ?? null !!}
    </x-slot>

    <x-slot name="title">
        {!! $title ?? null !!}
    </x-slot>

    <x-slot name="breadcrums">
        {!! $breadcrums ?? null !!}
    </x-slot>

    <x-slot name="description">
        {!! $description ?? null !!}
    </x-slot>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <!--begin::Table-->
            {{ $dataTable->table() }}
            <!--end::Table-->

            {{-- Inject Scripts --}}
            @section('scripts')
                {{ $dataTable->scripts() }}
            @endsection
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</x-base-layout>
