@extends("layouts.app")
@section("content")

<div class="main-panel">
    
    <div class="content-wrapper">
        <h3 class="mb-4">Tambah Data Outlet</h3>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

          <div class="card">

            <div class="card-body">
              <div class="row">
                <form action="{{route('outlet.store')}}" class="forms-sample" method="POST">
                    @csrf
                    <div class="form-body" id="form">
                        <div class="row pt-20">
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label">Nama Outlet</label>
                                    <input type="text" class="form-control form-control-danger @error('nama_outlet') is-invalid @enderror" name="nama_outlet" value="{{old('nama_outlet')}}" placeholder="Masukkan Nama Outlet" autocomplete="off">
                                    @error('nama_outlet')
                                      <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label">No. Telp</label>
                                    <input type="number" class="form-control form-control-danger @error('tlp') is-invalid @enderror" name="tlp" placeholder="Masukkan Nomor Telepon" value="{{old('tlp')}}" autocomplete="off">
                                    @error('tlp')
                                      <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-success">
                                    <label class="control-label">Biaya Admin</label>
                                    <input type="number" class="form-control form-control-danger @error('biaya_admin') is-invalid @enderror" name="biaya_admin" placeholder="Masukkan Biaya Admin " value="{{old('biaya_admin')}}" autocomplete="off">
                                    @error('biaya_admin')
                                      <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label class="control-label">Alamat</label>
                                    <textarea name="alamat_outlet" class="form-control @error('alamat_outlet') is-invalid @enderror" rows="3" placeholder="Masukkan Alamat"> </textarea>
                                    @error('alamat_outlet')
                                      <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <input type="hidden" name="auth" value="Outlet">
                    <div class="form-actions mt-3">
                        <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                        <a href=" {{url('outlet')}}"  class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
                    </div>
                </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- content-wrapper ends -->

  </div>
</div>
@endsection
