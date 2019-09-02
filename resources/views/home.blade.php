@extends('layouts.master')

@section('content')
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Anasayfa</div>
                            </div>

                        </div>
                    </div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-primary"><i class="material-icons">group</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Randevular</span>
					              <span class="info-box-number">450</span>
					              <div class="progress">
					                <div class="progress-bar bg-primary" style="width: 45%"></div>
					              </div>
					              <span class="progress-description">
					                    Son 1 Ayda %45 Artış Var.
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-warning"><i class="material-icons">person</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Yeni hasta</span>
					              <span class="info-box-number">155</span>
					              <div class="progress">
					                <div class="progress-bar bg-warning" style="width: 40%"></div>
					              </div>
					              <span class="progress-description">
					                    40% Artış
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-success"><i class="material-icons">content_cut</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Operasyon</span>
					              <span class="info-box-number">52</span>
					              <div class="progress">
					                <div class="progress-bar bg-success" style="width: 85%"></div>
					              </div>
					              <span class="progress-description">
					                    85% Artış
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-info"><i class="material-icons">monetization_on</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Fatura Tutarı</span>
					              <span class="info-box-number">13,921</span><span>₺</span>
					              <div class="progress">
					                <div class="progress-bar bg-info" style="width: 50%"></div>
					              </div>
					              <span class="progress-description">
					                    50% Artış
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					      </div>
						</div>
					<!-- end widget -->

                    <!-- end new patient list -->
                    <div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                  <div class="card-box ">
                               <div class="card-head">
                                   <header>Hasta Görüşleri</header>
                                   <div class="tools">
                                       <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                   </div>
                               </div>
                               <div class="card-body ">
                                      <ul id="reviewWindow" class="docListWindow small-slimscroll-style">
                                          <li>
                                          	<div class="row">
                                           	<div class="col-md-8 col-sm-8">
                                                <div class="prog-avatar">
                                                    <img src="{{asset('theme/img/user/user1.jpg')}}" alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Rajesh Mishra</a>
                                                        <p class="rating-text">Awesome!!! Highly recommend</p>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="col-md-4 col-sm-4 rating-style">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_half</i>
                                                <i class="material-icons">star_border</i>
                                               </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                           	<div class="col-md-8 col-sm-8">
                                                <div class="prog-avatar">
                                                    <img src="{{asset('theme/img/user/user2.jpg')}}" alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Sarah Smith</a>
                                                        <p class="rating-text">Very bad service :(</p>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="col-md-4 col-sm-4 rating-style">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_half</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                               </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                           	<div class="col-md-8 col-sm-8">
                                                <div class="prog-avatar">
                                                    <img src="{{asset('theme/img/user/user3.jpg')}}" alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">John Simensh</a>
                                                        <p class="rating-text"> Staff was good nd i'll come again</p>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="col-md-4 col-sm-4 rating-style">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                               </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                           	<div class="col-md-8 col-sm-8">
                                                <div class="prog-avatar">
                                                    <img src="{{asset('theme/img/user/user4.jpg')}}" alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Priya Sarma</a>
                                                        <p class="rating-text">The price I received was good value.</p>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="col-md-4 col-sm-4 rating-style">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_half</i>
                                               </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                           	<div class="col-md-8 col-sm-8">
                                                <div class="prog-avatar">
                                                    <img src="{{asset('theme/img/user/user5.jpg')}} " alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Serlin Ponting</a>
                                                        <p class="rating-text">Not Satisfy !!!1</p>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="col-md-4 col-sm-4 rating-style">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                                <i class="material-icons">star_border</i>
                                               </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                           	<div class="col-md-8 col-sm-8">
                                                <div class="prog-avatar">
                                                    <img src="{{asset('theme/img/user/user6.jpg')}} " alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="#">Priyank Jain</a>
                                                        <p class="rating-text">Good....</p>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="col-md-4 col-sm-4 rating-style">
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star</i>
                                                <i class="material-icons">star_half</i>
                                                <i class="material-icons">star_border</i>
                                               </div>
                                              </div>
                                          </li>
                                      </ul>
                                      <div class="full-width text-center p-t-10" >
										<a href="#" class="btn purple btn-outline btn-circle margin-0">View All</a>
									</div>
                               </div>
                           </div>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="card-box">
                                <div class="card-head">
                                    <header>Ajanda</header>
                                    <button id = "panel-button"
			                           class = "mdl-button mdl-js-button mdl-button--icon pull-right"
			                           data-upgraded = ",MaterialButton">
			                           <i class = "material-icons">more_vert</i>
			                        </button>
			                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
			                           data-mdl-for = "panel-button">
			                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
			                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
			                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
			                        </ul>
                                </div>
                                <div class="card-body ">
                                	<ul class="to-do-list ui-sortable" id="sortable-todo">
                                           <li class="clearfix">
                                               <div class="todo-check pull-left">
                                                   <input type="checkbox" value="None" id="todo-check1">
                                                   <label for="todo-check1"></label>
                                               </div>
                                               <p class="todo-title">Visit patient on home
                                               </p>
                                               <div class="todo-actionlist pull-right clearfix">
                                                   <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                               </div>
                                           </li>
                                           <li class="clearfix">
                                               <div class="todo-check pull-left">
                                                   <input type="checkbox" value="None" id="todo-check2">
                                                   <label for="todo-check2"></label>
                                               </div>
                                               <p class="todo-title">Announcement for holiday
                                               </p>
                                               <div class="todo-actionlist pull-right clearfix">
                                                   <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                               </div>
                                           </li>
                                           <li class="clearfix">
                                               <div class="todo-check pull-left">
                                                   <input type="checkbox" value="None" id="todo-check3">
                                                   <label for="todo-check3"></label>
                                               </div>
                                               <p class="todo-title">call bus driver</p>
                                               <div class="todo-actionlist pull-right clearfix">
                                                   <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                               </div>
                                           </li>
                                           <li class="clearfix">
                                               <div class="todo-check pull-left">
                                                   <input type="checkbox" value="None" id="todo-check4">
                                                   <label for="todo-check4"></label>
                                               </div>
                                               <p class="todo-title">Operation on morning</p>
                                               <div class="todo-actionlist pull-right clearfix">
                                                   <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                               </div>
                                           </li>
                                           <li class="clearfix">
                                               <div class="todo-check pull-left">
                                                   <input type="checkbox" value="None" id="todo-check5">
                                                   <label for="todo-check5"></label>
                                               </div>
                                               <p class="todo-title">Pay to staff
                                               </p>
                                               <div class="todo-actionlist pull-right clearfix">
                                                   <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                               </div>
                                           </li>
                                       </ul>
                                </div>
                            </div>
                        </div>
					</div>
                </div>

@endsection

@section('page-scripts')
    <script src="{{asset('theme/plugins/morris/morris.min.js')}}" ></script>
    <script src="{{asset('theme/plugins/morris/raphael-min.js')}}" ></script>
    <script src="{{asset('theme/js/pages/chart/morris/morris-home-data.js')}}" ></script>
@endsection

