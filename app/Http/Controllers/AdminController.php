<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDataBarang(){
        $data = DB::table('table_barang')->join('table_category_barang', 'table_barang.category', '=', 'table_category_barang.id')
                ->select('table_barang.*', 'table_category_barang.id', 'table_category_barang.name as category')
                ->get();

        $kategori = DB::table('table_category_barang')->get();
        return view('admin.dataBarang', compact('data', 'kategori'));
    }
    public function storeDataBarang(Request $request){
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images'), $filename);

        DB::table('table_barang')->insert([
            'name' => $request->nama,
            'category' => $request->kategori,
            'status' => 'Wait For Approval',
            'image' => $filename,
        ]);
        return redirect()->back();    
    }

    public function showDataCategory(){
        $data = DB::table('table_category_barang')->get();
        return view('admin.dataCategory', compact('data'));
    }

    public function storeDataCategory(Request $request){
        DB::table('table_category_barang')->insert([
            'name'=> $request->name,
        ]);
        return redirect()->back(); 
    }

    public function updateDataCategory(Request $request){
        DB::table('table_category_barang')
        ->where('id', $request->id)
        ->update(['name' => $request->name]);
        
        return redirect()->back(); 
    }

    function destroyDataCategory($id){
        $deleted = DB::table('table_category_barang')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
