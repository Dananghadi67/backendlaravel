<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class Admin30Controller extends Controller
{
    public function index30()
    {
        $user = User::where('role', 'User')->get();
        return view('admin.dashboard', compact('user'));
    }
    public function update_foto30(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $file = $request->file('profil');
        $tujuan_upload = 'profil';
        if ($file == null) {
            $filename = $user->foto;
        } else {
            $filename = Carbon::now()->timestamp . "_" . $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            File::delete(public_path('profil/' . $user->foto));
        }
        User::where('id', Auth::user()->id)->update(['foto' => $filename]);
        return Redirect::back()->with('foto', 'Foto profil berhasil diupdate!');
    }
}
