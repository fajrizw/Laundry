@extends("layouts.app")
@section("content")

            <!-- Form Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tambah Data Paket</h6>
                            <form action="{{route('paket.store')}}" method="POST">
                                @csrf
                                <div class="form-body" id="form">
                                    <div class="row pt-20">
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                    <label class="control-label ">ID Outlet
                                                        <select class="form-select form-select-sm"  name="id_outlet" id="">
                                                            <?php $outlets = \App\Models\Outlet::all()?>
                                                            @forelse ($outlets as $outlet)
                                                            <option value="{{ $outlet->id }}">{{ $outlet->id." - ".$outlet->nama }}</option>
                                                            @empty
                                                            <option value="" disabled selected>Tidak ada data outlet</option>
                                                            @endforelse
                                                        </select>
                                                    </label>

                                                <input type="number" class="form-control mt-2 form-control-danger @error('id_outlet') is-invalid @enderror" name="id_outlet" value="{{old('id_outlet')}}" placeholder="Masukkan Id Outlet" autocomplete="off">
                                                @error('id_outlet')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label ">Jenis
                                                    <select class="form-select"  name="jenis" id="">
                                                        <?php $pakets = \App\Models\Paket::all()?>
                                                        @forelse ($pakets as $paket)
                                                        <option value="{{ $paket->jenis }}">{{ $paket->jenis }}</option>
                                                        @empty
                                                        <option value="" disabled selected>Tidak ada data jenis paket</option>
                                                        @endforelse
                                                    </select>
                                                </label>
                                                {{-- <label class="control-label">Jenis</label>
                                                <input type="text" class="form-control form-control-danger @error('jenis') is-invalid @enderror" name="jenis" value="{{old('jenis')}}" placeholder="Masukkan Jenis Paket" autocomplete="off">
                                                @error('jenis')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror--}}
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4 mb-4">

                                            <div class="form-group has-success">
                                                <label class="control-label">Nama Paket</label>
                                                <input type="text" class="form-control form-control-danger @error('nama_paket') is-invalid @enderror" name="nama_paket" placeholder="Masukkan Nama Paket" value="{{old('nama_paket')}}" autocomplete="off">
                                                @error('nama_paket')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">

                                            <div class="form-group has-success mt-2">
                                                <label class="control-label">Harga</label>
                                                <input type="number" class="form-control form-control-danger @error('harga') is-invalid @enderror" name="harga" placeholder="Masukkan Harga Paket" value="{{old('harga')}}" autocomplete="off">
                                                @error('harga')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">

                                            <div class="form-group has-success mt-2">
                                                <label class="control-label">Estimasi Waktu</label>
                                                <input type="number" class="form-control form-control-danger @error('estimasi_waktu') is-invalid @enderror" name="estimasi_waktu" placeholder="Masukkan Estimasi Waktu Paket" value="{{old('estimasi_waktu')}}" autocomplete="off">
                                                @error('estimasi_waktu')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--/span-->
                                <input type="hidden" name="auth" value="Outlet">
                                <div class="form-actions mt-3">

                                    <button type="submit" class="btn btn-primary mr-1 mb-1"
                                    @if(count($outlets) == 0) disabled @endif
                                    >Tambah</button>
                                    <a href=" {{url('outlet')}}"  class="btn btn-outline-secondary mr-1 mb-1">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection
