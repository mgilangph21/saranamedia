<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sumbill = DB::select('CALL getAgregate(?)', array(1));
        $sumled = DB::select('CALL getAgregate(?)', array(2));
        $sumjpo = DB::select('CALL getAgregate(?)', array(3));

        $all = DB::table('v_all')->orderBy('created_at', 'desc')->get();

        $sum = [
            'bill' => $sumbill,
            'led' => $sumled,
            'jpo' => $sumjpo,
            'data' => $all
        ];
        // return $sum;
        return view('admin.index', compact('sum'));
    }
}