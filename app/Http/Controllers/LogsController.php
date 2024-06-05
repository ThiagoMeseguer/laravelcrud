<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index() {
        return view("logs.index", ['logs' => Logs::all()] );
    }
}
