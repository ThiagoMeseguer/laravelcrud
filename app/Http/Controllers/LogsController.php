<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index() {
        $logs = Logs::all();
        foreach ($logs as $log) {
            $user = User::find($log->id_user);
            $log->name = $user->name;
        }
        return view("logs.index", compact('logs'));
    }
}
