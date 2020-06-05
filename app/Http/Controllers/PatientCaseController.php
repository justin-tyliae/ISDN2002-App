<?php

namespace App\Http\Controllers;

use App\PatientCase;
use Illuminate\Http\Request;

use App\TrainingData;

class PatientCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = auth()->user()->all()->where('type', 'Elderly');
        return view('addPatientCase')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'elderly-name' => 'required',
        ]);

        $elderly = auth()->user()->all()->where('name', $request->input('elderly-name'))->first();

        $patient_case = new PatientCase;
        $patient_case->patient_name = $elderly->name;
        $patient_case->doctor_name = auth()->user()->name;
        $patient_case->patient_id = $elderly->id;
        $patient_case->doctor_id = auth()->user()->id;
        $patient_case->alias = $request->input('patient-alias');
        $patient_case->save();

        return redirect('/home')->with('success', 'Patient has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatientCase  $patientCase
     * @return \Illuminate\Http\Response
     */
    public function show(PatientCase $patientCase)
    {
        $training_data = TrainingData::all()->where('user_id', $patientCase->patient_id);
        return view('patientTrainingData')->with(['patient_case' => $patientCase, 'training_data' => $training_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientCase  $patientCase
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientCase $patientCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientCase  $patientCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientCase $patientCase)
    {
        $patient_case = PatientCase::findOrFail($patientCase->id);
        $patient_case->doctor_suggestions = $request->input('suggestions');
        $patient_case->save();

        return back()->with('success', 'Suggestions have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientCase  $patientCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientCase $patientCase)
    {
        $patient_case = PatientCase::findOrFail($patientCase->id)->first();
        $patient_case->delete();

        return redirect('/home')->with('success', 'Patient has been removed.');
    }
}
