<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
     <title>RMS</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
    
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/my.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



                
                                <!-- Sidebar -->
                                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                                    <!-- Sidebar - Brand -->
                                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                                        <div class="sidebar-brand-icon rotate-n-15">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-train-front" viewBox="0 0 16 16">
                        <path d="M5.621 1.485c1.815-.454 2.943-.454 4.758 0 .784.196 1.743.673 2.527 1.119.688.39 1.094 1.148 1.094 1.979V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V4.583c0-.831.406-1.588 1.094-1.98.784-.445 1.744-.922 2.527-1.118Zm5-.97C8.647.02 7.353.02 5.38.515c-.924.23-1.982.766-2.78 1.22C1.566 2.322 1 3.432 1 4.582V13.5A2.5 2.5 0 0 0 3.5 16h9a2.5 2.5 0 0 0 2.5-2.5V4.583c0-1.15-.565-2.26-1.6-2.849-.797-.453-1.855-.988-2.779-1.22ZM5 13a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm7 1a1 1 0 1 0-1-1 1 1 0 1 0-2 0 1 1 0 0 0 2 0 1 1 0 0 0 1 1ZM4.5 5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h3V5h-3Zm4 0v3h3a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-3ZM3 5.5A1.5 1.5 0 0 1 4.5 4h7A1.5 1.5 0 0 1 13 5.5v2A1.5 1.5 0 0 1 11.5 9h-7A1.5 1.5 0 0 1 3 7.5v-2ZM6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Z"/>
                        </svg>
                                        </div>
                                        <div class="sidebar-brand-text mx-3">Railway</div>
                                    </a>

                                    <!-- Divider -->
                                    <hr class="sidebar-divider my-0">

                                    <!-- Nav Item - Dashboard -->
                                    <li class="nav-item active">
                                        <a class="nav-link"  href="{{ route('dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                        <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                        <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                        </svg>
                                            <span>Dashboard</span></a>
                                    </li>

                                    <!-- Divider -->
                                    <hr class="sidebar-divider">

                                    <!-- Heading -->
                                    <div class="sidebar-heading">
                                        
                                    </div>

                                    <!-- Nav Item - Pages Collapse Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                                            aria-expanded="true" aria-controls="collapseTwo">
                                            <i class="fa fa-users"></i>
                                            
                                            <span>Employee</span>
                                        </a>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Manage Employee:</h6>
                                                <a class="collapse-item" href="{{ route('add_admin_user') }}">Add Employee</a>
                                                <a class="collapse-item" href="{{ route('view_admin_user') }}">View Employee</a> 
                                            </div>
                                        </div>
                                    </li>
                                    <hr class="sidebar-divider">
                                    <!-- Nav Item - Utilities Collapse Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                                            aria-expanded="true" aria-controls="collapseUtilities">
                                            <i class="fas fa-fw fa-wrench"></i>
                                            <span>Trains</span>
                                        </a>
                                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                                            data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Manage Trains:</h6>
                                                <a class="collapse-item" href="{{ route('add_train') }}">Add Train</a>
                                                <a class="collapse-item" href="{{ route('view_train') }}">View Trains</a>
                                                
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Divider -->
                                    <hr class="sidebar-divider">

                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesT"
                                            aria-expanded="true" aria-controls="collapseUtilitiesT">
                                            <i class="fa fa-building"></i>
                                            <span>Trains Station</span>
                                        </a>
                                        <div id="collapseUtilitiesT" class="collapse" aria-labelledby="headingUtilities"
                                            data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Manage Trains Station:</h6>
                                                <a class="collapse-item" href="{{ route('add_train_stations') }}">Add Trains Station</a>
                                                <a class="collapse-item" href="{{ route('view_train_stations') }}">View Trains Station</a>
                                                
                                            </div>
                                        </div>
                                    </li>

                                    <hr class="sidebar-divider">


                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesS"
                                            aria-expanded="true" aria-controls="collapseUtilitiesS">
                                            <i class="fa fa-calendar"></i>
                                            <span>Schedule</span>
                                        </a>
                                        <div id="collapseUtilitiesS" class="collapse" aria-labelledby="headingUtilities"
                                            data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Manage Trains Schedule:</h6>
                                                <a class="collapse-item" href="{{ route('create_schedule') }}">Create Train Schedule</a>
                                                <a class="collapse-item" href="{{ route('view_schedules') }}">View Trains Schedules</a> 
                                                
                                                
                                            </div>
                                        </div>
                                    </li>



                                    <hr class="sidebar-divider">


                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Promotions"
                                            aria-expanded="true" aria-controls="Promotions">
                                            <i class="fa fa-percent"></i>
                                            <span>Promotions</span>
                                        </a>
                                        <div id="Promotions" class="collapse" aria-labelledby="headingUtilities"
                                            data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Manage Promotions:</h6>
                                                <a class="collapse-item" href="{{ route('add-promotion') }}">Create Promotion</a>
                                                <a class="collapse-item" href="{{ route('view-promotions') }}">View Promotions</a> 


                                            </div>
                                        </div>
                                    </li>

                                    <hr class="sidebar-divider">


                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports"
                                            aria-expanded="true" aria-controls="reports">
                                            <i class="fa fa-file"></i>
                                            <span>reports</span>
                                        </a>
                                        <div id="reports" class="collapse" aria-labelledby="headingUtilities"
                                            data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <h6 class="collapse-header">Manage Reports:</h6>
                                                <a class="collapse-item" href="{{route('sales-report')}}">Sales Report</a>


                                            </div>
                                        </div>
                                    </li>




                                    

                                 
                                
                                

                                </ul>
                                <!-- End of Sidebar -->


                                <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>


                            <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="login.html">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>




                            <!-- Content Wrapper -->
                            <div id="content-wrapper" class="d-flex flex-column">

                                <!-- Main Content -->
                                <div id="content">

                                    <!-- Topbar -->
                                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                        <!-- Sidebar Toggle (Topbar) -->
                                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                            <i class="fa fa-bars"></i>
                                        </button>

                                 {{--        <!-- Topbar Search -->
                                        <form
                                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                                    aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form> --}}

                                        <!-- Topbar Navbar -->
                                        <ul class="navbar-nav ml-auto">

                                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                            <li class="nav-item dropdown no-arrow d-sm-none">
                                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-search fa-fw"></i>
                                                </a>
                                                <!-- Dropdown - Messages -->
                                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                                    aria-labelledby="searchDropdown">
                                                    <form class="form-inline mr-auto w-100 navbar-search">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-light border-0 small"
                                                                placeholder="Search for..." aria-label="Search"
                                                                aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button">
                                                                    <i class="fas fa-search fa-sm"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>



                                            <div class="topbar-divider d-none d-sm-block"></div>

                                            <!-- Nav Item - User Information -->
                                            <li class="nav-item dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('AName') }}</span>
                                                    <img class="img-profile rounded-circle"
                                                        src="{{asset('img/undraw_profile.svg')}}">
                                                </a>
                                                <!-- Dropdown - User Information -->
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                    aria-labelledby="userDropdown">
                                                    
                                               
                                                    <a class="dropdown-item" href="{{ route('logout_admin') }}" >
                                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Logout
                                                    </a>
                                                </div>
                                            </li>

                                        </ul>

                                    </nav>
                                    <!-- End of Topbar -->


                                    @yield('admincontent')

                                    
                        </div>
                        <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>


    @yield('page-scripts')
    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            
           
        $('.multi-select').select2({
            placeholder: "Select Stations",
            allowClear: true,
        });
            jQuery("select").each(function(){
            $this = jQuery(this);

        if($this.attr('data-reorder')){
            
            $this.on('select2:select', function(e){
            var elm = e.params.data.element;
            $elm = jQuery(elm);
            $t = jQuery(this);
            $t.append($elm);
            $t.trigger('change.select2');
        });
        }
            $this.select2();
	});
});
    </script>


        </div>
        <!-- End of Content Wrapper -->
       


</body>

</html>