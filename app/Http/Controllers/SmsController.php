<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\SmsMessage;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class SmsController extends Controller
{
    private $SMS_SENDER = "DENTMODERN";
    private $RESPONSE_TYPE = 'json';
    private $SMS_USERNAME = 'guneydirim@gmail.com';
    private $SMS_PASSWORD = 'Gny6121577578';

    public function index()
    {
        return view('sms.index');
    }

    public function create()
    {
        $patients = Patient::all();
        return view('sms.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $data = [
            'patient_id' => $request->patient_id,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'message' => $request->message,

        ];
        if ($request->date != null) {
            $data['date'] = $request->date;
        }else{

            $dd= Carbon::now();

            $data['date']=$dd->format('Y-m-d');
            $data['status']=1;
//Send SMS Message
        }
        $smsMessage = SmsMessage::create($data);
    }

    public function getUserNumber(Request $request)
    {
        $phone_number = $request->input('phone_number');

        $message = "A message has been sent to you";

        $this->initiateSmsActivation($phone_number, $message);
        //$this->initiateSmsGuzzle($phone_number, $message);

        return redirect()->back()->with('message', 'Message has been sent successfully');
    }


    public function initiateSmsActivation($phone_number, $message)
    {
        $isError = 0;
        $errorMessage = true;

        //Preparing post parameters
        $postData = array(
            'username' => $this->SMS_USERNAME,
            'password' => $this->SMS_PASSWORD,
            'message' => $message,
            'sender' => $this->SMS_SENDER,
            'mobiles' => $phone_number,
            'response' => $this->RESPONSE_TYPE
        );

        $url = "https://portal.nigeriabulksms.com/api/";

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);
        dd($output);

        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);


        if ($isError) {
            return array('error' => 1, 'message' => $errorMessage);
        } else {
            return array('error' => 0);
        }
    }

    public function initiateSmsGuzzle($phone_number, $message)
    {
        $client = new Client();

        $response = $client->post('http://portal.bulksmsnigeria.net/api/?', [
            'verify'    =>  false,
            'form_params' => [
                'username' => $this->SMS_USERNAME,
                'password' => $this->SMS_PASSWORD,
                'message' => $message,
                'sender' => $this->SMS_SENDER,
                'mobiles' => $phone_number,
            ],
        ]);


        $response = json_decode($response->getBody(), true);
    }
}
