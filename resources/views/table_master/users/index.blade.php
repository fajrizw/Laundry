@extends("layouts.app")
@section("content")

<div class="container mt-4">
    <div class="d-flex">
        <h2>Data User</h2>
        <div class="d-flex justify-content-end mb-2 ms-4">
            <a class="btn btn-primary" href="{{route('users.create')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    Tambah User
            </a>
        </div>
    </div>
    <span class="text-sm form-control"><i class="fas fa-info-circle me-3"></i>Klik kolom tertentu untuk melakukan sorting pada kolom tersebut</span>
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
