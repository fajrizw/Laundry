<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render("table_master.users.index");
        // return Auth::user()->outlet;
    }

    public function create(){
        return view("table_master.users.create");
    }

    public function store(Request $request){
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make("12345678");
        $users->id_role = $request->id_role;
        $users->id_outlet = $request->id_outlet;
        $users->save();

        return redirect()->route("users.index")->with("message", [
            "message" => "Berhasil membuat user",
            "type" => "success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->id_role = $request->id_role;
        $users->id_outlet = $request->id_outlet;
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
