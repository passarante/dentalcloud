<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientDiagnose;
use App\Models\PatientPTreatment;
use App\Models\PatientTreatment;
use App\Models\TreatmentBranch;
use Illuminate\Http\Request;

class PatientTreatmentController extends Controller
{

    public function index($patientId)
    {
        $patient = Patient::with('treatments', 'diagnoses','ptreatments')->findOrfail($patientId);
        $branches = TreatmentBranch::all();
        return view('patient.treatment.index', compact('patient', 'branches'));
    }
    public function pindex($patientId)
    {
        $patient = Patient::with('treatments', 'diagnoses','ptreatments')->findOrfail($patientId);
        $branches = TreatmentBranch::all();
        return view('patient.ptreatment.index', compact('patient', 'branches'));
    }

    public function getDiagnosesData($patientId)
    {
        $diagnoses = PatientDiagnose::where('patient_id', $patientId)->get();

        return response()->json(['diagnoses' => $diagnoses]);
    }
    public function getTreatmentsData($patientId)
    {
        $diagnoses = PatientTreatment::where('patient_id', $patientId)->get();

        return response()->json(['treatments' => $diagnoses]);
    }


    public function addTreatment(Request $request)
    {
        $treatment =PatientTreatment::create([
            'patient_id' => $request->patientId,
            'treatment_date' => $request->date,
            'treatment_note' => $request->note,
            'treatment_dents' => $request->teethNr,
            'applicated_treatment' => $request->treatment
        ]);

        if($treatment){
            return response()->json(['message' => 'Tedaviler eklendi']);
        }


    }
    public function addPTreatment(Request $request)
    {
        dd($request);
        $treatment =PatientPTreatment::create([
            'patient_id' => $request->patientId,
            'treatment_date' => $request->date,
            'treatment_note' => $request->note,
            'treatment_dents' => $request->teethNr,
            'applicated_treatment' => $request->treatment
        ]);

        if($treatment){
            return response()->json(['message' => 'Tedaviler eklendi']);
        }


    }
}
