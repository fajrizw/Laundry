@extends("layouts.app")
@section("content")

<div class="container mt-4">
    <div class="p-3">

        @if(Session::has("message"))

        <span
            class="alert alert-{{ Session::get("message")["type"] }} d-flex align-items-center">{{ Session::get("message")["message"] }}</span>

        @endif
    </div>
  
        <h2>Data Outlet</h2>
    
  

    <span class="text-sm text-dark form-control bg-white border border-light"><i
            class="fas fa-info-circle me-3"></i>Klik kolom tertentu untuk melakukan sorting pada kolom tersebut</span>
    <br>




    <div class="">

        {{ $dataTable->table() }}

    </div>
</div>


@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
