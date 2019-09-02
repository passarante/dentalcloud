<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Patient;
use App\Models\Doctor;

class ConversationController extends Controller
{
    public function index(){

        $conversations = Conversation::orderBy('name', 'asc')->get();
        return view('conversation.index', compact('conversations'));
    }
    public function create(){

         $doctors = Doctor::orderBy('id', 'Asc')->get();
      
        $patients = Patient::orderBy('name', 'asc')->get();
       
        return view('conversation.create', compact('patients', 'doctors'));
    }

    public function store(Request $request){

    Conversation::create([
        'patient_id' => $request->patient_id,
        'name' => $request->name,
        'last_name' => $request->lastname,
        'conversation_type' => $request->conversation_type,
        'conversation_date' => $request->conversation_date,
        'message_body' => $request->message_body,
       	
    ]);
    return redirect()->route('conversation.index');
    }
}
