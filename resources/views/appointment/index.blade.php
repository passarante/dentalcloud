@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Tüm Randevular</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Randevu</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Tüm Randevular</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <div class="card-body ">
                    <div class="mdl-tabs mdl-js-tabs">
                        <div class="mdl-tabs__tab-bar tab-left-side">
                            <a href="#tab-calendar" class="mdl-tabs__tab is-active">Takvim Görünümü</a>
                            <a href="#tab-list" class="mdl-tabs__tab">Liste Görünümü</a>

                        </div>
                        <div class="mdl-tabs__panel is-active p-t-20" id="tab-calendar">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="card-box">
                                        <div class="card-body ">
                                            <div class="panel-body">
                                                {!! $calendar->calendar() !!}
                                                {!! $calendar->script() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mdl-tabs__panel p-t-20" id="tab-list">
                            <div class="table-scrollable">
                                <table id="tableExport"
                                    class="display table table-hover table-checkable order-column m-t-20"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> Tarih </th>
                                            <th> Hasta Adı Soyadı </th>
                                            <th> Randevu Saatleri </th>
                                            <th> Randevu Türü </th>
                                            <th> Hekim </th>
                                            <th> İşlemler </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $key => $appointment)
                                        <tr class="odd gradeX">
                                            <td class="patient-img">
                                                {{$key +1}}
                                            </td>
                                            <td>{{$appointment->appointment_date}}</td>
                                            <td><a href="mailto:shuxer@gmail.com">
                                                    {{$appointment->full_name}} </a></td>
                                            <td class="center">{{$appointment->appointment_hours}}</td>
                                            <td class="center">{{$appointment->appointment_type}}</td>
                                            <td class="center">{{$appointment->doctor->full_name}}</td>

                                            <td>
                                                <button class="btn btn-tbl-edit btn-xs"
                                                    onClick="updateAppointment({{$appointment->id}})">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-tbl-delete btn-xs"
                                                    onClick="deleteAppointment({{$appointment->id}})">
                                                    <i class="fa fa-trash-o "></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateAppointmentModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-b-green">
                    <h4 class="modal-title" id="modalHeader">Randevu Bilgileri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_sample_1" method="POST" class="form-horizontal">
                        @csrf

                        <div class="form-body">
                            <input type="hidden" id="patientId" name="patientId">


                            <div class="form-group row">
                                <label class="control-label col-md-4">İsim Soyisim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8" id="updatePatientFullName">

                                </div>

                            </div>
                            <div class="form-group row">

                                <label class="control-label col-md-4">Telefon
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8" id="updatePatientPhone">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Randevu Türü
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control input-height" name="appointment_type"
                                        id="appointmentType">
                                        <option value="Muayene">Muayene</option>
                                        <option value="Kontrol">Kontrol</option>
                                        <option value="Özel">Özel</option>
                                        <option value="Cerrahi">Cerrahi</option>
                                        <option value="Implant">Implant</option>
                                        <option value="Endodonti">Endodonti</option>
                                        <option value="Pedodonti">Pedodonti</option>
                                        <option value="Peridontoloji">Peridontoloji</option>
                                        <option value="Ortodonti">Ortodonti</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Hekim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control input-height" name="doctor_id" id="doctor">

                                        @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->last_name}}
                                        </option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Randevu Notu
                                </label>
                                <div class="col-md-8">
                                    <textarea name="appointment_note" class="form-control-textarea"
                                        placeholder="Randevu Notu" rows="5" id="updateAppointmentNote"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Durumu

                                </label>
                                <div class="col-md-8">

                                    <button type="button" class="btn btn-sm btn-secondary" id="btnCompletedFalse"
                                        onClick="setAppointmentCompleted(0)">Gelmedi</button>
                                    <button type="button" class="btn btn-sm btn-secondary" id="btnCompletedTrue"
                                        onClick="setAppointmentCompleted(1)">Geldi</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onClick="deleteAppointment()">Randevuyu Sil</button>
                    <button type="button" class="btn btn-primary" onClick="updateAppointmentDetails()">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-css')
<link href="{{asset('theme/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('page-scripts')
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='{{asset('theme/js/fullcalendar.js')}}'></script>
<link href="{{asset('theme/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function() {



$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
		        $('#tableExport').DataTable(
               {
                   pageLength: 5 ,
		            dom: 'Bfrtip',
		            buttons: [
		                'copyHtml5',
		                'excelHtml5',
		                'csvHtml5',
		                'pdfHtml5'
		            ]
		        });

            }

            );

function updateAppointment(id){
    $('#updateAppointmentModal').modal();

    $.get('/appointment/getAppointmentDetails/'+id,function(response){

if(response.completed==1){
    $('#btnCompletedTrue').removeClass('btn-secondary').addClass('btn-success');
    $('#btnCompletedFalse').removeClass('btn-danger').addClass('btn-secondary');
    $('#btnCompletedTrue').attr("disabled", true);
}else if(response.completed==0){
    $('#btnCompletedFalse').removeClass('btn-secondary').addClass('btn-danger');
    $('#btnCompletedTrue').removeClass('btn-success').addClass('btn-secondary');
    $('#btnCompletedFalse').attr("disabled", true);
}
        var patientFullName =response.name + ' ' + response.last_name;

        $('#patientId').val(response.id);
        $('#updatePatientFullName').text(patientFullName);
        $('#updatePatientPhone').text(response.phone);
        $('#updateAppointmentNote').text(response.appointment_note);

$('#appointmentType').val(response.appointment_type);
$('#doctor').val(response.doctor_id);

    })
}

function updateAppointmentDetails(){
    id =$('#patientId').val();

    var doctorId = $('#doctor').val();
    var appointmentType = $('#appointmentType').val();
    var appointmentNote = $('#updateAppointmentNote').val();
    $.post('/appointment/update/'+id,{ doctor_id:doctorId, appointment_type:appointmentType,appointment_note:appointmentNote }, function(response){
location.reload();
    });

}


function deleteAppointment(id){
iziToast.question({
timeout: 20000,
close: false,
overlay: true,
displayMode: 'once',
id: 'question',
zindex: 999999,
title: 'Dikkat',
message: 'Randevu bilgilerini silmek istediğinizden emin misiniz?',
position: 'center',
buttons: [
['<button><b>EVET</b></button>', function (instance, toast) {

    if(id==null){
id =$('#patientId').val();
    }

$.get('/appointment/delete/'+id, function(response){
   instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

location.reload();
})

}, true],
['<button>İPTAL</button>', function (instance, toast) {

instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

}],
],
onClosing: function(instance, toast, closedBy){
console.info('Closing | closedBy: ' + closedBy);
},
onClosed: function(instance, toast, closedBy){
console.info('Closed | closedBy: ' + closedBy);
}
});
}

function setAppointmentCompleted(status){
var id =$('#patientId').val();

if(status==1){

$.post('/appointment/update/'+id,{completed:1}, function(response){
$('#btnCompletedTrue').removeClass('btn-secondary').addClass('btn-success');
$('#btnCompletedFalse').removeClass('btn-danger').addClass('btn-secondary');
$('#btnCompletedTrue').attr("disabled", true);
$('#btnCompletedFalse').attr("disabled", false);
   iziToast.show({
title: 'Bilgi',
color:'green',
timeout: 1500,
message: response
});
})
}else{
$.post('/appointment/update/'+id,{completed:0}, function(response){
$('#btnCompletedFalse').removeClass('btn-secondary').addClass('btn-danger');
$('#btnCompletedTrue').removeClass('btn-success').addClass('btn-secondary');
$('#btnCompletedFalse').attr("disabled", true);
$('#btnCompletedTrue').attr("disabled", false);
iziToast.show({
title: 'Bilgi',
color:'green',
timeout: 1500,
message: response
});
})
}
}
</script>
@endsection
