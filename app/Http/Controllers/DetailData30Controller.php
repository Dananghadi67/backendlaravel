<?php

namespace App\Http\Controllers;

use App\Models\DetailData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DetailData30Controller extends Controller
{
    public function index30($id)
    {
        $id_user = Crypt::decrypt($id);
        $user = User::where('id', $id_user)->get();
        $data = DetailData::where('id_user', $id_user)->get();
        return view('admin.detail_user', compact('user', 'data'));
    }
}
