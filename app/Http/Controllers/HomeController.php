<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class HomeController extends Controller
{
    function datatable(Request $request){
        if ($request->ajax()) {
            $data = User::select('*');
    
            return Datatables::of($data)
                ->editColumn('action', function($row){
                   // Define custom action buttons here
                   // For example, edit and delete buttons
                   $btn = '<button>Edit</button>';
                   $btn .= '<button>Delete</button>';
                   return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('datatable');
    }
}
