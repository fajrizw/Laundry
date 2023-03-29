@extends("layouts.app")
@section("content")

<div class="container mt-4">
    <div class="p-3">

        @if(Session::has("message"))

        <span
            class="alert alert-{{ Session::get("message")["type"] }} d-flex align-items-center">{{ Session::get("message")["message"] }}</span>

        @endif
    </div>


    <div class="d-flex">
        <h2>Data Outlet</h2>


        <div class="d-flex justify-content-end mb-2 ms-4">
            <a class="btn btn-primary" href="{{route('outlet.create')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Tambah Outlet
            </a>
        </div>
    </div>



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
