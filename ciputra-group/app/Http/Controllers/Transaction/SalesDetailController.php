<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SalesDetailController extends Controller
{
    public function index()
    {
        return view('transaction.sales-detail.index');
    }

    public function data()
    {
        $number = rand();
        return $number;
    }
}
