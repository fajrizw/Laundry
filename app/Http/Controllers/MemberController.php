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
        return $dataTable->render("table_master.member");
    }
}
