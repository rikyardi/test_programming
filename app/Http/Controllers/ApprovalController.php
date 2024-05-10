<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    
    public function showDataBarang(){
        $data = DB::table('table_barang')->join('table_category_barang', 'table_barang.category', '=', 'table_category_barang.id')
                ->select('table_barang.*', 'table_category_barang.id as id_category', 'table_category_barang.name as category')
                ->get();

        $kategori = DB::table('table_category_barang')->get();
        return view('approval.dataBarang', compact('data', 'kategori'));
    }

    public function approveData(Request $request){
        DB::table('table_barang')
        ->where('id', $request->id)
        ->update(['status' => 'Approved']);
        
        return redirect()->back(); 
    }

    public function rejectData(Request $request){
        DB::table('table_barang')
        ->where('id', $request->id)
        ->update(['status' => 'Rejected']);
        
        return redirect()->back(); 
    }
}   
