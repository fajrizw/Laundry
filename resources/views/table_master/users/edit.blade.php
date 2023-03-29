@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="mb-4">Data User</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('users.update', $users->id)}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row pt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text"
                                                class="form-control form-control-danger @error('name') is-invalid @enderror"
                                                name="name" value="{{$users->name}}" placeholder="Masukkan Nama User"
                                                autocomplete="off">
                                            @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="email"
                                                class="form-control form-control-danger @error('email') is-invalid @enderror"
                                                name="email" value="{{$users->email}}" placeholder="Masukkan Email"
                                                autocomplete="off">
                                            @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Role</label>
                                            <select class="js-example-basic-single form-control" name="id_role" id="exampleFormControlSelect2">
                                                <?php $roles = \App\Models\Role::all()->where("id","!=", 1)?>
                                                @forelse ($roles as $role)
                                                <option value="{{ $role->id }}" {{ $users->id_role == $role->id ? "selected" : "" }}>{{ Str::ucfirst($role->nama) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data role user</option>
                                                @endforelse

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ID Outlet</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_outlet">
                                                <?php $outlets = \App\Models\Outlet::all()?>
                                                @forelse ($outlets as $outlet)
                                                <option value="{{ $outlet->id }}" {{ $users->id_outlet == $outlet->id ? "selected" : "" }}>{{Str::ucfirst( $outlet->nama_outlet ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data outlet</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="auth" value="User">
                                    <div class="form-actions mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
                                        <a href=" {{url('users')}}"  class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>




            </form>
        </div>
    </div>
</div>


@endsection
