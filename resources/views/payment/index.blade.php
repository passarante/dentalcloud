@extends('layouts.master')
@section('content')
  <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Ödeme Kayıtları</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Anasayfa</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Ödemeler</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Ödeme Kayıtları</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header></header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                   <div class="table-scrollable">
                                    <table id="tableExport" class="display table table-hover table-checkable order-column m-t-20" style="width: 100%">
                                        <thead>
                                            <tr>
                                            	<th></th>
                                                <th> Tarih </th>
                                                <th> Hasta Adı Soyadı </th>
                                                <th> Ödeme Türü </th>
                                                <th> Ödeme Notu </th>
                                                <th> Tutar</th>

                                            </tr>
                                        </thead>
                                       <tbody>
                                           @foreach ($payments as $key => $payment)
	                                         <tr class="odd gradeX">
												<td class="patient-img">
														{{$key +1}}
												</td>
												<td>{{$payment->payment_date}}</td>
												<td><a href="mailto:shuxer@gmail.com">
														{{$payment->patient->full_name}} </a></td>

												<td class="center">{{$payment->payment_type}}</td>
                                                <td class="center">{{$payment->payment_note}}</td>
                                                	<td class="center">{{$payment->amount}}</td>

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
@endsection

@section('page-scripts')
    <script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}" ></script>
 	<script src="{{asset('theme/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
 	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" ></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" ></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" ></script>
 	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" ></script>
<script>

		    $(document).ready(function() {
		        $('#tableExport').DataTable(
               {
                   pageLength: 5 ,
		            dom: 'Bfrtip',
		            buttons: [
		                'copyHtml5',
		                'excelHtml5',
		                'csvHtml5',
		                'pdfHtml5'
		            ]
		        });
		    } );
</script>
@endsection
