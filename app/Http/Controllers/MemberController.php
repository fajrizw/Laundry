<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MemberDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(MemberDataTable $dataTable)
    {
        return $dataTable->render("table_master.member.index");
    }


    // Create
    public function create()
    {
      return view('table_master.member.create');
    }

    // Store
    public function store(AddMemberRequest $request)
    {

      try {
        DB::beginTransaction();


        $no_telp = preg_replace('/^0/','62',$request->no_telp);

        $addMember = User::create([
          'id_member' => Auth::id(),
          'nama'          => $request->nama,
          'alamat'        => $request->alamat,
          'jenis_kelamin' => $request->jenis_kelamin,
          'tlp'           => $no_telp,

        ]);

        $addMember->assignRole($addMember->auth);

        if ($addMemberr) {
          // Menyiapkan data Email
          $data = array(
            'nama'          => $addMember->nama,
            'alamat'        => $addMember->alamat,
            'jenis_kelamin' => $addMember->jenis_kelamin,
            'email'         => $addMember->email,
            'tlp'           => $addMember->no_telp,
          );

        }
        DB::commit();
        Session::flash('success','Member Berhasil Ditambah !');
        return redirect('data-member');
      } catch (ErrorException $e) {
        DB::rollback();
        throw new ErrorException($e->getMessage());
      }
    }
}
