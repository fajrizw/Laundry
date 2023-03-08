@extends("layouts.app")
@section("content")
<div class="container">
    <div class="card">
        <div class="card-header">Manage Users</div>
        <span class="text-sm form-control"><i class="fas fa-info-circle me-3"></i>Klik kolom tertentu untuk melakukan sorting pada kolom tersebut</span>
        <div class="card-body p-5">
            <div class="">

            {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
