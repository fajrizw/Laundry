@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">


        <h3 class="mb-4">Tambah Data Detail Transaksi</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('transaksi.store')}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="form-body" id="form">
                                    <div class="row pt-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Id Transaksi</label>
                                                <select class="js-example-basic-single w-100 form-control"
                                                    name="id_transaksi">
                                                    <?php $transaksi = \App\Models\Transaksi::all()?>
                                                    @forelse ($transaksi as $trans)
                                                    <option value="{{ $trans->id }}">{{Str::ucfirst( $trans->id ) }}
                                                    </option>
                                                    @empty
                                                    <option value="" disabled selected>Tidak ada data transaksi</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Paket</label>
                                                <select class="js-example-basic-single w-100 form-control"
                                                    name="id_paket">
                                                    <?php $pakets = \App\Models\Paket::all()?>
                                                    @forelse ($pakets as $paket)
                                                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                                                    @empty
                                                    <option value="" disabled selected>Tidak ada data nama paket
                                                    </option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Qty</label>
                                                <input type="number"
                                                    class="form-control form-control-danger @error('qty') is-invalid @enderror"
                                                    name="qty" placeholder="Masukkan jumlah qty"
                                                    value="{{ old("qty")}} " autocomplete="off">
                                                @error('qty')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" name="auth" value="Outlet">
                                        <div class="form-actions mt-3">

                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Tambah</button>
                                            <a href=" {{url('detail_transaksi')}}"
                                                class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
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
</div>
    @endsection
