@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Yeni Hekim Ekleme</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Hekimler</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Hekim Ekle</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head bg-b-black">
                    <header>Hekim Bilgileri</header>

                </div>
                <div class="card-body " id="bar-parent">
                    <form id="addDoctorForm">
                        <div class="form-group">
                            <label for="group_name">Hekim Adı</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Hekim Adı" required>
                        </div>
                        <div class="form-group">
                            <label for="group_name">Hekim Soyadı</label>
                            <input type="text" name="last_name" class="form-control" id="last_name"
                                placeholder="Hekim Soyadı" required>
                        </div>
                        <div class="form-group">
                            <label for="group_name">Branşı</label>
                            <input type="text" name="branch_name" class="form-control" id="branch_name"
                                placeholder="Branş" required>
                        </div>


                        <button type="submit" id="addDoctorBtn" class="btn btn-primary">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head bg-b-pink">
                    <header>Hekim Listesi</header>

                </div>
                <div class="card-body " id="bar-parent1">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-hover" id="doctorTable">
                            <thead>
                                <tr>
                                    <th> Hekim Adı</th>
                                    <th> Soyadı</th>
                                    <th class="text-center  ">Branşı</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Hekim Güncelleme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPatientGroupForm">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="name_edit">Hekim Adı</label>
                        <input type="text" name="name_edit" class="form-control" id="name_edit"
                            placeholder="Hekim Adı" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name_edit">Hekim Soyadı</label>
                        <input type="text" name="last_name_edit" class="form-control" id="last_name_edit"
                            placeholder="Hekim Soyadı" required>
                    </div>
                    <div class="form-group">
                        <label for="branch_nam_edite">Branş</label>
                        <input type="text" name="branch_name_edit" class="form-control" id="branch_name_edit"
                            placeholder="Branş" required>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" >Kapat</button>
                <button type="button" class="btn btn-primary" onclick="updateDoctor()">Kaydet</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}" ></script>
<script src="{{asset('theme/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $("#addDoctorBtn").click(function (e) {

        var name = $("input[name=name]").val();
        var last_name = $("input[name=last_name]").val();
        var branch_name = $("input[name=branch_name]").val();



        if (name == "" || last_name=="" || branch_name=="") {

        } else {

            e.preventDefault();
            $.ajax({

                type: 'POST',

                url: '/doctor/store',

                data: {
                  name,
                  last_name,
                  branch_name
                },

                success: function (data) {

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["success"](data.success, )


                    $('#addDoctorForm')[0].reset();

                    $('#doctorTable').DataTable().draw();
                }

            });
        }

    });



    function deleteDoctor(id, name) {
        iziToast.question({
            timeout: 10000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Dikkat',
            message: name + ' adlı hekim silinecektir. Emin misiniz?',
            position: 'center',
            buttons: [
                ['<button><b>EVET</b></button>', function (instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'yes');

                }, true],
                ['<button>İPTAL</button>', function (instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'cancel');

                }],
            ],
            onClosing: function (instance, toast, closedBy) {
                if (closedBy == "yes") {

                    $.ajax({

                        type: 'POST',

                        url: '/doctor/delete/' + id,

                        data: {
                            id: id
                        },

                        success: function (data) {

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr["success"](data.success)


                            $('#doctorTable').DataTable().draw();
                        }

                    });
                }
            },
            onClosed: function (instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
    }


    function showEditModal(id) {

        $("#editDoctor  Modal").modal();
        $.ajax({

            type: 'GET',

            url: '/doctor/detail/' + id,

            data: {
                id: id,

            },

            success: function (data) {
                $('#name_edit').val(data.data.name);
                $('#last_name_edit').val(data.data.last_name);
                $('#id_edit').val(data.data.id);
                $('#branch_name_edit').val(data.data.branch_name);
                $('#editDoctorModal').modal();
            }

        });
    }

    function updateDoctor() {

        name = $('#name_edit').val();
        last_name= $('#last_name_edit').val();
        branch_name= $('#branch_name_edit').val();
        id = $('#id_edit').val();
        $.ajax({

            type: 'POST',

            url: '/doctor/update',

            data: {
                id,
                 name,
                 last_name,
                 branch_name

            },

            success: function (data) {
                $('#closeModal').click();
                toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["success"](data.success, )
                    $('#doctorTable').DataTable().draw();
            }

        });
    }
$(document).ready(function() {
refreshData();
});

function refreshData(){

  $('#doctorTable').DataTable({
        searching: false,
        lengthChange:false,
        pageLength:5,
        processing: true,
        serverSide: true,
        ajax: '{{ route('doctor.index.ajax') }}',
        columns: [

            {data: 'name', name: 'name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'branch_name', name: 'branch_name'},
            {data: 'action_btns', name: 'action_btns'},

        ]
    });

}
</script>

@endsection
