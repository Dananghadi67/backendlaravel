<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\DetailData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class User30Controller extends Controller
{
    public function index30()
    {
        $data = DetailData::where('id_user', Auth::user()->id)->get();
        return view('user.dashboard', compact('data'));
    }
    public function approve30($id)
    {
        $user_id = Crypt::decrypt($id);
        DetailData::create(['id_user' => $user_id]);
        User::where('id', $user_id)->update(['is_aktif' => '1']);
        return redirect('/admin30')->with(['approved' => 'User berhasil diapprove!']);
    }
    public function edit30()
    {
        $agama = Agama::get();
        $data = DetailData::where('id_user', Auth::user()->id)->get();
        return view('user.edit', compact('data', 'agama'));
    }
    public function update30(Request $request)
    {
        $user = DetailData::where('id_user', Auth::user()->id)->first();
        $dateOfBirth = $request->tanggal;
        $age = Carbon::parse($dateOfBirth)->age;
        $file = $request->file('ktp');
        $tujuan_upload = 'ktp';
        if ($file == null) {
            $filename = $user->foto_ktp;
        } else {
            $filename = Carbon::now()->timestamp . "_" . $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            File::delete(public_path('ktp/' . $user->foto_ktp));
        }
        DetailData::where('id_user', Auth::user()->id)->update([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat,
            'tanggal_lahir' => $request->tanggal,
            'id_agama' => $request->agama,
            'foto_ktp' => $filename,
            'umur' => $age
        ]);
        return redirect('/dashboard30')->with(['updated' => 'Detail data berhasil diupdate!']);
    }
    public function gantipass30()
    {
        return view('user.password');
    }
    public function updatepass30(Request $request)
    {
        $this->validate($request, [
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        return redirect('/dashboard30')->with(['password' => 'Password berhasil diganti!']);
    }
}
