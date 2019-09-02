<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Session;
use DateTime;
use Illuminate\Support\Carbon;
use MaddHatter\LaravelFullcalendar\Calendar;

class AppointmentController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $appointments = Appointment::latest()->paginate(300);

        $event = [];
        foreach ($appointments as $row) {
            if($row->completed==0){
                $row['color']="red";
            }
            $event[] = Calendar::event(
                $row->fullName .' | ' . $row->appointment_type,
                false,
                new DateTime($row->beg),
                new DateTime($row->end),
                $row->id,
                [
                    'color' => $row->color,

                ]
            );
        }


        $calendar = \Calendar::addEvents($event)->setOptions(['lang' => 'tr'])->setCallbacks([
            'eventClick' => 'function(event) { updateAppointment(event.id)}',
            'eventRender' => 'function (event,jqEvent,view) {jqEvent.tooltip({placement: "top", title: event.title});}'
        ]);
        return view('appointment.index', compact('appointments', 'calendar', 'doctors'));
    }

    public function create()
    {
        $doctors = Doctor::orderBy('id', 'Asc')->get();
        $patients = Patient::orderBy('name', 'Asc')->get();
        return view('appointment.create', compact('patients', 'doctors'));
    }


    public function store(Request $request)
    {
        $appointment = Appointment::create([
            'patient_id' => $request->patientId,
            'doctor_id' => $request->doctor_id,
            'name' => $request->name,
            'last_name' => $request->lastname,
            'phone' => $request->phone,
            'appointment_type' => $request->appointment_type,
            'appointment_note' => $request->appointment_note,
            'appointment_date' => "2019/08/08",
            'color' =>$request->color,
            'beg' => Carbon::parse($request->beg),
            'end' => Carbon::parse($request->end),
        ]);

        Session::Flash("success", "Randevu Sisteme Eklendi");
        return redirect()->route('appointment.index');
    }

    public function getAppointmentDetails($id)
    {
        $appointment = Appointment::findOrfail($id);
        if ($appointment) {
            return response()->json($appointment);
        }
    }

    public function getAppointmentHour(Request $request)
    {

        $date = $request->date;

        $app_hours = Appointment::where('appointment_date', $date)->get();
        $hour_list = [];

        foreach ($app_hours as $hour) {
            $size = strlen($hour->beg);
            $aph = substr($hour->beg, $size - 8, 5) . '-' . substr($hour->end, $size - 8, 5);
            array_push($hour_list, $aph);
        }

        return response()->json(['data' => $hour_list]);
    }


    public function update(Request $request, $id)
    {


        $appointment = Appointment::findOrfail($id);
        if (isset($request->completed)) {

            $appointment->update(['completed' => $request->completed]);
        } else {
            $appointment->update($request->all());
        }

        return response()->json('Randevu bilgileri güncellendi');
    }


    public function destroy($id)
    {
        $appointment = Appointment::findOrfail($id);
        if ($appointment->delete()) {
            return response()->json('Randevu silindi');
        }
    }
}
