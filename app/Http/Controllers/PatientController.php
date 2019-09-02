<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\PatientGroup;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('name', 'DESC');

        return view('patient.index', compact('patients', 'patient_groups'));
    }

    public function create()
    {
        Session::put('files', null);
        $patient_groups = PatientGroup::all();
        return view('patient.create', compact('patient_groups'));
    }

    public function store(Request $request)
    {
        $photos = Session::get('files');
        $patient = Patient::create([

            'tck_no' => $request->tck_no,
            'passport_no' => $request->passport_no,
            'protocol_no' => $request->protocol_no,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'profession' => $request->profession,
            'reference' => $request->reference,
            'dob' => $request->dob,
            'lob' => $request->lob,
            'gender' => $request->gender,
            'blood_type' => $request->blood_type,
            'face_type' => $request->face_type,
            'discount_rate' => $request->discount_rate,
            'important_note' => $request->important_note,
            'patient_type' => $request->patient_type,
            'patient_group_id' => $request->patient_group_id
        ]);
        $patient->contact()->create([
            'patient_id' => $patient->id,
            'gsm2' => $request->gsm2,
            'work_phone' => $request->work_phone,
            'fax' => $request->fax,
            'home_phone' => $request->home_phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'town' => $request->town,
            'work_address' => $request->work_address,
            'closer_friend' => $request->closer_friend,
            'closer_friend_phone' => $request->closer_friend_phone,
            'closer_friend_status' => $request->closer_friend_status
        ]);
        $other_issues = $request->other_issues;

        if ($request->kalpr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Kalp Rahatsızlıkları';
            } else {
                $other_issues = 'Kalp Rahatsızlıkları';
            }
        }

        if ($request->sekerr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Şeker Hastalığı';
            } else {
                $other_issues = 'Şeker Hastalığı';
            }
        }
        if ($request->tansiyonr != "") {

            if (strlen($other_issues) > 0) {

                $other_issues .= ',Tansiyon Sorunları';
            } else {
                $other_issues = 'Tansiyon Sorunları';
            }
        }
        if ($request->epilepsir != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Epilepsi (Sara)';
            } else {
                $other_issues = 'Epilepsi (Sara)';
            }
        }
        if ($request->kanr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Kan Hastalıkları';
            } else {
                $other_issues = 'Kan Hastalıkları';
            }
        }
        if ($request->romatizmalr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Romatizmal Hastalıklar';
            } else {
                $other_issues = 'Romatizmal Hastalıklar';
            }
        }

        if ($request->bkaracigerr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Böbrek, Karaciğer Rahatsızlıkları';
            } else {
                $other_issues = 'Böbrek, Karaciğer Rahatsızlıkları';
            }
        }
        if ($request->akcigerr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Akciğer Rahatsızlıkları';
            } else {
                $other_issues = 'Akciğer Rahatsızlıkları';
            }
        }
        if ($request->norolojikr != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Nörolojik Rahatsızlıklar';
            } else {
                $other_issues = 'Nörolojik Rahatsızlıklar';
            }
        }
        if ($request->zuhrevir != "") {
            if (strlen($other_issues) > 0) {
                $other_issues .= ',Zührevi Hastalıklar';
            } else {
                $other_issues = 'Zührevi Hastalıklar';
            }
        }

        $patient->detail()->create([
            'patient_id' => $patient->id,
            'active_treatments' => $request->active_treatments,
            'patient_history' => $request->patient_history,
            'radio_therapy' => $request->radio_therapy,
            'drug_allergy' => $request->drug_allergy,
            'other_issues' => $other_issues,
            'pregnancy' => $request->pregnancy,
            'bad_habits' => $request->bad_habits,
            'last_treatment' => $request->last_treatment,
            'patient_note' => $request->patient_note,
            'bleeding_duration' => $request->bleeding_duration,
        ]);

        if ($photos != null) {
            foreach ($photos as $photo) {
                $patient->photos()->create([
                    'patient_id' => $patient->id,
                    'path' => $photo
                ]);
            }
        }

        return redirect()->route('patient.index');
    }

    public function photoStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);

        $photos = Session::get('files');
        if ($photos == null) {
            $photos = [];
        }
        array_push($photos, $imageName);
        Session::put('files', $photos);
        return response()->json(['success' => $imageName]);
    }

    public function photoDestroy(Request $request)
    {
        $photos = Session::get('files');
        $filename = $request->get('filename');

        $key = array_search($filename, $photos);

        if ($key !== false) {
            unset($photos[$key]);
        }


        Session::put('files', $photos);

        $path = public_path() . '/uploads/patient_pics/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function getPatientDataTable()
    {


        $patients = Patient::with('group')->get();

        return \DataTables::of($patients)
            ->editColumn("action_btns", function ($patients) {
                return '<a href="/patient/show/' . $patients->id . '" data-id="#edit-' . $patients->id . '" class="btn btn-secondary"> <i class="fa fa-edit"></i>Detayları Göster</a>';
            })->rawColumns(["action_btns"])
            ->editColumn("select", function ($patients) {
                return '<a onclick="selectPatient(' . $patients->id . ')" " data-id="#select-' . $patients->id . '" class="btn btn-pink"> <i class="fa fa-user"></i>Seç</a>';
            })->rawColumns(["action_btns", "select"])
            ->make(true);
    }

    public function show($id)
    {

        $patient = Patient::with(['contact', 'photos', 'appointments','conversations', 'payments','treatments','diagnoses'])->findOrfail($id);

        return view('patient.show', compact('patient'));
    }

    public function selectPatient($id)
    {

        $patient = Patient::findOrFail($id);


        if (!empty(Session::get('patient_id'))) {

            Session::forget('patient_id');
            Session::forget('patient_full_name');
            Session::put('patient_id', $patient->id);
            Session::put('patient_full_name', $patient->name . $patient->last_name);
        } else {
            Session::put('patient_id', $patient->id);
            Session::put('patient_full_name', $patient->name . $patient->last_name);
        }

        return response()->json(['success' => $patient->name . ' başarıyla seçildi', 'name' => Session::get('patient_full_name')]);
    }
}
