<?php

namespace App\Http\Controllers;

use App\Client;
use App\Patient;
use App\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    public function index($method = "asc", $field = "id")
    {
        if ($method == "asc") {
            if ($field == "id") {
                $patients = Patient::orderBy("patient_id")->get();
            }

            if ($field == "name") {
                $patients = Patient::orderBy("patient_name")->get();
            }

            if ($field == "species_id") {
                $patients = Patient::orderBy("species_id")->get();
            }

            if ($field == "client_id") {
                $patients = Patient::orderBy("client_id")->get();
            }

            if ($field == "patient_status") {
                $patients = Patient::orderBy("patient_status")->get();
            }
        } elseif ($method == "desc") {
            if ($field == "id") {
                $patients = Patient::orderBy("patient_id", "DESC")->get();
            }

            if ($field == "name") {
                $patients = Patient::orderBy("patient_name", "DESC")->get();
            }

            if ($field == "species_id") {
                $patients = Patient::orderBy("species_id", "DESC")->get();
            }

            if ($field == "client_id") {
                $patients = Patient::orderBy("client_id", "DESC")->get();
            }

            if ($field == "patient_status") {
                $patients = Patient::orderBy("patient_status", "DESC")->get();
            }
        }

        return view('patients.overview', compact('patients'));
    }

    public function create()
    {
        $species = Specie::all();
        $clients = Client::all();
        return view('patients.create', compact('species', 'clients'));
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'client' => 'required',
            'status' => 'required'
        ]);

        $patient = new Patient();
        $patient->patient_name = $request->name;
        $patient->species_id = $request->specie;
        $patient->client_id = $request->client;
        $patient->patient_status = $request->status;

        $patient->save();

        return redirect()->route('patients.overview');
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    public function postEdit(Request $request, $id)
    {
        $data = $request->validate([
            'patient_name' => 'required',
            'specie_id' => 'required|integer',
            'client_id' => 'required|integer',
            'patient_status' => 'required',
        ]);

        $patient = Patient::find($id);
        $patient->patient_name = $request->patient_name;
        $patient->species_id = $request->specie_id;
        $patient->client_id = $request->client_id;
        $patient->patient_status = $request->patient_status;

        $patient->save();

        return redirect()->route('patients.overview');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id)->delete();

        return redirect()->route('patients.overview');
    }
}
