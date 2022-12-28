<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Agama30Controller extends Controller
{
    public function index30()
    {
        $client = new Client();
        $response = $client->request('GET', url('api/data-agama30'));
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);
        $agama = $result['data'];
        return view('apiclient.admin.agama', compact('agama'));
    }
    public function create30(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', url('api/create-agama30'), [
            'json' => [
                'agama' => $request->agama
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);
        return Redirect::back()->with(['agamaadd' => $result['message']]);
    }
    public function edit30($id)
    {
        $client = new Client();
        $response = $client->request('GET', url('api/show-agama30/') . '/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);
        $agama = $result['data'];
        return view('apiclient.admin.edit_agama', compact('agama'));
    }
    public function update30(Request $request)
    {
        $client = new Client();
        // dd($request->id);
        $response = $client->request('POST', url('api/update-agama30'), [
            'json' => [
                'id' => $request->id, 'agama' => $request->agama
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);

        return redirect('/client/admin30/data-agama30')->with(['agama' => $result['message']]);
    }
    public function delete30($id)
    {
        $client = new Client();
        $response = $client->request('GET', url('api/delete-agama30/') . '/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);
        return Redirect::back()->with(['agamadel' => $result['message']]);
    }
}
