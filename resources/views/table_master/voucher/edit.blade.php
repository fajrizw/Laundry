@extends("layouts.app")
@section("content")
<div class="main-panel">
    <div class="content-wrapper">


        <h3 class="mb-4">Data Voucher</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('voucher.update', $voucher->id)}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row pt-20">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control form-control-danger @error('nama') is-invalid @enderror" name="nama" value="{{ $voucher->nama }}" placeholder="Masukkan Nama Paket" autocomplete="off">
                                            @error('nama')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Diskon</label>
                                            <input type="number" class="form-control form-control-danger @error('diskon') is-invalid @enderror" name="diskon" placeholder="Masukkan Diskon" value="{{ $voucher->diskon }}" autocomplete="off">
                                            @error('diskon')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ID Outlet</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_outlet">
                                                <?php $outlets = \App\Models\Outlet::all()?>
                                                @forelse ($outlets as $outlet)
                                                <option value="{{ $outlet->id }}">{{Str::ucfirst( $outlet->id." - ".$outlet->nama_outlet ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data outlet</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="auth" value="paket">
                                    <div class="form-actions mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
                                        <a href=" {{url('voucher')}}"  class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
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
