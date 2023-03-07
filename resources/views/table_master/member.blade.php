@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">Member</h4>
             </div>

         </div>
         <div class="d-flex justify-content-end my-2 me-4">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal-add">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                     </svg>
                     Tambah Member
             </button>
         </div>
          <div class="card-body">
             <div class="table-responsive">
                 <table id="datatable2" class="table table-striped text-center">
                   <thead class="w-100">
                      <tr>
                         <th class="text-center">Nama</th>
                         <th class="text-center">Alamat</th>
                         <th class="text-center">Jenis Kelamin</th>
                         <th class="text-center">No_Telp</th>
                         <th class="w-25 text-center">Aksi</th>
                      </tr>
                   </thead>
                     <tbody id='list'>
                     </tbody>
                 </table>
             </div>
          </div>
       </div>
    </div>
 </div>

<!-- Modal Add-->
<div class="modal fade" data-backdrop="static" id="form-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-dialog-md" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Tambah Admin</h5>
         </div>
         <div class="modal-body">
             <div class="modal-body">
                 <div class="container-fluid">
                     <div class="form-group">
                       <div><span class="text-danger" id="nama_lengkap_error"></span></div>
                       <label for="jurusan">Nama Lengkap<span class="text-danger">*</span></label>
                       <input type="text" class="form-control" id="nama_lengkap" placeholder="">
                       <small class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                         <div><span class="text-danger" id="email_error"></span></div>
                         <label for="jurusan">Email<span class="text-danger">*</span></label>
                         <input type="email" class="form-control" id="email" placeholder="">
                         <small class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                         <div><span class="text-danger" id="jabatan_error"></span></div>
                         <label for="jurusan">Jabatan<span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="jabatan" placeholder="">
                         <small class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                         <div><span class="text-danger" id="password_error"></span></div>
                         <label for="jurusan">Password<span class="text-danger">*</span></label>
                         <input type="password" class="form-control" id="password" placeholder="">
                         <small class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                         <label for="jurusan">Confirm Password<span class="text-danger">*</span></label>
                         <input type="password" class="form-control" id="con_password" placeholder="">
                         <small class="form-text text-danger"></small>
                     </div>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
             <button type="button" id="btn-close-add" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="button" id="btn-save-add" class="btn btn-primary">Save</button>
         </div>
     </div>
 </div>
</div>
<!-- Modal Update-->
<div class="modal fade" data-backdrop="static" id="form-modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-dialog-md" role="document">
     <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Edit Admin</h5>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <div class="form-group">
                         <div><span class="text-danger" id="update_nama_error"></span></div>
                         <label for="jurusan">Nama Lengkap<span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="update_nama_lengkap" placeholder="">
                         <small class="form-text text-danger"></small>
                       </div>
                       <div class="form-group">
                           <div><span class="text-danger" id="update_email_error"></span></div>
                           <label for="jurusan">Email<span class="text-danger">*</span></label>
                           <input type="email" class="form-control" id="update_email" placeholder="">
                           <small class="form-text text-danger"></small>
                       </div>
                       <div class="form-group">
                             <div><span class="text-danger" id="update_jabatan_error"></span></div>
                             <label for="jurusan">Jabatan<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" id="update_jabatan" placeholder="">
                             <small class="form-text text-danger"></small>
                         </div>
                       <div class="form-group">
                           <div><span class="text-danger" id="update_password_error"></span></div>
                           <label for="jurusan">Password<span class="text-danger">*</span></label>
                           <input type="password" class="form-control" id="update_password" placeholder="">
                           <small class="form-text text-danger"></small>
                       </div>
                       <div class="form-group">
                           <label for="jurusan">Confirm Password<span class="text-danger">*</span></label>
                           <input type="password" class="form-control" id="update_password_confirmation" placeholder="">
                           <small class="form-text text-danger"></small>
                       </div>
                 </div>
             </div>
         <div class="modal-footer">
             <button type="button" id="btn-close-edit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="button" id="btn-save-edit" class="btn btn-primary">Save</button>
         </div>
     </div>
 </div>
</div>

@endsection
