<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\MailLog;   
use Illuminate\Support\Facades\DB;     // if you prefer DB::table()

class AdminController extends Controller
{
    public function index()
    {
        // Count all registered users
        $userCount = User::count();

        // Count all mail-log entries
        $mailLogCount = DB::table('email_logs')->count();

        return view('admin.dashboard', compact('userCount', 'mailLogCount'));
    }
}
