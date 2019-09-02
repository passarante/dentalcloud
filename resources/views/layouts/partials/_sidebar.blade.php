<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('theme/img/dp.jpg')}}" class="img-circle user-img-circle"
                                alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> Dt. Cihan Karalök</p>
                            <small>Dent Modern</small>
                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link nav-toggle"><i class="material-icons bg-primary">assignment</i>
                        <span class="title">Randevular</span><span class="arrow"></span></a>
                    <ul class="sub-menu">

                        <li class="nav-item  ">
                            <a href="{{route('appointment.create')}}" class="nav-link "> <span class="title">Randevu
                                    Ekle</span>
                            </a>
                        </li>


                        <li class="nav-item  ">
                            <a href="{{route('appointment.index')}}" class="nav-link "> <span class="title">Tümünü
                                    Göster</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons bg-secondary">accessible</i>
                        <span class="title">Hastalar</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{route('patient.index')}}" class="nav-link "> <span class="title">Tüm
                                    Hastalar</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{route('patient.create')}}" class="nav-link "> <span class="title">Hasta
                                    Ekle</span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{route('patient-group.create')}}" class="nav-link "> <span class="title">Hasta
                                    Grubu Ekle</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons bg-info">person</i>
                        <span class="title">Hekimler</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{route('doctor.index')}}" class="nav-link "> <span class="title">Tüm
                                    Hekimler</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{route('doctor.create')}}" class="nav-link "> <span class="title">Hekim
                                    Ekle</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons">hotel</i>
                        <span class="title">Görüşme</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{route('conversation.create')}}" class="nav-link "> <span class="title">Görüşme
                                    Kaydı Ekle</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{route('conversation.index')}}" class="nav-link "> <span class="title">İletişim
                                    Geçmişi</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Hızlı E-Posta Şablonu</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">İleri Tarihli E-Posta</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">dvr</i>
                        <span class="title">Tedavi</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="#" class="nav-link" onClick="gotoPage(1)">
                                <span class="title">Yeni Tedavi</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link " onClick="gotoPage(2)">
                                <span class="title">Tedavi Planı</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link " onClick="gotoPage(3)">
                                <span class="title">Diagnoz</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons bg-success">monetization_on</i>
                        <span class="title">Ödemeler</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item  ">
                            <a href="{{route('payment.create')}}" class="nav-link "> <span class="title">Ödeme
                                    Ekle</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{route('payment.index')}}" class="nav-link "> <span class="title">Ödeme
                                    Listesi</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Fatura
                                    Oluştur</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons bg-warning">email</i>
                        <span class="title">SMS</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{route('sms.create')}}" class="nav-link ">
                                <span class="title">Hızlı SMS Gönder</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">SMS Şablonu</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
                        <span class="title">Ayarlar</span> <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Hatırlatma Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">USS-ÇKYS Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Genel Ayarlar</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{route('treatment.index')}}" class="nav-link "> <span class="title">Tedavi
                                    Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Onam Formu Ayarları</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link "> <span class="title">Randevu Ayarları</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item  ">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">store</i>
                        <span class="title">Raporlar</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Günlük Tedavi Raporları</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Tedavi Bazlı Pirim</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Tahsilat Bazlı Pirim</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Grup Bazında Raporlar</span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Borçlu Hastalar</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Sağlık.NET</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <span class="title">Faturalar</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>



<script>
    function gotoPage(type){
  var pId ={{Session::get('patient_id')}};

  if(pId>0 && pId!=null){
if(type==1){
location.replace('/patient/treatments/' +pId)
}else if(type==2){
    location.replace('/patient/diagnose/' +pId)
}else if(ptype==3){
    location.replace('/patient/ptreatments/' +pId)
}
  }else{
      alert("Lütfen Hasta Seçin");
      location.replace('/patient/')
  }
}
</script>
