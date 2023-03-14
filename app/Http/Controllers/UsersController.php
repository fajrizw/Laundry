<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render("table_master.users.index");
    }

    public function create(){
        return view("table_master.users.create");
    }

    public function store(Request $request){
        $users = new User();
        $users->nama = $request->nama;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->alamat_outlet = $request->alamat_outlet;
        $users->save();

        return redirect()->route("users.index")->with("message", [
            "message" => "Berhasil membuat user",
            "type" => "success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->nama = $request->nama;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->alamat_outlet = $request->alamat_outlet;
        $users->update();

        return redirect()->route("users.index")->with("message", [
            "message" => "Berhasil mengedit users",
            "type" => "success"
        ]);
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view("table_master.users.edit", [
           "users" => $users
        ]);
    }

    public function destroy($id)
    {
        $users = User::findorFail($id);
        $users->delete();

        return redirect()->back()->with("message", [
            "message" => "Berhasil menghapus user",
            "type" => "success"
        ]);
    }
}
