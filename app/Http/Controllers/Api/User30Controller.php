<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiFormat;
use App\Models\Agama;
use App\Models\DetailData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class User30Controller extends Controller
{
    public function index30()
    {
        $data = User::where('role', 'User')->get();
        return new ApiFormat(true, 'Detail User', $data);
    }
    public function approve30($id)
    {
        DetailData::create(['id_user' => $id]);
        $data = User::where('id', $id)->update(['is_aktif' => '1']);
        return new ApiFormat(true, 'User berhasil diapprove!', $data);
    }
    public function show30($id)
    {
        $user = User::where('id', $id)->get();
        $detail = DetailData::where('id_user', $id)->get();
        $data = [$user, $detail];
        return new ApiFormat(true, 'Show User', $data);
    }
    public function update30(Request $request)
    {
        $data = DetailData::where('id_user', $request->id)->update([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat,
            'tanggal_lahir' => $request->tanggal,
            'id_agama' => $request->agama,
            'foto_ktp' => $request->foto_ktp,
            'umur' => $request->umur
        ]);
        return new ApiFormat(true, 'Detail data berhasil diupdate!', $data);
    }

    public function updatefoto30(Request $request)
    {
        $data = User::where('id', $request->id)->update(['foto' => $request->foto]);

        return new ApiFormat(true, 'Foto Profil berhasil diupdate!', $data);
    }

    public function updatepass30(Request $request)
    {
        $data = User::where('id', $request->id)->update(['password' => $request->password]);
        return new ApiFormat(true, 'Password berhasil diganti!', $data);
    }
}