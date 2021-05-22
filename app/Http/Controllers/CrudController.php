<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    public function index()
    {
        $menu = DB::table('_menu')->select('*')->get();
        $data_barang = DB::table('tes')->select('*')->paginate(5);
        return view('crud', ['data_barang' => $data_barang, 'menu' => $menu]);
    }

    public function tambah()
    {
        return view('tambah-data');
    }

    public function simpan(Request $request)
    {
        DB::table('tes')->insert(
            ['nama_depan' => $request->nama_depan, 'nama_belakang' => $request->nama_belakang]
        );
        return redirect()->route('tes');
    }

    public function edit($id)
    {
        $data_barang = DB::table('tes')->where('id',$id)->first();
        return view('edit-data',['data_barang' => $data_barang]);
    }

    public function update(Request $request, $id)
    { 
        DB::table('tes')->where('id',$id)->update(
            ['nama_depan' => $request->nama_depan, 'nama_belakang' => $request->nama_belakang]
        );
        return redirect()->route('tes');
    }

    public function delete($id)
    {
        DB::table('tes')->where('id',$id)->delete();
        return redirect()->back();
    }
}
