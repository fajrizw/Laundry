@extends("layouts.app")
@section("content")

<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="mb-4">Data Member</h3>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('member.update', $member->id)}}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row pt-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text"
                                                class="form-control form-control-danger @error('nama') is-invalid @enderror"
                                                name="nama" value="{{$member->nama}}" placeholder="Masukkan Nama Member"
                                                autocomplete="off">
                                            @error('nama')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">No. Telp</label>
                                            <input type="number"
                                                class="form-control form-control-danger @error('tlp') is-invalid @enderror"
                                                name="tlp" value="{{$member->tlp}}" placeholder="Masukkan No Telepon"
                                                autocomplete="off">
                                            @error('tlp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">

                                        <label class="control-label mb-2">Jenis Kelamin</label><br>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" @error('jenis_kelamin') is-invalid @enderror name="jenis_kelamin"  id="L"
                                          value="L" autocomplete="off" {{ $member->jenis_kelamin == "L" ? "checked" : "" }} />
                                          <label class="form-check-label" for="femaleGender">Laki-Laki</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" @error('jenis_kelamin') is-invalid @enderror name="jenis_kelamin" id="P"
                                          value="P" autocomplete="off" {{ $member->jenis_kelamin == "P" ? "checked" : "" }} />
                                          <label class="form-check-label" for="maleGender">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group has-success">
                                            <label class="control-label">Alamat</label>
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Masukkan Alamat">{{ $member->alamat }} </textarea>
                                            @error('alamat')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="auth" value="User">
                                    <div class="form-actions mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save Changes</button>
                                        <a href="{{url('member')}}"
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



@endsection
