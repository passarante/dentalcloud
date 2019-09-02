@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Yeni Randevu Ekleme</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Randevular</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Randevu Ekleme</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">

                <div class="card-body" id="bar-parent">
                    <form action="{{route('appointment.store')}}" id="form_sample_1" method="POST"
                        class="form-horizontal">
                        @csrf

                        <div class="form-body">
                            <input type="hidden" id="patientId" name="patientId">
                            <div class="form-group row " id="patientSelect">
                                <label class="control-label col-md-3">Kayıtlı Hastalar
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height  select2" name="patient-select"
                                        id="patients">
                                        <option value="">Hasta Seçin..</option>
                                        @foreach ($patients as $patient)
                                        <option value="{{$patient->id}}" data-name="{{$patient->name}}"
                                            {{ session()->get('patient_id')==$patient->id? 'selected' :''}}
                                            data-phone="{{$patient->phone}}" data-lastname="{{$patient->last_name}} ">
                                            {{$patient->name}} {{$patient->last_name}}
                                        </option>

                                        @endforeach

                                    </select>
                                </div>
                                <div id="div-newPatientButton">
                                    <button class="btn btn-sm btn-success" type="button" onclick="setNewPatient()">Yeni
                                        Hasta</button>
                                </div>
                                <div id="div-oldPatientButton" style="display: none;">
                                    <button class="btn btn-sm btn-success" type="button"
                                        onclick="setOldPatient()">Kayıtlı Hasta</button>
                                </div>
                            </div>

                            <div class="form-group row" id="div-name">
                                <label class="control-label col-md-3">İsim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="name" data-required="1" placeholder="Hasta Adı"
                                        id="patientName" class="form-control input-height" required /> </div>
                            </div>
                            <div class="form-group row" id="div-lastName">
                                <label class="control-label col-md-3">Soyisim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="lastname" data-required="1" placeholder="Hasta Soyadı"
                                        id="patientLastName" class="form-control input-height" required /> </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Randevu Tarihi
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="card-body ">

                                        <div class="row">
                                            <div class="col-md-12 p-t-20">
                                                <div class="form-control-wrapper">
                                                    <input type="text" id="date-start" name="beg"
                                                        class="floating-label mdl-textfield__input"
                                                        placeholder="Başlangıç Zamanı" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 p-t-20">
                                                <div class="form-control-wrapper">
                                                    <input type="text" id="date-end" name="end"
                                                        class="floating-label mdl-textfield__input" placeholder="Bitiş"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Randevu Türü
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" name="appointment_type">


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
                                <label class="control-label col-md-3">Telefon
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input name="phone" type="text" placeholder="Cep Telefonu" id="phone"
                                        class="form-control input-height" required /> </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Hekim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" name="doctor_id">

                                        @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->last_name}}
                                        </option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Randevu Notu
                                </label>
                                <div class="col-md-5">
                                    <textarea name="appointment_note" class="form-control-textarea"
                                        placeholder="Randevu Notu" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Renk
                                </label>
                                <div class="col-md-5">
                                   <input type="color" name="color" id="color">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-info">Ekle</button>
                                    <button type="button" id="h0800" class="btn btn-default">İptal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('page-css')
<link rel="stylesheet" href="../assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />
@endsection
@section('page-scripts')

<script src="{{asset('theme/plugins/select2/js/select2.js')}}"></script>
<script src="{{asset('theme/js/pages/select2/select2-init.js')}}"></script>

<script src="{{asset('theme/plugins/material/material.min.js')}}"></script>
<script src="{{asset('theme/plugins/material-datetimepicker/moment-with-locales.min.js')}}"></script>
<script src="{{asset('theme/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('theme/plugins/material-datetimepicker/datetimepicker.js')}}"></script>


<script>
    $(document).ready(function(){

        $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
        $('#div-oldPatientButton').hide();
    $('#div-name').hide();
    $('#div-lastName').hide();
 $('#patients').change(function(){
     var phoneNumber = $('#patients').find(':selected').attr('data-phone');
     var firstName = $('#patients').find(':selected').attr('data-name');
     var lastName = $('#patients').find(':selected').attr('data-lastname');

     $("#phone").val(phoneNumber);
var pId = $('#patients').find(':selected').val();
     $('#patientId').val(pId)
     $('#patientName').val(firstName);
     $('#patientLastName').val(lastName);
 });
  });

function setNewPatient(){
    $('#div-oldPatientButton').show();
    $('#div-newPatientButton').hide();
    $('#patientSelect').hide();
    $('#div-name').show();
    $('#div-lastName').show();
$('#patientId').val(999999999);
}
function setOldPatient(){
    $('#div-oldPatientButton').hide();
    $('#div-newPatientButton').show();

}

</script>
@endsection
