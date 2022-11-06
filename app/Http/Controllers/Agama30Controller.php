<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Agama30Controller extends Controller
{
    public function index30()
    {
        $agama = Agama::get();
        return view('admin.agama', compact('agama'));
    }
    public function create30(Request $request)
    {
        Agama::create(['nama_agama' => $request->agama]);
        return Redirect::back()->with(['agamaadd' => 'Data agama berhasil ditambahkan!']);
    }
    public function edit30($id)
    {
        $agama = Agama::where('id', $id)->get();
        return view('admin.edit_agama', compact('agama'));
    }
    public function update30(Request $request)
    {
        Agama::where('id', $request->id)->update(['nama_agama' => $request->agama]);
        return redirect('/admin30/data-agama30')->with(['agama' => 'Data agama berhasil diupdate!']);
    }
    public function delete30($id)
    {
        Agama::where('id', $id)->delete();
        return Redirect::back()->with(['agamadel' => 'Data agama berhasil dihapus!']);
    }
}
