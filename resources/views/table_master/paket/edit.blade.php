@extends("layouts.app")
@section("content")

            <!-- Form Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-lg-12" >
                        <div class="bg-light rounded h-100 p-4" id="form-control">
                            <h6 class="mb-4">Edit Data Paket</h6>
                            <form action="{{route('paket.update', $paket->id)}}" method="POST">
                                @csrf
                                <div class="form-body" id="form">
                                    <div class="row pt-20">
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">ID Outlet</label>
                                                <input type="text" class="form-control form-control-danger @error('id_outlet') is-invalid @enderror" name="id_outlet" value="{{ $paket->id_outlet }}" placeholder="Masukkan Id Outlet" autocomplete="off">
                                                @error('id_outlet')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--/span-->

                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nama Paket</label>
                                                <input type="text" class="form-control form-control-danger @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{ $paket->nama_paket }}" placeholder="Masukkan Nama Paket" autocomplete="off">
                                                @error('nama_paket')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--/span-->

                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Harga</label>
                                                <input type="number" class="form-control form-control-danger @error('harga') is-invalid @enderror" name="harga" placeholder="Masukkan Harga Paket" value="{{ $paket->harga }}" autocomplete="off">
                                                @error('harga')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--/span-->

                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Estimasi Waktu</label>
                                                <input type="number" class="form-control form-control-danger @error('estimasi_waktu') is-invalid @enderror" name="estimasi_waktu" placeholder="Masukkan Estimasi Waktu Paket" value="{{ $paket->estimasi_waktu }}" autocomplete="off">
                                                @error('estimasi_waktu')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>
                                <input type="hidden" name="auth" value="paket">
                                <div class="form-actions mt-3">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection
