@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Hasta Listesi</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Hastalar</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                @if (Session::get('patient_full_name'))
                <li><a class="parent-item" href="">Hasta Listesi</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                <li class="active text-bold text-success" id="patientName">{{Session::get('patient_full_name')}}</li>
                @else
                    <li class="active">Hasta Listesi</li>
                @endif

            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Tüm Hastalar </header>
                    <div class="tools">
                        <a href="{{route('patient.create')}}">
                            <span class="pull-right btn btn-success mr-2 mt-2"><i class="fa fa-plus"></i>Yeni
                                Ekle</span>
                        </a>
                    </div>
                </div>
                <div class="card-body  ">
                    <table id="patientListTable" class="display " style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>Telefon</th>
                                <th>İşlemler</th>
                                <th>Seç</th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection

@section('page-scripts')
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $(document).ready(function () {
        $('#patientListTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('patient.getPatientDataTable') }}',
            columns: [

                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'action_btns',
                    name: 'action_btns'
                },
                {
                    data: 'select',
                    name: 'select'
                },

            ]
        });
        var id =$('#patientId').val();
    });

    function selectPatient(patientId) {

        $.ajax({
            url: '/patient/select-patient/' + patientId,
            success: function (data) {

                $('#patientName').text(data.name)
                
            }
        });
    }

</script>

@endsection


