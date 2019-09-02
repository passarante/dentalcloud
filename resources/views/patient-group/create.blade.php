@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Yeni Hasta Grubu Ekleme</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Hastalar</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Hasta Grubu Ekle</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head bg-b-black">
                    <header>Hasta Grubu</header>

                </div>
                <div class="card-body " id="bar-parent">
                    <form id="addPatientGroupForm">
                        <div class="form-group">
                            <label for="group_name">Grup Adı</label>
                            <input type="text" name="group_name" class="form-control" id="group_name"
                                placeholder="Grup Adı" required>
                        </div>
                        <div class="form-group">
                            <label for="discount_rate">İndirim Oranı</label>
                            <input type="number" name="discount_rate" class="form-control" id="discount_rate"
                                placeholder="İndirim Oranı">
                        </div>

                        <button type="submit" id="addPatientGroupBtn" class="btn btn-primary">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="card card-box">
                <div class="card-head bg-b-pink">
                    <header>Hasta Grupları</header>

                </div>
                <div class="card-body " id="bar-parent1">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-hover" id="patientGroupTable">
                            <thead>
                                <tr>
                                    <th> Hasta Grup Adı</th>
                                    <th class="text-center  ">İndirim Oranı</th>
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

<div class="modal fade" id="editPatientGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPatientGroupForm">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="group_name_edit">Grup Adı</label>
                        <input type="text" name="group_name_edit" class="form-control" id="group_name_edit"
                            placeholder="Grup Adı" required>
                    </div>
                    <div class="form-group">
                        <label for="discount_rate_edit">İndirim Oranı</label>
                        <input type="number" name="discount_rate_edit" class="form-control" id="discount_rate_edit"
                            placeholder="İndirim Oranı">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" >Kapat</button>
                <button type="button" class="btn btn-primary" onclick="updatePatientGroup()">Kaydet</button>
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

    $("input[name=group_name]").blur(function () {
        var group_name = $("input[name=group_name]").val();

        $.ajax({

            type: 'GET',

            url: '/patient-group/check-name',

            data: {
                group_name: group_name,

            },

            success: function (data) {
                if (data.data.length > 0) {

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
                    toastr["error"](group_name +
                        " daha önce sisteme kaydedilmiş. Lütfen başka bir grup adı seçin")

                    $('#addPatientGroupForm')[0].reset();
                }




            }

        });
    });

    $("#addPatientGroupBtn").click(function (e) {

        var group_name = $("input[name=group_name]").val();

        var discount_rate = $("input[name=discount_rate]").val();

        if (group_name == "") {

        } else {
            e.preventDefault();
            $.ajax({

                type: 'POST',

                url: '/patient-group/store',

                data: {
                    group_name: group_name,
                    discount_rate: discount_rate
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


                    $('#addPatientGroupForm')[0].reset();

$('#patientGroupTable').DataTable().draw();
                }

            });
        }

    });



    function deleteGroupName(id, name) {
        iziToast.question({
            timeout: 10000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Dikkat',
            message: name + ' hasta grubu silinecektir. Emin misiniz?',
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

                        url: '/patient-group/delete-group/' + id,

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


                            $('#patientGroupTable').DataTable().draw();
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

        $("#editPatientGroupModal").modal();
        $.ajax({

            type: 'GET',

            url: '/patient-group/parientgroup-detail/' + id,

            data: {
                id: id,

            },

            success: function (data) {
                $('#group_name_edit').val(data.data.group_name);
                $('#discount_rate_edit').val(data.data.discount_rate);
                $('#id_edit').val(data.data.id);
                $('#patientGroupEditModal').modal();
            }

        });
    }

    function updatePatientGroup() {

        groupName = $('#group_name_edit').val();
        discountRate = $('#discount_rate_edit').val();
        id = $('#id_edit').val();
        $.ajax({

            type: 'POST',

            url: '/patient-group/update',

            data: {
                id: id,
                group_name : groupName,
                discount_rate : discountRate

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
                    $('#patientGroupTable').DataTable().draw();
            }

        });
    }
$(document).ready(function() {
refreshData();
});

function refreshData(){

  $('#patientGroupTable').DataTable({
        searching: false,
        lengthChange:false,
        pageLength:5,
        processing: true,
        serverSide: true,
        ajax: '{{ route('patient-group.getPatientGroupDataTable') }}',
        columns: [

            {data: 'group_name', name: 'group_name'},
            {data: 'discount_rate', name: 'discount_rate'},
            {data: 'action_btns', name: 'action_btns'},

        ]
    });

}
</script>

@endsection
