<?php

namespace App\Http\Controllers;

use App\Client;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.overview', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function postCreate(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $client = new Client();
        $client->client_firstname = $request->first_name;
        $client->client_lastname = $request->last_name;

        $client->save();

        return redirect()->route('clients.overview');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function postEdit(Request $request, $id)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $client = Client::find($id);
        $client->client_firstname = $request->first_name;
        $client->client_lastname = $request->last_name;

        $client->save();

        return redirect()->route('clients.overview');
    }

    public function destroy($id)
    {
        $client = DB::table('clients')->where('client_id', '=', $id)->delete();

        return redirect()->route('clients.overview');
    }
}
