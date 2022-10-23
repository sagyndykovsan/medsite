<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request) {
        $patients = Patient::latest()->paginate(20);

        foreach($patients as $patient) {
            $patient->chargedDoctor = Doctor::find($patient->chargedDoctorId)->name;
        }

        return view('patients.index', [
            'patients' => $patients
        ]);
    }

    public function show($id) {
        $patient = Patient::find($id);
        $patient->chargedDoctor = Doctor::find($patient->chargedDoctorId)->name;

        return view('patients.show', [
            'patient' => $patient
        ]);
    }

    public function create() {
        return view('patients.create');
    }
    
    public function store(Request $request) {
        $formValidated = $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required',
            'diagnose' => 'required',
            'diseaseDate' => 'required',
            'chargedDoctorId' => 'numeric',
            'insuranceCode' => 'required|numeric',
            'insuranceCompany' => 'required'
        ]);

        

        $p = Patient::create($formValidated);

        return redirect()->route('home')->with('message', 'Пациент добавлен!');
}

    public function edit($id) {
        return view('patients.edit', [
            'patient' => Patient::find($id)
        ]);
    }

    public function update($id) {
        $patient = Patient::find($id);

        $inputAll = request()->all();

        $patient->fill($inputAll);
        $patient->save();

        return redirect()->route('home')->with('message', 'Пациент изменен!');
    }

}