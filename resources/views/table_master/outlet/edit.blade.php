@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">


        <h3 class="mb-4">Data Outlet</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('outlet.update', $outlet->id)}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row pt-20">
                                    <div class="col-md-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Nama Outlet</label>
                                            <input type="text"
                                                class="form-control form-control-danger @error('nama_outlet') is-invalid @enderror"
                                                name="nama_outlet" value="{{ $outlet->nama_outlet }}"
                                                placeholder="Masukkan Nama Outlet" autocomplete="off">
                                            @error('nama_outlet')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group has-success">
                                            <label class="control-label">No.Telp</label>
                                            <input type="number"
                                                class="form-control form-control-danger @error('tlp') is-invalid @enderror"
                                                name="tlp" placeholder="Masukkan No Telepon" value="{{ $outlet->tlp }}"
                                                autocomplete="off">
                                            @error('tlp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group has-success">
                                            <label class="control-label">Biaya Admin</label>
                                            <input type="number"
                                                class="form-control form-control-danger @error('biaya_admin') is-invalid @enderror"
                                                name="biaya_admin" placeholder="Masukkan Biaya Admin"
                                                value="{{ $outlet->biaya_admin }}" autocomplete="off">
                                            @error('biaya_admin')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Alamat</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4"
                                                form-control-danger @error('alamat_outlet') is-invalid @enderror"
                                                name="alamat_outlet" placeholder="Masukkan Alamat Outlet"
                                                value="{{ $outlet->alamat_outlet }}" autocomplete="off"></textarea>
                                            @error('alamat_outlet')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="auth" value="paket">
                                <div class="form-actions mt-3">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
                                    <a href=" {{url('outlet')}}" class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
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
