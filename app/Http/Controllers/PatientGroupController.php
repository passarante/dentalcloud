<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientGroup;

class PatientGroupController extends Controller
{
    public function create(){
        $patient_groups=PatientGroup::latest()->paginate(5);
        return view('patient-group.create', compact('patient_groups'));
    }

    public function store(Request $request){

        PatientGroup::create($request->all());
        return response()->json(['success' => 'Hasta grubu sisteme eklendi']);
    }

    public function checkGroupName(Request $request){
        $check = PatientGroup::where('group_name', $request->group_name)->take(1)->get();
        return response()->json(['data'=> $check]);

    }

    public function deleteGroupName($id){
        $check = PatientGroup::findOrfail($id);
        $check->delete();
        return response()->json(['success' => $check->group_name .' sistemden çıkartıldı']);
    }

    public function getPatientGroup($id){
        $group = PatientGroup::findOrfail( $id);
        return response()->json(['data' => $group]);
    }

    public function updatePatientGroup(Request $request){
        $group = PatientGroup::findOrfail($request->id);
        $group->group_name=$request->group_name;
        $group->discount_rate=$request->discount_rate;
        $group->save();
        return response()->json(['success' => 'Grup bilgileri güncellendi.']);
    }

    public function getPatientGroupDataTable()
    {


        $groups = PatientGroup::latest()->get();

        return \DataTables::of($groups)
            ->editColumn("action_btns", function ($groups) {
                return '<button class="btn btn-primary btn-xs" onclick="showEditModal(' .$groups->id . ')">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" onclick="deleteGroupName('.$groups->id. ',\'' . $groups->group_name .'\')">
                                            <i class="fa fa-trash-o "></i>
                                        </button>';
            })->rawColumns(["action_btns"])
            ->make(true);



        //return \DataTables::of(Patient::query())->make(true);
    }
}
