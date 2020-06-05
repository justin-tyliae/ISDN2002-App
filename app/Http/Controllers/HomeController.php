<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PatientCase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->type === "Elderly")
        {
            $devices = auth()->user()->devices()->get();
            $patient_cases = PatientCase::all()->where('patient_id', auth()->user()->id);
            return view('home_elderly')->with(['devices' => $devices, 'patient_cases' => $patient_cases]);
        }
        else if (auth()->user()->type === "Doctor")
        {
            $patient_cases = PatientCase::all()->where('doctor_id', auth()->user()->id);
            return view('home_doctor')->with('patient_cases', $patient_cases);
        }
    }
}
