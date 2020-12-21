<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Log;
use Illuminate\Http\Request;

class logController extends Controller {
    public function adminDashboard() {
        $logs = Log::get();

        return view('admins/log/list', compact('logs'));
    }
}
