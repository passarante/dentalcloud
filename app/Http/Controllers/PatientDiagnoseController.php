<?php

namespace App\Http\Controllers;

use App\Models\PatientDiagnose;
use App\Models\Treatment;
use App\Models\Patient;
use App\Models\PatientTreatment;
use App\Models\TreatmentBranch;
use Illuminate\Http\Request;

class PatientDiagnoseController extends Controller
{



    public function index($patientId){
        $patient = Patient::with('treatments', 'diagnoses', 'ptreatments')->findOrfail($patientId);
        $branches = TreatmentBranch::all();
        return view('patient.diagnose.index', compact('patient', 'branches'));
    }

    public function getDiagnosePhoto($diagnoseName)
    {
        $photoName = Treatment::where('treatment_name', $diagnoseName)->first();
        return response()->json($photoName);
    }


    public function deleteDiagnose($id)
    {
        $diagnose = PatientDiagnose::findOrfail($id);
        if ($diagnose->delete()) {
            return response()->json(['message' => 'Diagnose bilgileri silindi']);
        }
    }

    public function addTreatment(Request $request)
    {
        $treatment = PatientDiagnose::create([
            'patient_id' => $request->patientId,
            'diagnose_date' => $request->date,
            'diagnose_note' => $request->note,
            'treatment_dents' => $request->teethNr,
            'applicated_treatment' => $request->treatment
        ]);

        if ($treatment) {
            return response()->json(['message' => 'Tedaviler eklendi']);
        }
    }
}
