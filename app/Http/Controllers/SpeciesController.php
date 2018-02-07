<?php

namespace App\Http\Controllers;

use App\Specie;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Specie::all();
        return view('species.overview', compact('species'));
    }

    public function create()
    {
        return view('species.create');
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $specie = new Specie();
        $specie->species_description = $request->description;

        $specie->save();

        return redirect()->route('species.overview');
    }

    public function edit($id)
    {
        $specie = Specie::find($id);
        return view('species.edit', compact('specie'));
    }

    public function postEdit(Request $request, $id)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $specie = Specie::find($id);
        $specie->species_description = $request->description;

        $specie->save();

        return redirect()->route('species.overview');
    }

    public function destroy($id)
    {
        $specie = Specie::find($id);

        $specie->delete();

        return redirect()->route('species.overview');
    }
}
