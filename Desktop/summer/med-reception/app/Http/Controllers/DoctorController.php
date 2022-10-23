<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request) {
        return view('doctors.index', [
            'doctors' => Doctor::all()
        ]);
    }

    public function show($id) {
        return view('doctors.show', [
            'doctor' => Doctor::find($id)
        ]);
    }
    
    public function indexAPI(Request $request) {
        $doctors = Doctor::latest()->filter(request(['name']))->get()->toArray();

        return response()->json(['users' => $doctors]);
    }

    public function delete($id) {
        Doctor::destroy($id);

        return 'success';
    }
}
