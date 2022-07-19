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

            div.dataTables_wrapper div.dataTables_processing {
                border-radius: unset !important;
                box-shadow: none !important;
                background-color: unset !important;
                opacity: 1 !important;
                z-index: 999999;
            }

            #overlay {
                height: 100%;
                width: 100%;
                position: absolute;
                top: 0px;
                left: 0px;
                z-index: 99999;
                background-color: rgb(0, 0, 0);
                filter: alpha(opacity=75);
                -moz-opacity: 0.75;
                opacity: 0.75;
                display: none;
            }
            #overlay h2 {
                position: fixed;
                margin-left: 40%;
                top: 40%;
            }

            table.dataTable thead > tr > th.sorting:after, table.dataTable thead > tr > th.sorting_desc:after {
                content: "";
                align-content: center;
                top: 40%;
            }

        </style>
    @endsection
    <x-slot name="button_create">
        {!! $button_create ?? null !!}
    </x-slot>

    <div id="overlay"></div>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <!--begin::Table-->
            {{ $dataTable->table() }}
            <!--end::Table-->

            {{-- Inject Scripts --}}
            @section('scripts')
                <script>
                    $("#overlay").show();
                </script>

                {{ $dataTable->scripts() }}
            @endsection
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</x-base-layout>
