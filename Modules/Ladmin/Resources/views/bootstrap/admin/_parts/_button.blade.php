@can(['ladmin.admin.create'])
<x-slot name="button">
    <a href="{{ route('ladmin.admin.create', ladmin()->back()) }}" class="btn btn-primary">&plus; Add New</a>
</x-slot>
@endcan
