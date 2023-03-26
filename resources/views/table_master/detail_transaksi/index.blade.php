@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-end">
                        <a href="{{ url('transaksi/{id}/detail/export-pdf') }}" class="btn btn-primary">Export PDF</a>
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Kode Invoice :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->kode_invoice}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Customer :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->member->nama}}">
                                        </div>
                                    </div>
                                  
                                   
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Karyawan :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->user->name}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Outlet :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->outlet->nama_outlet}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Estimasi Waktu :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->paket->estimasi_waktu}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Tgl Pemesanan:</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->tgl}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Tgl Pembayaran :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->tgl_bayar}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Status Pemesanan :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->status_pemesanan}}">
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Status Pembayaran :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" 
                                                value="{{$transaksi->status_pembayaran}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Total :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext"
                                                value="{{'Rp. '. number_format(round($transaksi_pertama), 0, ',', '.')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


            <div class="container mt-4">
                <h2>Detail Transaksi</h2>
                <span class="text-sm text-dark form-control"><i class="fas fa-info-circle me-3"></i>Klik kolom tertentu
                    untuk melakukan sorting pada kolom
                    tersebut</span>
                <br>



                <div class="">

                    {{ $dataTable->table() }}

                </div>



            </div>
        </div>
    </div>


    @endsection


    @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
