<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreatmentBranch;
use App\Models\Treatment;

class TreatmentController extends Controller
{
    public function index()
    {
        $branchs=TreatmentBranch::with('treatments')->get();;
        return view('treatment.index', compact('branchs'));
    }

    public function createBranch(Request $request)
    {
        $check_treatment = TreatmentBranch::where('branch_name', $request->branch_name)->take(1)->get();

        if(count($check_treatment)>0){

        return response()->json(['success' => 'Dikkat' . $request->branch_name . ' daha önce sisteme eklenmiş.']);
        }else{
            $treatment = TreatmentBranch::create($request->all());
            return response()->json(['success' => $treatment->branch_name . ' sisteme eklendi.']);
        }

    }

    public function createTreatment(Request $request){
        $treatment = Treatment::create($request->all());
        return response()->json(['success' => $treatment->treatment_name . ' sisteme eklendi.']);
    }

    public function updateTreatment(Request $request){

        $treatment = Treatment::findOrfail($request->id);
        $treatment->update([
            'treatment_name' => $request->treatment_name,
            'price' => $request->price,
        ]);
        return response()->json(['success' => 'Tedavi bilgileri güncellendi.']);
    }

    public function deleteTreatment($id){
        $treatment = Treatment::findOrfail($id);
        if($treatment->delete()){
            return response()->json(['success' => $treatment->treatment_name . ' sistemden silindi.']);
        }
    }


    public function getTreatments($branchId){
        $treatments = Treatment::where('treatment_branch_id', $branchId)->orderBy('treatment_name')->get();

        return response()->json($treatments);
    }
}
