<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Carbon;

class StatusController extends Controller
{
    public function fetchStatus()
{
    $status = Status::first();
    return response()->json([$status]);
}
}