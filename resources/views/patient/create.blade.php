@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Hasta Ekleme</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li class="active">Hasta Ekleme</li>
            </ol>
        </div>
    </div>

    <!-- wizard with validation-->
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-head">
                    <header>Yeni Hasta Kayıt Formu</header>
                </div>
                <div class="card-body ">
                    <form id="addNewPatientForm" action="{{route('patient.store')}}" enctype="multipart/form-data"
                        method="Post">
                        @csrf
                        <h3>Genel Bilgiler</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 p-t-20">
                                    <div class="col-lg-12 p-t-20">
                                        <label class="mdl-textfield__label">Cinsiyet</label>
                                        <div class="col-lg-12 p-t-20">
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="gdoption-1">
                                                <input type="radio" id="gdoption-1" class="mdl-radio__button"
                                                    name="gender" value="1" checked>
                                                <span class="mdl-radio__label">Kadın</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="gdoption-2">
                                                <input type="radio" id="gdoption-2" class="mdl-radio__button"
                                                    name="gender" value="2">
                                                <span class="mdl-radio__label">Erkek</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" pattern="[0-9]*" maxlength="11"
                                            name="tck_no" id="tck_no"  required/>
                                        <label class="mdl-textfield__label" for="tck_no">TC Kimlik No</label>
                                        <span class="mdl-textfield__error">TC Kimlik Numarası Gerekli Bir Alandır Boş Geçilemez</span>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="protocol_no" id="protocol_no" maxlength="10"
                                            name="protocol_no" />
                                        <label class="mdl-textfield__label" for="protocol_no" required>Protokol No</label>
                                         <span class="mdl-textfield__error">Protokol No Gerekli Bir Alandır. Boş Geçilemez.</span>

                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="name" name="name"  required/>
                                        <label class="mdl-textfield__label">Adı</label>
                                        <span class="mdl-textfield__error">Lütfen Geçerli Bir İsim Girin</span>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="last_name"
                                            name="last_name" required />
                                        <label class="mdl-textfield__label">Soyadı</label>
                                        <span class="mdl-textfield__error">Lütfen Geçerli Bir Soyadı Girin</span>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="phone" name="phone" maxlength="15"  required/>
                                        <label class="mdl-textfield__label">GSM</label>
                                        <span class="mdl-textfield__error">Lütfen Geçerli Bir Telefon Girin</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z]*"
                                            name="profession" id="profession" />
                                        <label class="mdl-textfield__label" for="profession">Meslek</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="reference"
                                            name="reference" />
                                        <label class="mdl-textfield__label" for="reference">Referans</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="lob" name="lob" />
                                        <label class="mdl-textfield__label">Doğum Yeri</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                       <input type="text" name="dob" id="date" class="floating-label mdl-textfield__input" placeholder="Date" data-dtp="dtp_Ngvhp">
                                        <label class="mdl-textfield__label">Doğum Tarihi</label>
                                    </div>


                                    <div class="col-lg-12 p-t-20">
                                        <label class="mdl-textfield__label">Kan Grubu</label>
                                        <div class="col-lg-12 p-t-20">
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-1">
                                                <input type="radio" id="option-1" class="mdl-radio__button"
                                                    name="blood_type" value="1" checked>
                                                <span class="mdl-radio__label">A Rh (+)</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-2">
                                                <input type="radio" id="option-2" class="mdl-radio__button"
                                                    name="blood_type" value="2">
                                                <span class="mdl-radio__label">B Rh (+)</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-3">
                                                <input type="radio" id="option-3" class="mdl-radio__button"
                                                    name="blood_type" value="3">
                                                <span class="mdl-radio__label">AB Rh (+)</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-4">
                                                <input type="radio" id="option-4" class="mdl-radio__button"
                                                    name="blood_type" value="4">
                                                <span class="mdl-radio__label">0 Rh (+)</span>
                                            </label>

                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-5">
                                                <input type="radio" id="option-5" class="mdl-radio__button"
                                                    name="blood_type" value="5">
                                                <span class="mdl-radio__label">A Rh (-)</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-6">
                                                <input type="radio" id="option-6" class="mdl-radio__button"
                                                    name="blood_type" value="6">
                                                <span class="mdl-radio__label">B Rh (-)</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-7">
                                                <input type="radio" id="option-7" class="mdl-radio__button"
                                                    name="options" value="7">
                                                <span class="mdl-radio__label">AB Rh (-)</span>
                                            </label>
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="option-8">
                                                <input type="radio" id="option-8" class="mdl-radio__button"
                                                    name="options" value="8">
                                                <span class="mdl-radio__label">0 Rh (-)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 p-t-20">
                                            <label class="mdl-textfield__label">Hasta Türü</label>
                                            <div class="col-lg-12 p-t-20">
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="ptoption-1">
                                                    <input type="radio" id="ptoption-1" class="mdl-radio__button"
                                                        name="patient_type" value="1" checked>
                                                    <span class="mdl-radio__label">Aktif</span>
                                                </label>
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="ptoption-2">
                                                    <input type="radio" id="ptoption-2" class="mdl-radio__button"
                                                        name="patient_type" value="2">
                                                    <span class="mdl-radio__label">Potansiyel</span>
                                                </label>
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="ptoption-3">
                                                    <input type="radio" id="ptoption-3" class="mdl-radio__button"
                                                        name="patient_type" value="3">
                                                    <span class="mdl-radio__label">Pasif</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                        <h3>İletişim Bilgileri</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 p-t-20">

                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z]*" name="gsm2" maxlength="15"
                                            id="gsm2" />
                                        <label class="mdl-textfield__label" for="gsm2">GSM 2</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="work_phone" maxlength="15"
                                            name="work_phone" />
                                        <label class="mdl-textfield__label" for="work_phone">İş Telefonu</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="fax" name="fax" maxlength="15" />
                                        <label class="mdl-textfield__label">Fax</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="home_phone"  maxlength="15"
                                            name="home_phone" />
                                        <label class="mdl-textfield__label">Ev Telefonu</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="email" id="email" name="email" />
                                        <label class="mdl-textfield__label">Email</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="closer_friend"
                                            name="closer_friend" />
                                        <label class="mdl-textfield__label">Hasta Yakını</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="closer_friend_status"
                                            name="closer_friend_status" />
                                        <label class="mdl-textfield__label">Yakınlık Derecesi</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="closer_friend_phone" maxlength="15"
                                            name="closer_friend_phone" />
                                        <label class="mdl-textfield__label">Yakın Telefonu</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield txt-width is-upgraded"
                                        data-upgraded=",MaterialTextfield">
                                        <textarea class="mdl-textfield__input" rows="3" id="text7" name="address"
                                            id="address"
                                            style="margin-top: 0px; margin-bottom: 0px; height: 115px;"></textarea>
                                        <label class="mdl-textfield__label" for="text7">Ev Adresi</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="city" name="city" />
                                        <label class="mdl-textfield__label" for="city">Şehir</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="state" name="state" />
                                        <label class="mdl-textfield__label">İlçe</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="town" name="town" />
                                        <label class="mdl-textfield__label">Semt</label>
                                    </div>
                                    <div class="col-lg-12 p-t-20">
                                        <label class="mdl-textfield__label">Hasta Grubu</label>
                                        <div class="col-lg-12 p-t-20">
                                            @foreach ($patient_groups as $group)
                                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                for="{{$group->group_name}}">
                                                <input type="radio" name="patient_group_id" id="{{$group->group_name}}"
                                                    class="mdl-radio__button" name="patient_group_id"
                                                    value="{{$group->id}}" >
                                                <span class="mdl-radio__label">{{$group->group_name}}</span>
                                            </label>
                                            @endforeach


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        <h3>Teşhis Tanı Bilgileri</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-6 p-t-20">

                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text"
                                            name="active_treatments" id="active_treatments" />
                                        <label class="mdl-textfield__label" for="active_treatments">Şu anda herhangi bir
                                            tedavi
                                            görüyormusunuz? İlaç kullanıyormusunuz?</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text"
                                            name="drug_allergy" id="drug_allergy" />
                                        <label class="mdl-textfield__label" for="drug_allergy">İlaç alerjiniz var mı?
</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="patient_historytext"
                                            name="patient_history" />
                                        <label class="mdl-textfield__label" for="patient_historytext">Herhangi bir
                                            hastalığınız
                                            var mı, geçirdiniz mi?</label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="other_issues"
                                            name="other_issues" />
                                        <label class="mdl-textfield__label">Bunların dışında herhangi bir tıbbi
                                            sorununuz var mı?
                                        </label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="pregnancy"
                                            name="pregnancy" />
                                        <label class="mdl-textfield__label">Bayanlarda Hamilelik, düşük, adet ve menapoz
                                            bilgileri
                                        </label>
                                    </div>
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="bad_habits"
                                            name="bad_habits" />
                                        <label class="mdl-textfield__label">Kötü alışkanlıklarınız var mı?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z]*"
                                            name="last_treatment" id="last_treatment" />
                                        <label class="mdl-textfield__label" for="last_treatment">En son dişhekimi
                                            muayenesi,
                                            tedavisi?
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 p-t-20">
                                            <label class="mdl-textfield__label">Baş ve boyun bölgesinde radyoterapi
                                                gördünüz mü?
                                            </label>
                                            <div class="col-lg-12 p-t-20">
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="rtoption-1">
                                                    <input type="radio" id="rtoption-1" class="mdl-radio__button"
                                                        name="radio_therapy" value="1" checked>
                                                    <span class="mdl-radio__label">Hayır</span>
                                                </label>
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="rtoption-2">
                                                    <input type="radio" id="rtoption-2" class="mdl-radio__button"
                                                        name="radio_therapy" value="2">
                                                    <span class="mdl-radio__label">Evet</span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 p-t-20">
                                            <label class="mdl-textfield__label">Cerrahi müdahale veya yaralanma sonrası
                                                kanama uzun sürer mi?

                                            </label>
                                            <div class="col-lg-12 p-t-20">
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="bdoption-1">
                                                    <input type="radio" id="bdoption-1" class="mdl-radio__button"
                                                        name="bleeding_duration" value="1" checked>
                                                    <span class="mdl-radio__label">Hayır</span>
                                                </label>
                                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mr-4"
                                                    for="bdoption-2">
                                                    <input type="radio" id="bdoption-2" class="mdl-radio__button"
                                                        name="bleeding_duration" value="2">
                                                    <span class="mdl-radio__label">Evet</span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 p-t-20">
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="kalpr">
                                            <input type="checkbox" name="kalpr" id="kalpr" class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Kalp hastalıkları
                                            </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="sekerr">
                                            <input type="checkbox" name="sekerr" id="sekerr"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Şeker Hastalığı
                                            </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                            for="tansiyonr">
                                            <input type="checkbox" name="tansiyonr" id="tansiyonr"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Tansiyon Sorunları </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                            for="epilepsir">
                                            <input type="checkbox" name="epilepsir" id="epilepsir"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Epilepsi (Sara) </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="kanr">
                                            <input type="checkbox" name="kanr" id="kanr" class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Kan Hastalıkları </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                            for="romatizmalr">
                                            <input type="checkbox" name="romatizmalr" id="romatizmalr"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Romatizmal Hastalıklar </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                            for="bkaracigerr">
                                            <input type="checkbox" name="bkaracigerr" id="bkaracigerr"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Böbrek, Karaciğer Rahatsızlıkları </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="akcigerr">
                                            <input type="checkbox" name="akcigerr" id="akcigerr"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Akciğer Rahatsızlıkları </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                            for="norolojikr">
                                            <input type="checkbox" name="norolojikr" id="norolojikr"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Nörolojik Rahatsızlıklar </span>
                                        </label>
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="zuhrevir">
                                            <input type="checkbox" name="zuhrevir" id="zuhrevir"
                                                class="mdl-checkbox__input">
                                            <span class="mdl-checkbox__label">Zührevi Hastalıklar </span>
                                        </label>


                                    </div>

                                </div>
                            </div>
                        </fieldset>

                    </form>
                    <hr>
                    <div class="col-lg-12">
                       <div class="row bg-b-black">
                           <h3 class="m-3 text-white">Fotoğraflar :</h3>
                        <form method="post" action="{{route('patient.photo.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone">
                            @csrf
                        </form>

                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('page-scripts')
<script src="{{asset('theme/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

<script src="{{asset('theme/plugins/steps/jquery.steps.js')}}"></script>
<script src="{{asset('theme/js/pages/steps/steps-data.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
	<script src="{{asset('theme/plugins/material-datetimepicker/moment-with-locales.min.js')}}"></script>
	<script src="{{asset('theme/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
	<script src="{{asset('theme/plugins/material-datetimepicker/datetimepicker.js')}}"></script>

<script>
    Dropzone.prototype.defaultOptions.dictDefaultMessage =
        "Dosya yüklemek için buraya tıklayabilir yada dosyanızı buraya sürükleyebilirsiniz";
    Dropzone.prototype.defaultOptions.dictRemoveFile = "Kaldır";

    Dropzone.options.dropzone = {
        maxFilesize: 12,
        renameFile: function (file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function (file) {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/patient/photo/delete',
                data: {
                    filename: name
                },
                success: function (data) {
                    console.log("File has been successfully removed!!");
                },
                error: function (e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            return false;
        }
    };

</script>
@endsection
