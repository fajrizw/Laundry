<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\DataTables\MemberDataTable;
use App\Models\Member;
use App\Exports\MemberExport;
use App;

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
    public function store(Request $request)
    {
        $member = new Member();
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->tlp = $request->tlp;
        $member->save();

        return redirect()->route("member.index")->with("message", [
            "message" => "Berhasil membuat member",
            "type" => "success"
        ]);
    

    }
    
    public function export()
    {
        $members = Member::all();

        $memberData = [];

        foreach ($members as $member) {
            $memberData[] = [
                'nama' => $member->nama,
                'alamat' => $member->alamat,
                'jenis_kelamin' => $member->jenis_kelamin,
                'tlp' => $member->tlp,
            ];
        }
        return Excel::download(new MemberExport($memberData), 'members.xlsx');
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->tlp = $request->tlp;
        $member->update();

        return redirect()->route("member.index")->with("message", [
            "message" => "Berhasil mengedit member",
            "type" => "success"
        ]);

    }
    public function edit ($id)
    {
        $member = Member::find($id);
        return view('table_master.member.edit', [
            "member" => $member
        ]);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->back()->with('message', [
            "message" => 'Berhasil menghapus member',
            "type" => "success"
        ]);
    }
}
