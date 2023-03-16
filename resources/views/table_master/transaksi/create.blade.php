@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">


        <h3 class="mb-4">Tambah Data Transaksi</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('transaksi.store')}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row pt-20">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="control-label">Kode Invoice</label>
                                            <input type="number" class="form-control form-control-danger @error('kode_invoice') is-invalid @enderror" name="kode_invoice" value="{{ old("kode_invoice")}}" placeholder="Masukkan Kode Invoice" autocomplete="off">
                                            @error('kode_invoice')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Outlet</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_outlet">
                                                <?php $outlets = \App\Models\Outlet::all()?>
                                                @forelse ($outlets as $outlet)
                                                <option value="{{ $outlet->id }}">{{Str::ucfirst( $outlet->nama_outlet ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data outlet</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Member</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_member">
                                                <?php $members = \App\Models\Member::all()?>
                                                @forelse ($members as $member)
                                                <option value="{{ $member->id }}">{{Str::ucfirst( $member->nama ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data member</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Tgl Pemesanan</label>
                                            <input type="datetime" class="form-control form-control-danger @error('tgl') is-invalid @enderror" name="tgl" placeholder="Masukkan Tgl Pemesanan" value="{{ old("tgl")}} " autocomplete="off">
                                            @error('tgl')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Batas Waktu</label>
                                            <input type="datetime" class="form-control form-control-danger @error('batas_waktu') is-invalid @enderror" name="batas_waktu" placeholder="Masukkan Batas Waktu" value="{{ old("batas_waktu")}} " autocomplete="off">
                                            @error('batas_waktu')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Tgl Pembayaran</label>
                                            <input type="datetime" class="form-control form-control-danger @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar" placeholder="Masukkan Tgl Pembayaran" value="{{ old("tgl_bayar")}} " autocomplete="off">
                                            @error('tgl_bayar')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kasir</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_user">
                                                <?php $users = \App\Models\User::all()?>
                                                @forelse ($users as $user)
                                                <option value="{{ $user->id }}">{{Str::ucfirst( $user->name ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data member</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Voucher</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_user">
                                                <?php $vouchers = \App\Models\Voucher::all()?>
                                                @forelse ($vouchers as $voucher)
                                                <option value="{{ $voucher->id }}">{{Str::ucfirst( $voucher->nama ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data nama voucher</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <select class="js-example-basic-single w-100 form-control" name="id_user">
                                                <?php $vouchers = \App\Models\Voucher::all()?>
                                                @forelse ($vouchers as $voucher)
                                                <option value="{{ $voucher->id }}">{{Str::ucfirst( $voucher->diskon ) }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data diskon voucher</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Paket</label>
                                            <select class="js-example-basic-single w-100 form-control" name="jenis">
                                                <?php $pakets = \App\Models\Paket::all()?>
                                                @forelse ($pakets as $paket)
                                                <option value="{{ $paket->nama_paket }}">{{ $paket->nama_paket }}</option>
                                                @empty
                                                <option value="" disabled selected>Tidak ada data nama paket</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                <input type="hidden" name="auth" value="Outlet">
                                <div class="form-actions mt-3">

                                    <button type="submit" class="btn btn-primary mr-1 mb-1"
                                    @if(count($outlets) == 0) disabled @endif
                                    >Tambah</button>
                                    <a href=" {{url('paket')}}"  class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
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
