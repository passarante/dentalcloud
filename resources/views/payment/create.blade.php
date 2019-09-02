@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Yeni Ödeme Ekleme</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Ödemeler</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Ödeme Ekleme</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">

                <div class="card-body" id="bar-parent">
                    <form action="{{route('payment.store')}}" id="form_sample_1" method="POST"
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
                                    <input type="text" name="lastname" data-required="1" placeholder="Hasta Soyadı"
                                        id="patientLastName" class="form-control input-height" /> </div>
                            </div>
                            <div class="form-group row">
                                     <label class="control-label col-md-3">Tutar
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                            <input type="number" name="amount" data-required="1"
                                        id="patientLastName" class="form-control input-height" />
                                </div>
                         </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Ödeme Tarihi
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group date form_date " data-date="" data-date-format="yyyy/mm/dd"
                                        data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control input-height" size="16" placeholder="Ödeme Tarihi"
                                            id="conversationDate" type="text" value="" name="payment_date">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="dtp_input2" value="" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Ödeme Türü
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" name="payment_type">


                                        <option value="Nakit">Nakit</option>
                                        <option value="Kredi Kartı">Kredi Kartı</option>
                                        <option value="Kredi Kartı Taksit">Kredi Kartı Taksit</option>
                                        <option value="Elden Taksit">Elden Taksit</option>
                                        <option value="Sağlık Sigortası">Sağlık Sigortası</option>
                                        <option value="İndirim">İndirim</option>
                                        <option value="Fiyat Düzeltmesi">Fiyat Düzeltmesi</option>


                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="control-label col-md-3">Ödeme Notu
                                </label>
                                <div class="col-md-5">
                                    <textarea name="payment_note" class="form-control-textarea"
                                        placeholder="Ödeme Notu" rows="5"></textarea>
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


    $('#patients').change(function () {
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
