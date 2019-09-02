@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Hekim Listesi</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Hekimler</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>

                    <li class="active">Hekim Listesi</li>


            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Tüm Hekimler </header>
                    <div class="tools">
                        <a href="{{route('doctor.create')}}">
                            <span class="pull-right btn btn-success mr-2 mt-2"><i class="fa fa-plus"></i>Yeni
                                Ekle</span>
                        </a>
                    </div>
                </div>
                <div class="card-body ">
                    <table id="doctorListTable" class="display table table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>Branş</th>

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
        $('#doctorListTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('doctor.index.ajax') }}',
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
                    data: 'branch_name',
                    name: 'branch_name'
                },


            ]
        });
    });


</script>

@endsection

@section('page-scripts')


@endsection
