@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title"><span class="text-danger">{{$patient->fullName}}</span> - DİAGNOZ EKLEME</div>
                <input type="hidden" value="{{$patient->id}}" id="patientId">
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Hastalar</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                @if (Session::get('patient_full_name'))
                <li><a class="parent-item" href="">Hasta Listesi</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                <li class="active text-bold text-success" id="patientName">{{$patient->fullName}}</li>
                @else
                <li class="active">Hasta Listesi</li>
                @endif

            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card card-box">
                <div class="card-head bg-b-green" id="treatmentBranches">
                    <header>Tedaviler</header>
                    <br>
                    @foreach ($branches as $branch)
                    <button class="btn btn-sm btn-secondary" id="btn-{{$branch->id}}"
                        onClick="getTreatments({{$branch->id}})">{{$branch->branch_name}}</button>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="col-md-7" id="treatmentsPanel">
            <div class="card card-box">
                <div class="card-head bg-b-orange">
                    <header id="treatmentName"></header>
                </div>
                <div class="card-body">

                    <div class="card-body " id="bar-parent10">

                        <div class="form-group row">
                            <label class="col-lg-3 col-md-3 control-label">Tedavi Seçimi
                            </label>
                            <div class="col-lg-9 col-md-9">
                                <select class="form-control  select2" id="treatmentSelect">



                                </select>
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
                <div class="pull-right">
                    <button class="btn btn-secondary" disabled onClick="setAdultTeeth()" id="btnAdultTeeth">Sürekli
                        Dişler</button>
                    <button class="btn btn-success" onClick="setChildTeeth()" id="btnChildTeeth">Süt Dişleri</button>
                </div>
            </div>
            <div class="card-body">
                <div id="teethCont" class="block-border grid_12">
                    <div class="block-header">
                        <div class="grid_6" style="margin-top:3px">
                            <div id="multi-teeth-cont" style="display:none;">
                                <a style="" data-target="upper" href="" class="btn choose-teeth">Üst Çeneyi Seç</a>
                                <a style="" data-target="lower" href="" class="btn choose-teeth">Alt Çeneyi Seç</a>
                                <a id="complete-tooth" class="button" href="javascript:void(0);">Tamamla</a>
                            </div>
                        </div>
                        <div class="grid_6" style="margin-top:3px;float:right">
                            <a data-show="child-teeth" data-hide="adult-teeth" href="" class="btn choose-teeth-type">Süt
                                Dişleri</a>
                            <a data-show="adult-teeth" data-hide="child-teeth" href=""
                                class="btn choose-teeth-type active">Sürekli
                                Dişler</a>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="teethContInner">
                            <div class="overlay">
                                <div id="toothCont" class="tooth-container">
                                    <div id="adult-teeth" class=" adult-teeth teeth-type active">
                                        <div class="a1">
                                            <div data-num="11" style="left: 42%;" class="tooth upper 11"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/11/11.png')}}');">
                                                </div>
                                                <span class="num">11</span>
                                            </div>
                                            <div data-num="12" style="left: 36%;" class="tooth upper 12"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/12/12.png')}}');">
                                                </div>
                                                <span class="num">12</span>
                                            </div>
                                            <div data-num="13" style="left: 30%;" class="tooth upper 13"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/13/13.png')}}');">
                                                </div>
                                                <span class="num">13</span>
                                            </div>
                                            <div data-num="14" style="left: 24%;" class="tooth upper 14"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/14/14.png')}}');">
                                                </div>
                                                <span class="num">14</span>
                                            </div>
                                            <div data-num="15" style="left: 18%;" class="tooth upper 15"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/15/15.png')}}');">
                                                </div>
                                                <span class="num">15</span>
                                            </div>
                                            <div data-num="16" style="left: 12%;" class="tooth upper 16"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/16/16.png')}}');">
                                                </div>
                                                <span class="num">16</span>
                                            </div>
                                            <div data-num="17" style="left: 6%;" class="tooth upper 17"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/17/17.png')}}');">
                                                </div>
                                                <span class="num">17</span>
                                            </div>
                                            <div data-num="18" style="left: 0%;" class="tooth upper 18"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/18/18.png')}}');">
                                                </div>
                                                <span class="num">18</span>
                                            </div>
                                        </div>
                                        <div class="a2">
                                            <div data-num="21" style="right: 42%;" class="tooth upper 21"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/21/21.png')}}');">
                                                </div>
                                                <span class="num">21</span>
                                            </div>
                                            <div data-num="22" style="right: 36%;" class="tooth upper 22"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/22/22.png')}}');">
                                                </div>
                                                <span class="num">22</span>
                                            </div>
                                            <div data-num="23" style="right: 30%;" class="tooth upper 23"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/23/23.png')}}');">
                                                </div>
                                                <span class="num">23</span>
                                            </div>
                                            <div data-num="24" style="right: 24%;" class="tooth upper 24"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/24/24.png')}}');">
                                                </div>
                                                <span class="num">24</span>
                                            </div>
                                            <div data-num="25" style="right: 18%;" class="tooth upper 25"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/25/25.png')}}');">
                                                </div>
                                                <span class="num">25</span>
                                            </div>
                                            <div data-num="26" style="right: 12%;" class="tooth upper 26"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/26/26.png')}}');">
                                                </div>
                                                <span class="num">26</span>
                                            </div>
                                            <div data-num="27" style="right: 6%;" class="tooth upper 27"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/27/27.png')}}');">
                                                </div>
                                                <span class="num">27</span>
                                            </div>
                                            <div data-num="28" style="right: 0%;" class="tooth upper 28"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/28/28.png')}}');">
                                                </div>
                                                <span class="num">28</span>
                                            </div>
                                        </div>
                                        <div class="a3">
                                            <div data-num="31" style="right: 42%;" class="tooth lower 31"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/31/31.png')}}');">
                                                </div>
                                                <span class="num">31</span>
                                            </div>
                                            <div data-num="32" style="right: 36%;" class="tooth lower 32"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/32/32.png')}}');">
                                                </div>
                                                <span class="num">32</span>
                                            </div>
                                            <div data-num="33" style="right: 30%;" class="tooth lower 33"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/33/33.png')}}');">
                                                </div>
                                                <span class="num">33</span>
                                            </div>
                                            <div data-num="34" style="right: 24%;" class="tooth lower 34"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/34/34.png')}}');">
                                                </div>
                                                <span class="num">34</span>
                                            </div>
                                            <div data-num="35" style="right: 18%;" class="tooth lower 35"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/35/35.png')}}');">
                                                </div>
                                                <span class="num">35</span>
                                            </div>
                                            <div data-num="36" style="right: 12%;" class="tooth lower 36"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image: url('{{asset('theme/images/tooth/36/36.png')}}'); ">
                                                </div>
                                                <span class="num">36</span>

                                            </div>
                                            <div data-num="37" style="right: 6%;" class="tooth lower 37"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/37/37.png')}}');">
                                                </div>
                                                <span class="num">37</span>
                                            </div>
                                            <div data-num="38" style="right: 0%;" class="tooth lower 38"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/38/38.png')}}');">
                                                </div>
                                                <span class="num">38</span>
                                            </div>
                                        </div>
                                        <div class="a4">
                                            <div data-num="41" style="left: 42%;" class="tooth lower 41"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/41/41.png')}}');">
                                                </div>
                                                <span class="num">41</span>
                                            </div>
                                            <div data-num="42" style="left: 36%;" class="tooth lower 42"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/42/42.png')}}');">
                                                </div>
                                                <span class="num">42</span>
                                            </div>
                                            <div data-num="43" style="left: 30%;" class="tooth lower 43"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/43/43.png')}}');">
                                                </div>
                                                <span class="num">43</span>
                                            </div>
                                            <div data-num="44" style="left: 24%;" class="tooth lower 44"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/44/44.png')}}');">
                                                </div>
                                                <span class="num">44</span>

                                            </div>
                                            <div data-num="45" style="left: 18%;" class="tooth lower 45"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image:url('{{asset('theme/images/tooth/45/45.png')}}');">
                                                </div>
                                                <span class="num">45</span>
                                            </div>
                                            <div data-num="46" style="left: 12%;" class="tooth lower 46"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image: url('{{asset('theme/images/tooth/46/46.png')}}'); ">
                                                </div>
                                                <span class="num">46</span>

                                            </div>
                                            <div data-num="47" style="left: 6%;" class="tooth lower 47"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image: url('{{asset('theme/images/tooth/47/47.png')}}'); ">
                                                </div>
                                                <span class="num">47</span>

                                            </div>
                                            <div data-num="48" style="left: 0%;" class="tooth lower 48"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <a class="detail" href="#"></a>
                                                <div class="img"
                                                    style="background-image: url('{{asset('theme/images/tooth/48/48.png')}}'); ">
                                                </div>
                                                <span class="num">48</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="child-teeth" class="teeth-type" style="display:none;">
                                        <div class="a5">
                                            <div data-num="51" style="left: 42%;" class="tooth upper 51"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/51/51.png')}}');">
                                                </div>
                                                <span class="num">51</span>
                                            </div>
                                            <div data-num="52" style="left: 36%;" class="tooth upper 52"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/52/52.png')}}');">
                                                </div>
                                                <span class="num">52</span>
                                            </div>
                                            <div data-num="53" style="left: 30%;" class="tooth upper 53"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/53/53.png')}}');">
                                                </div>
                                                <span class="num">53</span>
                                            </div>
                                            <div data-num="54" style="left: 24%;" class="tooth upper 54"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/54/54.png')}}');">
                                                </div>
                                                <span class="num">54</span>
                                            </div>
                                            <div data-num="55" style="left: 18%;" class="tooth upper 55"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/55/55.png')}}');">
                                                </div>
                                                <span class="num">55</span>
                                            </div>
                                        </div>
                                        <div class="a6">
                                            <div data-num="61" style="right: 42%;" class="tooth upper 61"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/61/61.png')}}');">
                                                </div>
                                                <span class="num">61</span>
                                            </div>
                                            <div data-num="62" style="right: 36%;" class="tooth upper 62"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/62/62.png')}}');">
                                                </div>
                                                <span class="num">62</span>
                                            </div>
                                            <div data-num="63" style="right: 30%;" class="tooth upper 63"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/63/63.png')}}');">
                                                </div>
                                                <span class="num">63</span>
                                            </div>
                                            <div data-num="64" style="right: 24%;" class="tooth upper 64"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/64/64.png')}}');">
                                                </div>
                                                <span class="num">64</span>
                                            </div>
                                            <div data-num="65" style="right: 18%;" class="tooth upper 65"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/65/65.png')}}');">
                                                </div>
                                                <span class="num">65</span>
                                            </div>
                                        </div>
                                        <div class="a7">
                                            <div data-num="71" style="right: 42%;" class="tooth lower 71"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/71/71.png')}}');">
                                                </div>
                                                <span class="num">71</span>
                                            </div>
                                            <div data-num="72" style="right: 36%;" class="tooth lower 72"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/72/72.png')}}');">
                                                </div>
                                                <span class="num">72</span>
                                            </div>
                                            <div data-num="73" style="right: 30%;" class="tooth lower 73"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/73/73.png')}}');">
                                                </div>
                                                <span class="num">73</span>
                                            </div>
                                            <div data-num="74" style="right: 24%;" class="tooth lower 74"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/74/74.png')}}');">
                                                </div>
                                                <span class="num">74</span>
                                            </div>
                                            <div data-num="75" style="right: 18%;" class="tooth lower 75"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/75/75.png')}}');">
                                                </div>
                                                <span class="num">75</span>
                                            </div>
                                        </div>
                                        <div class="a8">
                                            <div data-num="81" style="left: 42%;" class="tooth lower 81"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/81/81.png')}}');">
                                                </div>
                                                <span class="num">81</span>
                                            </div>
                                            <div data-num="82" style="left: 36%;" class="tooth lower 82"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/82/82.png')}}');">
                                                </div>
                                                <span class="num">82</span>
                                            </div>
                                            <div data-num="83" style="left: 30%;" class="tooth lower 83"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/83/83.png')}}');">
                                                </div>
                                                <span class="num">83</span>
                                            </div>
                                            <div data-num="84" style="left: 24%;" class="tooth lower 84"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/84/84.png')}}');">
                                                </div>
                                                <span class="num">84</span>
                                            </div>
                                            <div data-num="85" style="left: 18%;" class="tooth lower 85"
                                                onClick="applyTreatment($(this).attr('data-num'))">
                                                <div class="img"
                                                    style="background-image:url('{{asset('/theme/images/tooth/85/85.png')}}');">
                                                </div>
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

    </div>

    <div class="row" id="selectedTreatments">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Seçilen Tedaviler </header>

                </div>
                <div class="card-body  ">
                    <table id="selectedTreatmentsTable" class="display table table-striped table-hover table-bordered "
                        style="width:100%;">
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Tedavi Notu</th>
                                <th>Diş Numarası</th>
                                <th>Tedavi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="selectedTreatmentsTableBody">

                        </tbody>
                    </table>

                    <div class="pull-right"><button class="btn btn-success"
                            onClick="saveSelectedTreatments()">Kaydet</button></div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Diagnoz</header>

            </div>
            <div class="card-body ">
                @if (count($patient->diagnoses)>0)
                <table id="patientDiagnoseListTable" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Tarih</th>

                            <th>Diagnoz Notu</th>
                            <th>Diş Numarası</th>
                            <th>Diagnoz</th>
                            <th>işlemler</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient->diagnoses as $diagnose)
                        <tr>
                            <td>{{$diagnose->diagnose_date}}</td>
                            <td>{{$diagnose->diagnose_note}}</td>
                            <td>{{$diagnose->treatment_dents}}</td>
                            <td>{{$diagnose->applicated_treatment}}</td>
                            <td><button class="btn btn-danger" onClick="deleteDiagnose({{$diagnose->id}})">Sil</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div>
                    <p>{{$patient->fullName}} için henüz bir diagnoz bilgisi eklenmemiş.

                    </p>
                </div>

                @endif

            </div>
        </div>
    </div>
</div>




    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Planlanan Tedaviler </header>

                </div>
                <div class="card-body">

                    @if (count($patient->ptreatments)>0)
                    <table id="patientTreatmentListTable" class="display " style="width:100%;">
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Tedavi Notu</th>
                                <th>Diş Numarası</th>
                                <th>Tedavi</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($patient->treatments as $treatment)
                            <tr>
                                <td>{{$treatment->treatment_date}}</td>
                                <td>{{$treatment->treatment_note}}</td>
                                <td>{{$treatment->treatment_dents}}</td>
                                <td>{{$treatment->applicated_treatment}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>{{$patient->fullName}} için planlanmış tedavi bulunmamaktadır.
                        <span class="pull-right">
                            Yeni Planlanmış Tedavi bilgisi eklemek için <button class="btn btn-success">tıklayın
                            </button>
                        </span>

                    </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Uygulanmış Tedaviler </header>

                </div>
                <div class="card-body">
                    @if (count($patient->treatments)>0)
                    <table id="patientTreatmentListTable" class="display " style="width:100%;">
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Tedavi Notu</th>
                                <th>Diş Numarası</th>
                                <th>Tedavi</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patient->treatments as $treatment)
                            <tr>
                                <td>{{$treatment->treatment_date}}</td>
                                <td>{{$treatment->treatment_note}}</td>
                                <td>{{$treatment->treatment_dents}}</td>
                                <td>{{$treatment->applicated_treatment}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>{{$patient->fullName}} için henüz bir tedavi eklenmemiş</p>
                    @endif

                </div>
            </div>
        </div>
    </div>


</div>
@endsection


@section('page-scripts')
<!--select2-->
<link href="{{asset('theme/plugins/select2/css/select2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('theme/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<!--select2-->
<script src="{{asset('theme/plugins/select2/js/select2.js')}}"></script>
<script src="{{asset('theme/js/pages/select2/select2-init.js')}}"></script>
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}})

        $('#treatmentsPanel').hide()
        $('#selectedTreatments').hide()
$('#child-teeth').hide();
        $('#patientTreatmentListTable').DataTable({
            "lengthChange": false,
            "searching": false
        })
        $('#patientDiagnoseListTable').DataTable({
            "lengthChange": false,
            "pageLength": 5,
            "searching": false
        });

        var id =$('#patientId').val();

        getTreatmentPhoto(id);

    })

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
if(res.photo==256 || res.photo==123 ||res.photo ==121){
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

    function getTreatments(id) {

        var treatmentName = $('#btn-' + id).text();
        $('#treatmentName').text(treatmentName);

        $('#treatmentBranches .btn-danger').each(function () {
            $(this).removeClass('btn-danger').attr('disabled', false)
        })


        $('#btn-' + id).attr('disabled', true).addClass('btn-danger')
        $.get('/treatment/getTreatments/' + id, function (response) {

            var list = ` <select class="form-control  select2" id="treatmentSelect">`
            response.forEach(el => {
                list += `<option value="${el.id}" data-price="${el.price}" data-photo-id="${el.photo}">${el.treatment_name}</option>`
            })
            list += ' </select>'

            $('#treatmentSelect').html(list);
        })
        $('#treatmentsPanel').show()
    }

function applyTreatment(teethNr){

    var treatment = $('#treatmentSelect option:selected').text();

    if(treatment==''){
        iziToast.error({
        title: 'Hata',
        message: 'Lütfen uygulanacak tedaviyi seçin',
        });
    }else{
        $('#selectedTreatments').show()
    var price = $('#treatmentSelect option:selected').attr('data-price');
    var photoId = $('#treatmentSelect option:selected').attr('data-photo-id');
    var date= moment().format('D-MM-YYYY');
    var rowNumber = $('#selectedTreatmentsTable tr').length;


    var trHtml = `<tr id="row-${rowNumber}">
        <td>${date}</td>
        <td><input type="text" name="treatment_note" class="form-control" /></td>
        <td class="text-center">${teethNr}</td>
        <td>${treatment}</td>
        <td><button class="btn btn-sm btn-danger" onClick="removeTreatment(${rowNumber},${teethNr},${photoId})">Sil</button></td>
    </tr>`;

    $('#selectedTreatmentsTableBody').append(trHtml);


$.get('/diagnose/getPhoto/' + treatment, function (res) {
    if (res.photo != null) {
    if(res.photo==256 || res.photo==123 || res.photo==121){
    $('[data-num="' +teethNr + '"] .img').css('display','none');
    }
    $('[data-num="' +teethNr + '"]').append(`<div class="treat-img ${res.photo} fixed"
        style="display: block; background-image: url('https://app.dentalbulut.com/img/tooth/${teethNr}/${teethNr}-${res.photo}.png');">
    </div>`)


    }
    })

    }

}

function removeTreatment(id, teethNr,photoId){
    $('#row-'+id).remove();
    if(photoId==256 || photoId==123 || photoId==121){
    $('[data-num="' +teethNr + '"] .img').css('display','block');
    }

    $('.treat-img.'+photoId +'.fixed').remove();
    var rowNumber = $('#selectedTreatmentsTable tr').length;

    if(rowNumber-1==0){
        $('#selectedTreatments').hide()
    }
}


function saveSelectedTreatments(){
var patientId=$('#patientId').val();
var rowNumber = $('#selectedTreatmentsTable tr').length;
for(var i=1; i < rowNumber; i++){
    var date=$('#row-'+i +' td:nth-child(1)').text();
    var note=$('#row-'+i +' td:nth-child(2)').find('input').val();
    var teethNr=$('#row-'+i +' td:nth-child(3)').text();
    var treatment=$('#row-'+i +' td:nth-child(4)').text();
    $.post('/patient/diagnose/addTreatment',{patientId,date,note,teethNr,treatment},function(response){
location.reload()
    });

}
}


function deleteDiagnose(id){
  iziToast.question({
timeout: 20000,
close: false,
overlay: true,
displayMode: 'once',
id: 'question',
zindex: 999,
title: 'Dikkat',
message: 'Diagnose bilgisini silmek istediğinizden emin misiniz?',
position: 'center',
buttons: [
['<button><b>EVET</b></button>', function (instance, toast) {

$.get('/patient/diagnose/delete/'+id, function(response){
    location.reload();
})
instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

}, true],
['<button>HAYIR</button>', function (instance, toast) {

instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

}],
],
onClosing: function(instance, toast, closedBy){

},
onClosed: function(instance, toast, closedBy){

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
</script>

@endsection
