@extends("layouts.app")
@section("content")

            <!-- Form Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-lg-12" >
                        <div class="bg-light rounded h-100 p-4" id="form-control">
                            <h6 class="mb-4">Edit Data Member</h6>
                            <form action="{{route('member.update', $member->id)}}" method="POST">
                                @csrf
                                <div class="form-body" id="form">
                                    <div class="row pt-20">
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nama</label>
                                                <input type="text" class="form-control form-control-danger @error('nama') is-invalid @enderror" name="nama" value="{{ $member->nama }}" placeholder="Nama Member" autocomplete="off">
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
                                                <label class="control-label">No. Telp</label>
                                                <input type="number" class="form-control form-control-danger @error('tlp') is-invalid @enderror" name="tlp" placeholder="Nomor Telepon" value="{{ $member->tlp }}" autocomplete="off">
                                                @error('tlp')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">

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
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="form-group has-success">
                                                <label class="control-label">Alamat</label>
                                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Alamat Customer"> {{ $member->alamat }} </textarea>
                                                @error('alamat')
                                                  <span class="invalid-feedback text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <input type="hidden" name="auth" value="Member">
                                <div class="form-actions mt-3">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 ">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection
