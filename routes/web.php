<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/patient-group/add', 'PatientGroupController@create')->name('patient-group.create');
Route::post('/patient-group/store', 'PatientGroupController@store')->name('patient-group.store');
Route::get('/patient-group/check-name', 'PatientGroupController@checkGroupName');
Route::post('/patient-group/delete-group/{id}', 'PatientGroupController@deleteGroupName');
Route::get('/patient-group/parientgroup-detail/{id}', 'PatientGroupController@getPatientGroup');
Route::post('/patient-group/update', 'PatientGroupController@updatePatientGroup');
Route::get('patient-group/getPatientGroupDataTable', 'PatientGroupController@getPatientGroupDataTable')->name('patient-group.getPatientGroupDataTable');


Route::get('/treatment', 'TreatmentController@index')->name('treatment.index');
Route::post('/treatment-branch/add', 'TreatmentController@createBranch')->name('treatment.createBranch');
Route::post('/treatment/add', 'TreatmentController@createTreatment')->name('treatment.createTreatment');
Route::post('/treatment/delete/{id}', 'TreatmentController@deleteTreatment');
Route::post('/treatment/update', 'TreatmentController@updateTreatment');
Route::get('/treatment/getTreatments/{branchId}', 'TreatmentController@getTreatments');


Route::get('/patient/diagnoses/{patientId}', 'PatientTreatmentController@getDiagnosesData');
Route::get('/patient/treatmentsData/{patientId}', 'PatientTreatmentController@getTreatmentsData');
Route::get('/diagnose/getPhoto/{diagnoseName}', 'PatientDiagnoseController@getDiagnosePhoto');
Route::get('/patient/diagnose/delete/{id}', 'PatientDiagnoseController@deleteDiagnose');
Route::post('/patient/treatment/addTreatment', 'PatientTreatmentController@addTreatment');
Route::post('/patient/treatment/addPTreatment', 'PatientTreatmentController@addPTreatment');
Route::post('/patient/diagnose/addTreatment', 'PatientDiagnoseController@addTreatment');

Route::get('/patient', 'PatientController@index')->name('patient.index');
Route::get('/patient/create', 'PatientController@create')->name('patient.create');
Route::post('/patient/store', 'PatientController@store')->name('patient.store');
Route::post('patient/photo/store', 'PatientController@photoStore')->name('patient.photo.store');
Route::post('patient/photo/delete', 'PatientController@photoDestroy');
Route::get('patient/show/{id}', 'PatientController@show');
Route::get('patient/getPatientDataTable', 'PatientController@getPatientDataTable')->name('patient.getPatientDataTable');
Route::get('patient/select-patient/{id}', 'PatientController@selectPatient');
Route::get('patient/treatments/{patientId}', 'PatientTreatmentController@index')->name('patient.treatments');
Route::get('patient/ptreatments/{patientId}', 'PatientTreatmentController@pindex')->name('patient.ptreatments');
Route::get('patient/diagnose/{patientId}', 'PatientDiagnoseController@index')->name('patient.diagnoses.index');


Route::get('doctor/index', 'DoctorController@index')->name('doctor.index');
Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');
Route::post('/doctor/store', 'DoctorController@store')->name('doctor.store');
Route::get('/doctor/index-ajax', 'DoctorController@indexAjax')->name('doctor.index.ajax');
Route::get('/doctor/detail/{id}', 'DoctorController@getDoctorDetail');
Route::post('/doctor/update', 'DoctorController@updateDoctor');
Route::post('/doctor/delete/{id}', 'DoctorController@deleteDoctor');


Route::get('appointment/index', 'AppointmentController@index')->name('appointment.index');
Route::get('appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('appointment/store', 'AppointmentController@store')->name('appointment.store');
Route::post('appointment/update/{id}', 'AppointmentController@update')->name('appointment.update');
Route::get('appointment/delete/{id}', 'AppointmentController@destroy')->name('appointment.delete');
Route::get('appointment/getAppointmentDetails/{id}', 'AppointmentController@getAppointmentDetails')->name('appointment.getAppointmentDetails');


Route::get('conversation/index', 'ConversationController@index')->name('conversation.index');
Route::get('conversation/create', 'ConversationController@create')->name('conversation.create');
Route::post('conversation/store', 'ConversationController@store')->name('conversation.store');

Route::get('payment/index', 'PaymentController@index')->name('payment.index');
Route::get('payment/create', 'PaymentController@create')->name('payment.create');
Route::post('payment/store', 'PaymentController@store')->name('payment.store');


Route::get('/sms/send' , 'SmsController@index')->name('sms.index');
Route::get('/sms/create' , 'SmsController@create')->name('sms.create');
Route::post('/sms/store' , 'SmsController@store')->name('sms.store');
Route::post('/send-sms', [
    'uses'   =>  'SmsController@getUserNumber',
    'as'     =>  'sendSms'
]);
