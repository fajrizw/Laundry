@extends("layouts.app")
@section("content")

<div class="container mt-4">
    <h2>Data Transaksi</h2>
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
