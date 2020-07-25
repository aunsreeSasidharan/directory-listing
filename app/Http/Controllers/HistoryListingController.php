<?php

namespace App\Http\Controllers;
use App\History;

use Illuminate\Http\Request;
use DataTables;

class HistoryListingController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $history = History::all();
            return Datatables::of($history)
                     ->make(true);
        }
        return view('history-listing');
    }
}
