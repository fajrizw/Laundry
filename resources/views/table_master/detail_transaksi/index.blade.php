@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-center">
                            <div class="d-flex justify-content-end">
                                <a href="{{ url('transaksi/{id}/detail/export-pdf') }}"
                                    class="btn btn-dark ">Export PDF</a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Kode Invoice :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->kode_invoice }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Customer :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->member->nama }}">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Karyawan :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->user->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Outlet :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->outlet->nama_outlet }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Keterangan :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $detailTransaksi->keterangan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Tgl Pemesanan:</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->tgl }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Tgl Pembayaran :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->tgl_bayar }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Status Pemesanan :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->status_pemesanan }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Status Pembayaran :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->status_pembayaran }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Estimasi Waktu :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->paket->estimasi_waktu }}">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">

                                </div>

                                <div class="col-md-6 mb-3 mb-md-0">

                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Qty :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $detailTransaksi->qty }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Harga :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->paket->harga }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Biaya Admin :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->outlet->biaya_admin }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Pajak :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ $transaksi->pajak }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Total :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{ 'Rp. '. number_format(round($transaksi_pertama), 0, ',', '.') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            @endsection
