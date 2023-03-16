@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">


        <h3 class="mb-4">Data Paket</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('paket.update', $paket->id)}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row pt-20">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select class="js-example-basic-single w-100 form-control" name="jenis">
                                                <?php $pakets = \App\Models\Paket::all()?>
                                                @forelse ($pakets as $paket)
                                                <option value="{{ $paket->jenis }}">{{ $paket->jenis }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data jenis paket</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Harga</label>
                                            <input type="number" class="form-control form-control-danger @error('harga') is-invalid @enderror" name="harga" placeholder="Masukkan Diskon" value="{{ $paket->harga }}" autocomplete="off">
                                            @error('harga')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Estimasi Waktu</label>
                                            <input type="datetime" class="form-control form-control-danger @error('estimasi_waktu') is-invalid @enderror" name="estimasi_waktu" placeholder="Masukkan Estimasi Waktu" value="{{ $paket->estimasi_waktu }}" autocomplete="off">
                                            @error('estimasi_waktu')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="auth" value="paket">
                                    <div class="form-actions mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
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
