@extends('layouts.master')

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Tedavi Ayarları</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Ayarlar</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Tedavi Ayarları</li>
            </ol>
        </div>
    </div>

    <div class="panel tab-border card-box ">
        <div class="col-md-12 col-sm-12">
            <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" onclick="addBranch()"
                data-upgraded=",MaterialButton">
                <i class="material-icons text-success">add_box</i>
            </button>
            <header class="panel-heading panel-heading-gray custom-tab">
                <ul class="nav nav-tabs">
                    @foreach ($branchs as $branch)
                    <li class="nav-item"><a href="#{{$branch->branch_name}}" data-toggle="tab"
                            class="{{$branch->id==1?'active':''}}">{{$branch->branch_name}}</a>
                    </li>
                    @endforeach


                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    @foreach ($branchs as $branch)
                    <div class="tab-pane {{$branch->id==1?'active':''}}" id="{{$branch->branch_name}}">
                        <div class="row-border">
                            <span class="pull-left">
                                <h3>{{$branch->branch_name}}</h3>
                            </span>
                            <span class="pull-right btn btn-success" onclick="addTreatment({{$branch->id}})"><i
                                    class="fa fa-plus"></i>Yeni Tedavi Ekle</span>
                        </div>
                        <br>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-box">
                                    <div class="card-body " id="bar-parent1">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>-</th>
                                                        <th>Tedavi Adı</th>
                                                        <th class="text-center  ">KDV Dahil</th>
                                                        <th>İşlemler</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($branch->treatments as $key =>$treatment)
                                                   
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$treatment->treatment_name}}</td>
                                                        <td class="text-center">{{$treatment->price}} ₺
                                                            {{$treatment->discount_rate>0 ?'%' :''}}</td>
                                                        <td>

                                                            <button class="btn btn-primary btn-xs"
                                                                onclick="showEditTreatmentModal({{$treatment->id}},'{{$treatment->treatment_name}}','{{$treatment->price}}')">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-xs"
                                                                onclick="deleteTreatment({{$treatment->id}},'{{$treatment->treatment_name}}')">
                                                                <i class="fa fa-trash-o "></i>
                                                            </button>
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<div class="modal fade" id="addTreatmentBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Yeni Branş Ekleme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBranchForm">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="branch_name">Branş Adı</label>
                        <input type="text" name="branch_name" class="form-control" id="branch_name"
                            placeholder="Branş Adı" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="addNewBranch()">Kaydet</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addTreatment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Yeni Tedavi Ekleme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addTreatmentForm">
                    <input type="hidden" name="branch_id" id="branch_id">
                    <div class="form-group">
                        <label for="treatment_name">Tedavi Adı</label>
                        <input type="text" name="treatment_name" class="form-control" id="treatment_name"
                            placeholder="Tedavi Adı" required>
                    </div>
                    <div class="form-group">
                        <label for="price">KDV Dahil</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="KDV Dahil"
                            required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeTreatmentModal"
                    data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="addNewTreatment()">Kaydet</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editTreatment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Tedavi Düzenleme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTreatmentForm">
                    <input type="hidden" name="treatment_id" id="treatment_id">
                    <div class="form-group">
                        <label for="treatment_name_edit">Tedavi Adı</label>
                        <input type="text" name="treatment_name_edit" class="form-control" id="treatment_name_edit"
                            placeholder="Tedavi Adı" required>
                    </div>
                    <div class="form-group">
                        <label for="price_edit">KDV Dahil</label>
                        <input type="number" name="price_edit" class="form-control" id="price_edit" placeholder="KDV Dahil"
                            required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeEditTreatmentModal"
                    data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="editTreatment()">Kaydet</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    function addBranch() {
        $('#addTreatmentBranch').modal();
    }

    function addNewBranch() {
        branch_name = $('#branch_name').val();

        if (branch_name != "") {
            $.ajax({

                type: 'POST',

                url: '/treatment-branch/add',

                data: {
                    branch_name: branch_name,
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
                    if (data.success.includes('Dikkat')) {
                        toastr["warning"](data.success)
                        $('#branch_name').val("");
                        $('#branch_name').focus();
                    } else {
                        toastr["success"](data.success)

                        location.reload();



                    }


                }

            });
        } else {
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
            toastr["warning"]("Branş ismi gereklidir. Boş geçilemez");
            $('#branch_name').focus();
        }

    }

    function addTreatment(branchId) {
        $('#addTreatment').modal();
        $('#price').val("");
        $('#treatment_name').val("");
        $('#branch_id').val(branchId);


    }

    function addNewTreatment() {
        price = $('#price').val();
        treatment_branch_id = $('#branch_id').val();
        treatment_name = $('#treatment_name').val();

        $.ajax({
            type: 'POST',
            url: '/treatment/add',
            data: {
                price,
                treatment_branch_id,
                treatment_name

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
                $('#closeTreatmentModal').click();

            }
        });

    }




    function deleteTreatment(id, name) {
        iziToast.question({
            timeout: 10000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Dikkat',
            message: name + ' tedavisi silinecektir. Emin misiniz?',
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

                        url: '/treatment/delete/' + id,

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


                        }

                    });
                }
            },
            onClosed: function (instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
    }


    function showEditTreatmentModal(id,name,price) {

        $("#editTreatment").modal();
        $("#treatment_id").val(id);
        $("#treatment_name_edit").val(name);
        $("#price_edit").val(price);
        
    }

    function editTreatment() {

       id= $("#treatment_id").val();
       treatment_name=  $("#treatment_name_edit").val();
       price= $("#price_edit").val();
        $.ajax({

            type: 'POST',

            url: '/treatment/update',

            data: {
               id,
               treatment_name,
               price

            },

            success: function (data) {
                $('#closeEditModal').click();
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
                $("#closeEditTreatmentModal").click();
            }

        });
    }

</script>

@endsection
