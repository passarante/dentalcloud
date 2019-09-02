@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Yeni SMS Gönderme</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Yeni SMS Gönderme</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">

                <div class="card-body" id="bar-parent">
                    <form action="{{route('sms.store')}}" id="form_sample_1" method="POST"
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

                            </div>

                            <div class="form-group row" id="div-name">
                                <label class="control-label col-md-3">İsim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="name" data-required="1" placeholder="Hasta Adı"
                                        id="patientName" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row" id="div-LastName">
                                <label class="control-label col-md-3">Soyisim
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="text" name="last_name" data-required="1" placeholder="Hasta Soyadı"
                                        id="patientLastName" class="form-control input-height" /> </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Message
                                </label>
                                <div class="col-md-5">
                                    <textarea name="message" class="form-control-textarea" id="messageBody"
                                        placeholder="Görüşme Notu" rows="5" maxlength="159"></textarea>
                                    <label for="" id="messageLabel">Kalan Karakter: <span
                                            id="characterAvaliable">159</span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="sendLater">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-5">
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="chkSendLater">
                                    <input type="checkbox" id="chkSendLater" class="mdl-checkbox__input" >
                                    <span class="mdl-checkbox__label">İleri Tarihli Gönderim</span>
                                </label>
                            </div>

                        </div>
                        <div class="form-group row" style="display: none;" id="sendDate">
                            <label class="control-label col-md-3">Gönderim Tarihi
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group date form_date " data-date="" data-date-format="yyyy/mm/dd"
                                    data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control input-height" size="16" placeholder="Gönderim Tarihi"
                                        id="conversationDate" type="text" value="" name="date">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input2" value="" />
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-info">Gönder</button>
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

@section('page-scripts')
<script src="{{asset('theme/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('theme/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js')}}"></script>
<script src="{{asset('theme/plugins/select2/js/select2.js')}}"></script>
<script src="{{asset('theme/js/pages/select2/select2-init.js')}}"></script>

<script>
    $(document).ready(function () {

        $('#div-name').hide();
        $('#div-LastName').hide();



    });

    $('#chkSendLater').change(function(){
        $('#sendDate').show();
        $('#sendLater').hide();
    })

    $("#messageBody").keyup(function () {
        $("#characterAvaliable").text("" + (159 - $(this).val().length));
    });

    $('#patients').on('change', function () {
        var id = $(this).val();
        var name = $(this).find(':selected').data('name');
        var lastName = $(this).find(':selected').data('lastname');
        var phone = $(this).find(':selected').data('phone');


        $('#patientName').val(name);
        $('#patientLastName').val(lastName);
        $('#phone').val(phone);

        $('#patientId').val(id);
    });

</script>
@endsection
