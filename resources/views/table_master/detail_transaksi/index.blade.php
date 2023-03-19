@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                       
                                @csrf
                                <div class="row pt-20">
                                <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Kode Invoice</label>
    <div class="col-sm-4">
    <?php $detail_transaksi = \App\Models\DetailTransaksi::all()?>
    @foreach ($detail_transaksi as $det)
                                   
      <input type="text" readonly class="form-control-plaintext" name="nama" value="{{$det->kode_invoice}}">   
      @endforeach
    </div>
  </div>
                                   
                                  
</div>
</div>
</div>

</div>
</div>
<div class="container mt-4">
    <h2>Detail Transaksi</h2>
    <span class="text-sm text-dark form-control bg-white border border-light"><i class="fas fa-info-circle me-3"></i>Klik kolom tertentu untuk melakukan sorting pada kolom tersebut</span>
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
