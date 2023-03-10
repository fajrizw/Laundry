@extends("layouts.app")
@section("content")

            <!-- Form Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tambah Data Outlet</h6>
                            <form action="{{route('outlet.store')}}" method="POST">
                                @csrf
                                <div class="form-body" id="form">
                                    <div class="row pt-20">
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nama</label>
                                                <input type="text" class="form-control form-control-danger @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" placeholder="Masukkan Nama Outlet" autocomplete="off">
                                                @error('nama')
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
                                        <div class="col-md-4 mb-4">

                                            <div class="form-group has-success">
                                                <label class="control-label">Biaya Admin</label>
                                                <input type="number" class="form-control form-control-danger @error('biaya_admin') is-invalid @enderror" name="biaya_admin" placeholder="Masukkan Biaya Admin" value="{{old('biaya_admin')}}" autocomplete="off">
                                                @error('biaya_admin')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="form-group has-success">
                                                <label class="control-label">Alamat Outlet</label>
                                                <textarea name="alamat_outlet" class="form-control @error('alamat_outlet') is-invalid @enderror" rows="3" placeholder="Masukkan Alamat Outlet"> {{old('alamat_outlet')}} </textarea>
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

@endsection
