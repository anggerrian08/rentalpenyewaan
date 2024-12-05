<?php

namespace App\Http\Controllers;

use App\Models\LoginLogs;
use Illuminate\Http\Request;

class LoginLogsController extends Controller
{
    public function index(){
        $login_log = LoginLogs::whereNotIn('user_id',  [1])->with('user')->latest()->get();
        return view('detail_login.index', compact('login_log'));
    }
}
