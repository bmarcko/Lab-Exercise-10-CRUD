<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Session;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('pets', compact('pets'));
    }

    public function showEditForm($id)
    {
        $pet = Pet::find($id);
        if (!is_null($pet)) {
            return view('edit-pet', compact('pet'));
        }
        Session::flash('error', 'We cannot find the record you are looking for.');
        return redirect()->back();
    }

    public function showNewForm()
    {
        return view('new-pet-form');
    }

    public function savePetChanges(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'owner' => 'required|max:150'
        ]);

        try {
            $id = $request->id;
            $pet = Pet::find($id);
            $pet->update([
                'name' => $request->name,
                'type_animal' => $request->type_animal,
                'owner' => $request->owner,
                'address' => $request->address
            ]);
            Session::flash('message', 'Successfully updated pet');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later');
        }
        return redirect('/pets');
    }

    public function saveNewPet(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:200',
            'owner' => 'required|max:100'
        ]);

        try {
            $testing = Pet::create([
                'name' => $request->name,
                'type_animal' => $request->type_animal,
                'owner' => $request->owner,
                'address' => $request->address
            ]);
            if (!is_null($testing)) {
                Session::flash('message', 'Successfully added a new pet');
            } else {
                throw new Exception('Unable to create a new pet');
            }
            
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later');
        }

        return redirect('/pets');
    }

    public function deletePet($id)
    {
        $pet = pet::find($id);
        $pet->delete();

        Session::flash('message', 'Successfully removed a record');
        return redirect('/pets');
    }
}

