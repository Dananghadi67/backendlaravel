<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class Admin30Controller extends Controller
{
    public function index30()
    {
        $client = new Client();
        $response = $client->request('GET', url('api/data-user30'));
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);
        $user = $result['data'];
        // $user = User::where('role', 'User')->get();
        return view('apiclient.admin.dashboard', compact('user'));
    }
    public function update_foto30(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', url('api/show-user30') . '/' . Auth::user()->id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();
        $result = json_decode($body, true);
        $user = $result['data'][0][0];

        $file = $request->file('profil');
        $tujuan_upload = 'profil';
        if ($file == null) {
            $filename = $user['foto'];
        } else {
            $filename = Carbon::now()->timestamp . "_" . $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            File::delete(public_path('profil/' . $user['foto']));
        }

        $response = $client->request('POST', url('api/update-foto-profil30'), [
            'json' => [
                'id' => Auth::user()->id,
                'foto' => $filename
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();
        $result = json_decode($body, true);

        return Redirect::back()->with('foto', $result['message']);
    }
}
