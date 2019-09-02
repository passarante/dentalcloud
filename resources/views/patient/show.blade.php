@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">{{$patient->name}} {{$patient->last_name}}</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Hastalar</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">{{$patient->name}} {{$patient->last_name}}</li>
                <input type="hidden" id="patientId" value="{{$patient->id}}" />
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class=" cardbox patient-profile">
                    @if (count($patient->photos )>0)
<img src="{{asset('uploads/patient_pics/'.$patient->photos[0]->path.'')}}" class="img-responsive" alt=""
    style="max-width:200px; margin:0 auto;">
                    @endif

                </div>
                <div class="cardbox">
                    <div class="header">
                        <h4 class="font-bold">{{$patient->name}} {{$patient->last_name}}</h4>
                    </div>
                    <div class="body">
                        <div class="user-btm-box">
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 b-r"><strong>TC Kimlik No</strong>
                                    <p>{{$patient->tck_no}}</p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12"><strong>Doğum Tarihi</strong>
                                    <p>{{$patient->dob}}</p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 b-r"><strong>GSM</strong>
                                    <p>{{$patient->phone}}</p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12"><strong>Referans</strong>
                                    <p>{{$patient->reference}}</p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-12"><strong>Adres</strong>
                                    <p>{{$patient->contact->address}} {{$patient->contact->town}}
                                        <br><strong>{{$patient->contact->state}} / {{$patient->contact->city}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="white-box">

                <div class="cardbox">
                    <div class="header">
                        <h4 class="font-bold">Diğer Bilgiler</h4>
                    </div>
                    <div class="body">
                        <div class="user-btm-box">
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 b-r"><strong>Şehir</strong>
                                    <p>{{$patient->contact->city}}</p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12"><strong>Meslek</strong>
                                    <p>{{$patient->profession}}</p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 b-r"><strong>GSM</strong>
                                    <p>{{$patient->phone}}</p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12"><strong>Referans</strong>
                                    <p>{{$patient->reference}}</p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-12"><strong>Adres</strong>
                                    <p>{{$patient->contact->address}} {{$patient->contact->town}}
                                        <br><strong>{{$patient->contact->state}} / {{$patient->contact->city}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 col-xs-12">
            <div class="row">


                <div class="cardbox">
                    <div class="body">

                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <div class="panel tab-border card-box">
                                    <header class="panel-heading panel-heading-gray custom-tab">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#treatments" class="active" data-toggle="tab"> <i
                                                        class="fa fa-home"></i>
                                                    Tedavi Bilgileri
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#diagnoses" data-toggle="tab">
                                                    <i class="fa fa-user"></i> Diagnoz Bilgileri
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#appointments" data-toggle="tab">
                                                    <i class="fa fa-envelope-o"></i> Randevu Bilgileri
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#payments" data-toggle="tab">
                                                    <i class="fa fa-money"></i> Ödeme Bilgileri
                                                </a>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="treatments">
                                                <div class="card card-box">
                                                    <div class="card-head">
                                                        <header>Hasta Tedavi Bilgileri</header>
                                                        <div class="tools">
                                                            <a class="fa fa-repeat btn-color box-refresh"
                                                                href="javascript:;"></a>
                                                            <a class="t-collapse btn-color fa fa-chevron-down"
                                                                href="javascript:;"></a>
                                                            <a class="t-close btn-color fa fa-times"
                                                                href="javascript:;"></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body ">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive">
                                                                <table class="table display product-overview mb-30"
                                                                    id="support_table">
                                                                    <thead>

                                                                        <tr>
                                                                            <th>Tedavi tarihi</th>
                                                                            <th>Tedavi Notu</th>
                                                                            <th>Tedavi Uygulanan Dişler</th>
                                                                            <th>Uygulanan Tedavi</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($patient->treatments as $treatment)
                                                                        <tr>
                                                                            <td>{{$treatment->treatment_date}}</td>
                                                                            <td>{{$treatment->treatment_note}}</td>
                                                                            <td class="center">
                                                                                {{$treatment->treatment_dents}}</td>
                                                                            <td>{{$treatment->applicated_treatment}}
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
                                            <div class="tab-pane " id="diagnoses">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card card-box">
                                                        <div class="card-head">
                                                            <header>Hasta Diagnoz Bilgileri</header>
                                                            <div class="tools">
                                                                <a class="fa fa-repeat btn-color box-refresh"
                                                                    href="javascript:;"></a>
                                                                <a class="t-collapse btn-color fa fa-chevron-down"
                                                                    href="javascript:;"></a>
                                                                <a class="t-close btn-color fa fa-times"
                                                                    href="javascript:;"></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body ">
                                                            <div class="table-wrap">
                                                                <div class="table-responsive">
                                                                    <table class="table display product-overview mb-30"
                                                                        id="support_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Tedavi tarihi</th>
                                                                                <th>Tedavi Notu</th>
                                                                                <th>Tedavi Uygulanan Dişler</th>
                                                                                <th>Uygulanan Tedavi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tbody>
                                                                            @foreach ($patient->diagnoses as $diagnose)
                                                                            <tr>
                                                                                <td>{{$diagnose->diagnose_date}}</td>
                                                                                <td>{{$diagnose->diagnose_note}}</td>
                                                                                <td class="center">
                                                                                    {{$diagnose->treatment_dents}}</td>
                                                                                <td>{{$diagnose->applicated_treatment}}
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach

                                                                        </tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane " id="appointments">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card card-box">
                                                        <div class="card-head">
                                                            <header>Hasta Randevu Bilgileri</header>
                                                            <div class="tools">
                                                                <a class="fa fa-repeat btn-color box-refresh"
                                                                    href="javascript:;"></a>
                                                                <a class="t-collapse btn-color fa fa-chevron-down"
                                                                    href="javascript:;"></a>
                                                                <a class="t-close btn-color fa fa-times"
                                                                    href="javascript:;"></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body ">
                                                            <div class="table-wrap">
                                                                <div class="table-responsive">
                                                                    <table class="table display product-overview mb-30"
                                                                        id="support_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Adı Soyadı</th>

                                                                                <th>Görüşme Notu</th>

                                                                                <th>Görüşme Tarihi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($patient->appointments as
                                                                            $appointment)
                                                                            <tr>
                                                                                <td>{{$appointment->name}}
                                                                                    {{$appointment->last_name}}</td>

                                                                                <td>{{$appointment->appointment_note}}
                                                                                </td>
                                                                                <td>{{$appointment->appointment_date}}
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
                                            <div class="tab-pane " id="payments">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card card-box">
                                                        <div class="card-head">
                                                            <header>Hasta Ödeme Bilgileri</header>
                                                            <div class="tools">
                                                                <a class="fa fa-repeat btn-color box-refresh"
                                                                    href="javascript:;"></a>
                                                                <a class="t-collapse btn-color fa fa-chevron-down"
                                                                    href="javascript:;"></a>
                                                                <a class="t-close btn-color fa fa-times"
                                                                    href="javascript:;"></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body ">
                                                            <div class="table-wrap">
                                                                <div class="table-responsive">
                                                                    <table class="table display product-overview mb-30"
                                                                        id="support_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Ödeme Miktarı</th>
                                                                                <th>Ödeme Tarihi</th>
                                                                                <th>Ödeme Tipi</th>
                                                                                <th>Hekim</th>
                                                                                <th>İşlem Notu</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($patient->payments as $payment)
                                                                            <tr>
                                                                                <td>{{$payment->amount}}</td>
                                                                                <td>{{$payment->payment_date}}</td>
                                                                                <td>{{$payment->payment_type}}</td>
                                                                                <td></td>
                                                                                <td>{{$payment->payment_note}}</td>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="white-box">

                    <div class="cardbox">
                        <div class="header">
                            <h4 class="font-bold">Hasta Resimleri</h4>
                        </div>
                        <div class="body">
                            <div class="user-btm-box">


                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    @foreach ($patient->photos as $photo)
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12 b-r">
                                        <a href="{{asset('uploads/patient_pics/'.$photo->path.'')}}"
                                            data-lightbox="{{$patient->fullName}}" data-title="{{$patient->fullName}}">
                                            <img src="{{asset('uploads/patient_pics/'.$photo->path.'')}}"
                                                class="img-responsive" alt="" style="max-width:200px">
                                        </a>

                                    </div>
                                    @endforeach

                                </div>
                                <!-- /.row -->
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="cardbox">
            <div class="header">
                <h4 class="font-bold">Ağız İçi</h4>
                <div class="pull-right">
                    <button class="btn btn-secondary" disabled onClick="setAdultTeeth()" id="btnAdultTeeth">Sürekli
                        Dişler</button>
                    <button class="btn btn-success" onClick="setChildTeeth()" id="btnChildTeeth">Süt Dişleri</button>
                </div>

            </div>
            <div class="body">
                <div class="tooth-container">
                    <div class="adult-teeth" id="adult-teeth">
                        <div class="a1">
                            <div data-num="11" style="left: 42%;" class="tooth upper 11">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/11/11.png')}}');"></div>
                                <span class="num">11</span>
                            </div>
                            <div data-num="12" style="left: 36%;" class="tooth upper 12">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/12/12.png')}}');"></div>
                                <span class="num">12</span>
                            </div>
                            <div data-num="13" style="left: 30%;" class="tooth upper 13">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/13/13.png')}}');"></div>
                                <span class="num">13</span>
                            </div>
                            <div data-num="14" style="left: 24%;" class="tooth upper 14">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/14/14.png')}}');"></div>
                                <span class="num">14</span>
                            </div>
                            <div data-num="15" style="left: 18%;" class="tooth upper 15">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/15/15.png')}}');"></div>
                                <span class="num">15</span>
                            </div>
                            <div data-num="16" style="left: 12%;" class="tooth upper 16">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/16/16.png')}}');"></div>
                                <span class="num">16</span>
                            </div>
                            <div data-num="17" style="left: 6%;" class="tooth upper 17">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/17/17.png')}}');"></div>
                                <span class="num">17</span>
                            </div>
                            <div data-num="18" style="left: 0%;" class="tooth upper 18">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/18/18.png')}}');"></div>
                                <span class="num">18</span>
                            </div>
                        </div>
                        <br>
                        <div class="a2">
                            <div data-num="21" style="right: 42%;" class="tooth upper 21">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/21/21.png')}}');"></div>
                                <span class="num">21</span>
                            </div>
                            <div data-num="22" style="right: 36%;" class="tooth upper 22">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/22/22.png')}}');"></div>
                                <span class="num">22</span>
                            </div>
                            <div data-num="23" style="right: 30%;" class="tooth upper 23">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/23/23.png')}}');"></div>
                                <span class="num">23</span>
                            </div>
                            <div data-num="24" style="right: 24%;" class="tooth upper 24">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/24/24.png')}}');"></div>
                                <span class="num">24</span>
                            </div>
                            <div data-num="25" style="right: 18%;" class="tooth upper 25">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/25/25.png')}}');"></div>
                                <span class="num">25</span>
                            </div>
                            <div data-num="26" style="right: 12%;" class="tooth upper 26">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/26/26.png')}}');"></div>
                                <span class="num">26</span>
                            </div>
                            <div data-num="27" style="right: 6%;" class="tooth upper 27">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/27/27.png')}}');"></div>
                                <span class="num">27</span>
                            </div>
                            <div data-num="28" style="right: 0%;" class="tooth upper 28">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/28/28.png')}}');"></div>
                                <span class="num">28</span>
                            </div>
                        </div>

                        <div class="a3">
                            <div data-num="31" style="right: 42%;" class="tooth lower 31">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/31/31.png')}}');"></div>
                                <span class="num">31</span>
                            </div>
                            <div data-num="32" style="right: 36%;" class="tooth lower 32">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/32/32.png')}}');"></div>
                                <span class="num">32</span>
                            </div>
                            <div data-num="33" style="right: 30%;" class="tooth lower 33">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/33/33.png')}}');"></div>
                                <span class="num">33</span>
                            </div>
                            <div data-num="34" style="right: 24%;" class="tooth lower 34">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/34/34.png')}}');"></div>
                                <span class="num">34</span>
                            </div>
                            <div data-num="35" style="right: 18%;" class="tooth lower 35">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/35/35.png')}}');"></div>
                                <span class="num">35</span>
                            </div>
                            <div data-num="36" style="right: 12%;" class="tooth lower 36">

                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/36/36.png')}}');"></div>
                                <span class="num">36</span>
                            </div>
                            <div data-num="37" style="right: 6%;" class="tooth lower 37">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/37/37.png')}}');"></div>
                                <span class="num">37</span>
                            </div>
                            <div data-num="38" style="right: 0%;" class="tooth lower 38">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/38/38.png')}}');"></div>
                                <span class="num">38</span>
                            </div>
                        </div>
                        <br>
                        <div class="a4">
                            <div data-num="41" style="left: 42%;" class="tooth lower 41">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/41/41.png')}}');"></div>
                                <span class="num">41</span>
                            </div>
                            <div data-num="42" style="left: 36%;" class="tooth lower 42">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/42/42.png')}}');"></div>
                                <span class="num">42</span>
                            </div>
                            <div data-num="43" style="left: 30%;" class="tooth lower 43">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/43/43.png')}}');"></div>
                                <span class="num">43</span>
                            </div>
                            <div data-num="44" style="left: 24%;" class="tooth lower 44">

                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/44/44.png')}}');"></div>
                                <span class="num">44</span>
                            </div>
                            <div data-num="45" style="left: 18%;" class="tooth lower 45">
                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/45/45.png')}}');"></div>
                                <span class="num">45</span>
                            </div>
                            <div data-num="46" style="left: 12%;" class="tooth lower 46">

                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/46/46.png')}}');"></div>
                                <span class="num">46</span>
                            </div>
                            <div data-num="47" style="left: 6%;" class="tooth lower 47">

                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/47/47.png')}}');"></div>
                                <span class="num">47</span>
                            </div>
                            <div data-num="48" style="left: 0%;" class="tooth lower 48">

                                <a class="detail" href="#"></a>
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/48/48.png')}}');"></div>
                                <span class="num">48</span>
                            </div>
                        </div>
                    </div>




                    <div id="child-teeth" class="teeth-type active" style="">
                        <div class="a5">
                            <div data-num="51" style="left: 42%;" class="tooth upper 51">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/51/51.png')}}');"></div>
                                <span class="num">51</span>
                            </div>
                            <div data-num="52" style="left: 36%;" class="tooth upper 52">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/52/52.png')}}');"></div>
                                <span class="num">52</span>
                            </div>
                            <div data-num="53" style="left: 30%;" class="tooth upper 53">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/53/53.png')}}');"></div>
                                <span class="num">53</span>
                            </div>
                            <div data-num="54" style="left: 24%;" class="tooth upper 54">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/54/54.png')}}');"></div>
                                <span class="num">54</span>
                            </div>
                            <div data-num="55" style="left: 18%;" class="tooth upper 55">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/55/55.png')}}');"></div>
                                <span class="num">55</span>
                            </div>
                        </div>
                        <div class="a6">
                            <div data-num="61" style="right: 42%;" class="tooth upper 61">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/61/61.png')}}');"></div>
                                <span class="num">61</span>
                            </div>
                            <div data-num="62" style="right: 36%;" class="tooth upper 62">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/62/62.png')}}');"></div>
                                <span class="num">62</span>
                            </div>
                            <div data-num="63" style="right: 30%;" class="tooth upper 63">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/63/63.png')}}');"></div>
                                <span class="num">63</span>
                            </div>
                            <div data-num="64" style="right: 24%;" class="tooth upper 64">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/64/64.png')}}');"></div>
                                <span class="num">64</span>
                            </div>
                            <div data-num="65" style="right: 18%;" class="tooth upper 65">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/65/65.png')}}');"></div>
                                <span class="num">65</span>
                            </div>
                        </div>
                        <div class="a7">
                            <div data-num="71" style="right: 42%;" class="tooth lower 71">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/71/71.png')}}');"></div>
                                <span class="num">71</span>
                            </div>
                            <div data-num="72" style="right: 36%;" class="tooth lower 72">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/72/72.png')}}');"></div>
                                <span class="num">72</span>
                            </div>
                            <div data-num="73" style="right: 30%;" class="tooth lower 73">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/73/73.png')}}');"></div>
                                <span class="num">73</span>
                            </div>
                            <div data-num="74" style="right: 24%;" class="tooth lower 74">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/74/74.png')}}');"></div>
                                <span class="num">74</span>
                            </div>
                            <div data-num="75" style="right: 18%;" class="tooth lower 75">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/75/75.png')}}');"></div>
                                <span class="num">75</span>
                            </div>
                        </div>
                        <div class="a8">
                            <div data-num="81" style="left: 42%;" class="tooth lower 81">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/81/81.png')}}');"></div>
                                <span class="num">81</span>
                            </div>
                            <div data-num="82" style="left: 36%;" class="tooth lower 82">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/82/82.png')}}');"></div>
                                <span class="num">82</span>
                            </div>
                            <div data-num="83" style="left: 30%;" class="tooth lower 83">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/83/83.png')}}');"></div>
                                <span class="num">83</span>
                            </div>
                            <div data-num="84" style="left: 24%;" class="tooth lower 84">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/84/84.png')}}');"></div>
                                <span class="num">84</span>
                            </div>
                            <div data-num="85" style="left: 18%;" class="tooth lower 85">
                                <div class="img" onClick="goToTreatmentPage()"
                                    style="background-image:url('{{asset('theme/images/tooth/85/85.png')}}');"></div>
                                <span class="num">85</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('page-scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css"
    integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"
    integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function () {
        $('#child-teeth').hide();

        var id = $('#patientId').val();

        getTreatmentPhoto(id);
    });

    function goToTreatmentPage() {
        iziToast.show({
            theme: 'dark',
            icon: 'icon-person',
            title: 'Dikkat',
            message: 'Tedavi sayfasını gitmek istiyor musunuz?',
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
                ['<button>Tamam</button>', function (instance, toast) {
                    var id = $('#patientId').val();
                    location.replace('/patient/treatments/' + id)
                }, true], // true to focus
                ['<button>İptal</button>', function (instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp',
                        onClosing: function (instance, toast, closedBy) {
                            console.info('closedBy: ' +
                            closedBy); // The return will be: 'closedBy: buttonName'
                        }
                    }, toast, 'buttonName');
                }]
            ],
            onOpening: function (instance, toast) {
                console.info('callback abriu!');
            },
            onClosing: function (instance, toast, closedBy) {
                console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
            }
        });
    }

    function setChildTeeth() {
        $('.adult-teeth').hide();
        $('#child-teeth').show();
        $('#btnAdultTeeth').attr('disabled', false).removeClass('btn-secondary').addClass('btn-success');
        $('#btnChildTeeth').attr('disabled', true);
        $('#btnChildTeeth').removeClass('btn-success').addClass('btn-secondary');
    }

    function setAdultTeeth() {
        $('#child-teeth').hide();
        $('.adult-teeth').show();
        $('#btnAdultTeeth').attr('disabled', true).removeClass('btn-success').addClass('btn-secondary');
        $('#btnChildTeeth').attr('disabled', false);
        $('#btnChildTeeth').removeClass('btn-secondary').addClass('btn-success');
    }

    function getTreatmentPhoto(id) {
    $.get('/patient/diagnoses/' + id, function (response) {
    response.diagnoses.forEach(el => {

    $.get('/diagnose/getPhoto/' + el.applicated_treatment, function (res) {
    if (res.photo != null) {
    if(res.photo==256 || res.photo==123){
    $('[data-num="' + el.treatment_dents + '"] .img').css('display','none');
    }
    $('[data-num="' + el.treatment_dents + '"]').append(`<div class="treat-img ${res.photo} fixed"
        style="display: block; background-image: url('https://app.dentalbulut.com/img/tooth/${el.treatment_dents}/${el.treatment_dents}-${res.photo}.png');">
    </div>`)


    }
    })
    })
    })


    $.get('/patient/treatmentsData/' + id, function (response) {

    response.treatments.forEach(el => {

    $.get('/diagnose/getPhoto/' + el.applicated_treatment, function (res) {
    if (res.photo != null) {
    if(res.photo==256 || res.photo==123){
    $('[data-num="' + el.treatment_dents + '"] .img').css('display','none');
    }
    $('[data-num="' + el.treatment_dents + '"]').append(`<div class="treat-img ${res.photo} fixed"
        style="display: block; background-image: url('https://app.dentalbulut.com/img/tooth/${el.treatment_dents}/${el.treatment_dents}-${res.photo}.png');">
    </div>`)


    }
    })
    })
    })
    }

</script>
@endsection
