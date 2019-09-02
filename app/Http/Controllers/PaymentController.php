<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientPayment;
use App\Models\Doctor;
use App\Models\Patient;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = PatientPayment::latest()->get();

        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        $doctors = Doctor::orderBy('id', 'Asc')->get();
        $patients = Patient::orderBy('name', 'Asc')->get();
        return view('payment.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
       

        PatientPayment::create([
            'patient_id' => $request->patientId,
            'amount' => $request->amount,
            'payment_note' => $request->payment_note,
            'payment_type' => $request->payment_type,
            'payment_date' => $request->payment_date,


        ]);
        return redirect()->route('payment.index');
    }
}
