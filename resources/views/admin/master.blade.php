<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title',config('app.name'))</title>
    <link rel="shortcut icon" href="{{ asset('uploads/275254732_856839212148399_8094917767977980069_n.jpg') }}" type="image/x-icon" />
    <script src="{{ asset('adminassets/jquery.min.js') }}" ></script>
    <link href="{{ asset('adminassets/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <script src="{{ asset('adminassets/bootstrap-toggle.min1.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('adminassets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('adminassets/css00.css') }}"
        rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('adminassets/css/sb-admin-2.min.css') }}"
    rel="stylesheet">
    @yield('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: right;
        }
        .sidebar{
            padding: 0;
        }
        .sidebar .nav-item .nav-link{
            text-align: right;
        }
        .sidebar .nav-item .nav-link[data-toggle=collapse]::after {
            float: left;
            transform: rotate(180deg)

        }
        .ml-auto, .mx-auto{
            margin-right:auto !important;
            margin-left:unset !important ;

        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div   id="wrapper">

        <!-- Sidebar -->
        <ul style="background: rgb(6, 0, 190);" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
             href="{{ route('admin.index') }}">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-tooth"></i>
                                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Dashboard -->
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
                    </li>


                    <!-- Divider -->
                    <!-- Nav Item -Doctor  -->
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoctor"
                    aria-expanded="true" aria-controls="collapseDoctor">
                    <i class="fas fa-user-md"></i>
                    <span>{{ __('Doctor') }}</span>
                    </a>
                    <div id="collapseDoctor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.doctors.index') }}">{{ __('All Doctor') }}</a>
                        <a class="collapse-item" href="{{ route('admin.doctors.create') }}"> {{ __('Add Doctor') }}</a>
                        <a class="collapse-item" href="{{ route('admin.doctors.trash') }}"> {{ __('Trash') }}</a>
                    </div>
                    </div>

                    </li>

                    <!-- Divider Patient -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatient"
                    aria-expanded="true" aria-controls="collapsePatient">
                    <i class="fas fa-users"></i>
                    <span>{{ __('Patient') }}</span>
                    </a>
                    <div id="collapsePatient" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.patients.index') }}">{{ __('All Patient') }}</a>
                        <a class="collapse-item" href="{{ route('admin.patients.create') }}"> {{ __('Add Patient') }}</a>
                        <a class="collapse-item" href="{{ route('admin.patients.trash') }}"> {{ __('Trash') }}</a>
                    </div>
                    </div>
                    </li>

                    <!-- Divider Apponment-->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApponment"
                    aria-expanded="true" aria-controls="collapseApponment">
                    <i class="far fa-calendar-check"></i>
                    <span>{{ __('Apponment') }}</span>
                    </a>
                    <div id="collapseApponment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.apponment.index') }}">{{ __('All Apponment') }}</a>
                        <a class="collapse-item" href="{{ route('admin.apponment.create') }}"> {{ __('Add Apponment') }}</a>
                        <a class="collapse-item" href="{{ route('admin.apponments.trash') }}"> {{ __('Trash') }}</a>
                    </div>
                    </div>
                    </li>


                          <!-- Divider service -->
                          <hr class="sidebar-divider mb-0">
                         <li class="nav-item">
                          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService"
                          aria-expanded="true" aria-controls="collapseService">
                          <i class="fas fa-hand-holding-medical"></i>
                          <span>{{ __('Service') }}</span>
                          </a>
                          <div id="collapseService" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item" href="{{ route('admin.services.index') }}">{{ __('All Service') }}</a>
                          <a class="collapse-item" href="{{ route('admin.services.create') }}"> {{ __('Add Service') }}</a>
                          <a class="collapse-item" href="{{ route('admin.services.trash') }}"> {{ __('Trash') }}</a>
                          </div>
                          </div>
                         </li>

                    <!-- Divider Midical Bill -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBill"
                    aria-expanded="true" aria-controls="collapseBill">
                    <i class="fas fa-capsules"></i>
                    <span>{{ __('Midical Bill') }}</span>
                    </a>
                    <div id="collapseBill" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.medical_bills.index') }}">{{ __('All Midical-Bill') }}</a>
                    <a class="collapse-item" href="{{ route('admin.medical_bills.create') }}">{{ __(' Add new') }}</a>
                    <a class="collapse-item" href="{{ route('admin.medical_bills.trash') }}"> {{ __('Trash') }}</a>
                    </div>
                    </div>
                    </li>



                    <!-- Divider Midicine -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMidicine"
                    aria-expanded="true" aria-controls="collapseMidicine">
                    <i class="fas fa-briefcase-medical"></i>
                    <span>{{ __('Midicine') }}</span>
                    </a>
                    <div id="collapseMidicine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.medicines.index') }}">جميع الأدوية</a>
                    <a class="collapse-item" href="{{ route('admin.medicines.create') }}"> {{ __('Add Midicine') }}</a>
                    <a class="collapse-item" href="{{ route('admin.medicines.trash') }}"> {{ __('Trash') }}</a>
                    </div>
                    </div>
                    </li>

                    <!-- Divider invoices -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
                    aria-expanded="true" aria-controls="collapseInvoice">
                    <i class="fas fa-file-invoice"></i>
                    <span>{{ __('Invoice') }}</span>
                    </a>
                    <div id="collapseInvoice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.invoices.index') }}">{{ __('All Invoice')}}</a>
                        <a class="collapse-item" href="{{ route('admin.invoices.create') }}">{{ __('Add Invoice')}}</a>
                        <a class="collapse-item" href="{{ route('admin.invoice_paid') }}">فواتير المدفوعة</a>
                        <a class="collapse-item" href="{{ route('admin.invoice_unpaid') }}">فواتير الغير مدفوعة</a>
                        <a class="collapse-item" href="{{ route('admin.invoice_partial') }}">فواتير المدفوعة جزئيا</a>
                        <a class="collapse-item" href="{{ route('admin.invoices.trash') }}">الأرشيف</a>
                    </div>
                    </div>
                    </li>


                    <!-- Divider company_invoices -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompany_invoice"
                     aria-expanded="true" aria-controls="collapseCompany_invoice">
                      <i class="fas fa-file-invoice"></i>
                     <span>{{ __('Company_invoice') }}</span>
                     </a>
                     <div id="collapseCompany_invoice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="{{ route('admin.company_invoices.index') }}">{{ __('All Company_invoice')}}</a>
                          <a class="collapse-item" href="{{ route('admin.company_invoices.create') }}">{{ __('Add Company_invoice')}}</a>
                         <a class="collapse-item" href="{{ route('admin.company_invoice_paid') }}">فواتير المدفوعة</a>
                         <a class="collapse-item" href="{{ route('admin.company_invoice_unpaid') }}">فواتير الغير مدفوعة</a>
                         <a class="collapse-item" href="{{ route('admin.company_invoice_partial') }}">فواتير المدفوعة جزئيا</a>
                         <a class="collapse-item" href="{{ route('admin.company_invoices.trash') }}">الأرشيف</a>
                     </div>
                     </div>
                    </li>


                    <!-- Divider Eexpense -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEexpense"
                        aria-expanded="true" aria-controls="collapsEexpense">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>المصاريف</span>
                        </a>
                        <div id="collapseEexpense" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('admin.expenses.index') }}">جميع المصاريف</a>
                            <a class="collapse-item" href="{{ route('admin.expenses.create') }}">اضافة مصاريف</a>
                            <a class="collapse-item" href="{{ route('admin.expenses.trash') }}">الأرشيف</a>
                        </div>
                        </div>
                    </li>

                    <!-- Divider Report -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                        aria-expanded="true" aria-controls="collapsReport">
                        <i class="fas fa-flag"></i>
                        <span>التقارير</span>
                        </a>
                        <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('admin.report.index') }}">قائمة عرض جميع التقارير</a>
                            <a class="collapse-item" href="{{ route('invoice_report') }}">تقارير فواتير المرضى</a>
                            <a class="collapse-item" href="{{ route('company_invoice_report') }}">تقارير فواتير الخارجية</a>
                        </div>
                        </div>
                    </li>

                    <!-- Divider role -->
                    <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.roles.index') }}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>{{ __('Role') }}</span></a>
                    </li>





                    <!-- Divider  Permission-->
                    {{-- <hr class="sidebar-divider mb-0">
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission"
                    aria-expanded="true" aria-controls="collapsePermission">
                    <i class="fas fa-hourglass-start"></i>
                    <span>{{ __('Permission') }}</span>
                    </a>
                    <div id="collapsePermission" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.html">{{ __('All Permission') }}</a>
                        <a class="collapse-item" href="cards.html">{{ __(' Add new') }}</a>
                    </div>
                    </div>
                    </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav  class="navbar navbar-expand navbar-light bg-#f1ececf topbar mb-4 static-Top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


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
                                <span  class="mr-2 d-none d-lg-inline text-gray-600 small">أهلا بك,{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Profile') }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                        @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">

                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('adminassets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('adminassets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
   <script src="{{ asset('adminassets/js/sb-admin-2.min.js') }}"></script>
   <script src="{{ asset('adminassets/bootstrap-select.min.js') }}"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @yield('script')
</body>

</html>
