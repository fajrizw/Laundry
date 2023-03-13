@extends("layouts.app")
@section("content")

            <!-- Form Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-lg-12" >
                        <div class="bg-light rounded h-100 p-4" id="form-control">
                            <h6 class="mb-4">Edit Data Voucher</h6>
                            <form action="{{route('voucher.update', $voucher->id)}}" method="POST">
                                @csrf
                                <div class="form-body" id="form">
                                    <div class="row pt-20">
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nama</label>
                                                <input type="text" class="form-control form-control-danger @error('nama') is-invalid @enderror" name="nama" value="{{ $voucher->nama }}" placeholder="Masukkan Nama Voucher" autocomplete="off">
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
                                                <label class="control-label">Diskon</label>
                                                <input type="number" class="form-control form-control-danger @error('diskon') is-invalid @enderror" name="diskon" placeholder="Masukkan Diskon Voucher" value="{{ $voucher->diskon }}" autocomplete="off">
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
                                                <label class="control-label">ID Outlet</label>
                                                <input type="text" class="form-control form-control-danger @error('id_outlet') is-invalid @enderror" name="id_outlet" value="{{ $voucher->id_outlet }}" placeholder="Masukkan Id Outlet" autocomplete="off">
                                                @error('id_outlet')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <input type="hidden" name="auth" value="voucher">
                                <div class="form-actions mt-3">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection
