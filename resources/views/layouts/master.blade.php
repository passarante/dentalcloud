<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="Sunray" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>DentCloud | Online Klinik Yönetim Sistemi</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{asset('theme/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--bootstrap -->
	<link href="{{asset('theme/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link href="{{asset('theme/plugins/material/material.min.css')}}" rel="stylesheet" >
	<link href="{{asset('theme/css/material_style.css')}}" rel="stylesheet">
	<!-- morris chart -->
    <link href="{{asset('theme/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
    <link href="{{asset('theme/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/css/pages/steps.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('theme/plugins/popper/popper.min.js')}}"></script>

        <link rel="stylesheet" href="{{asset('theme/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css')}}" />

        <link href="{{asset('theme/plugins/dropzone/dropzone.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('theme/plugins/select2/css/select2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />



        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" />

	<!-- favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" />
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
	@include("layouts.partials._header")
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
@include('layouts.partials._sidebar')
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
@yield('content')
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                    	<li class="nav-item">
                            <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon"  data-toggle="tab">Theme</a>
                        </li>
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_2" class="nav-link tab-icon"  data-toggle="tab">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                    	<!-- Start Color Theme Sidebar -->
                    	<div class="tab-pane chat-sidebar-settings in show active animated shake" role="tabpanel" id="quick_sidebar_tab_1">
							<div class="chat-sidebar-slimscroll-style">
								<div class="theme-light-dark">
									<h6>Sidebar Theme</h6>
									<button type="button" data-theme="white" class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light Sidebar</button>
									<button type="button" data-theme="dark" class="btn dark btn-outline btn-circle m-b-10 theme-button">Dark Sidebar</button>
								</div>
								<div class="theme-light-dark">
									<h6>Sidebar Color</h6>
									<ul class="list-unstyled">
										<li class="complete">
											<div class="theme-color sidebar-theme">
												<a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
											</div>
										</li>
									</ul>
									<h6>Header Brand color</h6>
									<ul class="list-unstyled">
										<li class="theme-option">
											<div class="theme-color logo-theme">
								             	<a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
												<a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
								           	</div>
								        </li>
									</ul>
									<h6>Header color</h6>
									<ul class="list-unstyled">
										<li class="theme-option">
											<div class="theme-color header-theme">
								             	<a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
								             	<a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
								             	<a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
								             	<a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
								             	<a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
								             	<a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
								             	<a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
								          	</div>
								        </li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Color Theme Sidebar -->
 						<!-- Start Setting Panel -->
 						<div class="tab-pane chat-sidebar-settings animated slideInUp" id="quick_sidebar_tab_2">
                            <div class="chat-sidebar-settings-list chat-sidebar-slimscroll-style">
                                <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
	                            <div class="chatpane inner-content ">
									<div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Sidebar Position</div>
					                        <div class="setting-set">
					                           <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
	                                                <option value="left" selected="selected">Left</option>
	                                                <option value="right">Right</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Header</div>
					                        <div class="setting-set">
					                           <select class="page-header-option form-control input-inline input-sm input-small ">
	                                                <option value="fixed" selected="selected">Fixed</option>
	                                                <option value="default">Default</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Sidebar Menu </div>
					                        <div class="setting-set">
					                           <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
	                                                <option value="accordion" selected="selected">Accordion</option>
	                                                <option value="hover">Hover</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Footer</div>
					                        <div class="setting-set">
					                           <select class="page-footer-option form-control input-inline input-sm input-small ">
	                                                <option value="fixed">Fixed</option>
	                                                <option value="default" selected="selected">Default</option>
                                            	</select>
					                        </div>
					                    </div>
					                </div>
									<div class="chat-header"><h5 class="list-heading">Account Settings</h5></div>
									<div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Notifications</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-1">
									                  <input type = "checkbox" id = "switch-1"
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Show Online</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-7">
									                  <input type = "checkbox" id = "switch-7"
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Status</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-2">
									                  <input type = "checkbox" id = "switch-2"
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">2 Steps Verification</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-3">
									                  <input type = "checkbox" id = "switch-3"
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                </div>
                                    <div class="chat-header"><h5 class="list-heading">General Settings</h5></div>
                                    <div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Location</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-4">
									                  <input type = "checkbox" id = "switch-4"
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Save Histry</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-5">
									                  <input type = "checkbox" id = "switch-5"
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Auto Updates</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
									                  for = "switch-6">
									                  <input type = "checkbox" id = "switch-6"
									                     class = "mdl-switch__input" checked>
									               	</label>
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
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
      @include('layouts.partials._footer')
        <!-- end footer -->
    </div>
    <!-- start js include path -->

    <script src="{{asset('theme/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
	<script src="{{asset('theme/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('theme/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <!-- counterup -->
    <script src="{{asset('theme/plugins/counterup/jquery.waypoints.min.js')}}" ></script>
    <script src="{{asset('theme/plugins/counterup/jquery.counterup.min.js')}}" ></script>
    <!-- Common js-->
	<script src="{{asset('theme/js/app.js')}}" ></script>
    <script src="{{asset('theme/js/layout.js')}}" ></script>
    <script src="{{asset('theme/js/theme-color.js')}}" ></script>
    <!-- material -->
    <script src="{{asset('theme/plugins/material/material.min.js')}}"></script>
	<!-- morris chart -->
	   <link href="{{asset('theme/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>
    <!-- end js include path -->
    @yield('page-scripts')
  </body>
</html>
