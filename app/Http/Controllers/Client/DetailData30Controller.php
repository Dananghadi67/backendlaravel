<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DetailData;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DetailData30Controller extends Controller
{
    public function index30($id)
    {
        $client = new Client();
        $response = $client->request('GET', url('api/show-user30/') . '/' . $id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $result = json_decode($body, true);
        $user = $result['data'][0];
        $data = $result['data'][1];

        return view('apiclient.admin.detail_user', compact('user', 'data'));
    }
}
