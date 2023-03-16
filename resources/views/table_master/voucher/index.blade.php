@extends("layouts.app")
{{-- @extends("layouts.alert") --}}
@section("content")

<div class="container mt-4">
    {{-- @section('alert')

    @endsection --}}
    <h2>Data Voucher</h2>
    <span class="text-sm text-dark form-control bg-white border border-light"><i class="fas fa-info-circle me-3"></i>Klik kolom tertentu untuk melakukan sorting pada kolom tersebut</span>
        <br>



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
