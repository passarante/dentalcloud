<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(){
        return view('doctor.index');
    }
    public function create(){
        return view('doctor.create');
    }


    public function store(Request $request)
    {

        Doctor::create($request->all());
        return response()->json(['success' => 'Hekim sisteme eklendi']);
    }

    public function indexAjax()
    {


        $groups = Doctor::latest()->get();

        return \DataTables::of($groups)
            ->editColumn("action_btns", function ($groups) {
                return '<button class="btn btn-primary btn-xs" onclick="showEditModal(' . $groups->id . ')">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" onclick="deleteDoctor(' . $groups->id . ',\'' . $groups->name .' ' . $groups->name . '\')">
                                            <i class="fa fa-trash-o "></i>
                                        </button>';
            })->rawColumns(["action_btns"])
            ->make(true);



        //return \DataTables::of(Patient::query())->make(true);
    }

    public function getDoctorDetail($id)
    {
        $doctor = Doctor::findOrfail($id);
        return response()->json(['data' => $doctor]);
    }

    public function updateDoctor(Request $request)
    {
        $doctor = Doctor::findOrfail($request->id);
        $doctor->name = $request->name;
        $doctor->last_name = $request->last_name;
        $doctor->branch_name = $request->branch_name;
        $doctor->save();
        return response()->json(['success' => 'Grup bilgileri güncellendi.']);
    }

    public function deleteDoctor($id)
    {
        $check = Doctor::findOrfail($id);
        $check->delete();
        return response()->json(['success' => $check->name . ' ' . $check->last_name. ' sistemden çıkartıldı']);
    }
}
