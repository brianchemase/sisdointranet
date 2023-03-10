<!-- {{asset('dashboard/')}} -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('AccountsHome')}}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="{{asset('logo/sisdologo.png')}}" alt="logo" width="50" height="60">
                </div>
                <div class="sidebar-brand-text mx-3">SISDO INTRANET <sup>NGO</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('AccountsHome')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manament Modules
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ClientData"
                    aria-expanded="true" aria-controls="ClientData">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manage Clients Data</span>
                </a>
                <div id="ClientData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Clients Data:</h6>
                        <a class="collapse-item" href="{{route('registernewclient')}}">Register Client</a>
                        <a class="collapse-item" href="{{route('clientslist')}}">Clients List</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#loanprocessing"
                    aria-expanded="true" aria-controls="loanprocessing">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Loan Processing</span>
                </a>
                <div id="loanprocessing" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Loaning Progessing:</h6>
                        <a class="collapse-item" href="{{route('loanapplicationform')}}">Loan Application</a>
                        <a class="collapse-item" href="{{route('pendingloanlist')}}">Pending Loans</a>
                        <a class="collapse-item" href="{{route('loanstatements')}}">Process Loan</a>
                        <a class="collapse-item" href="{{route('AccountsTables')}}">Approved Loans</a>
                        <a class="collapse-item" href="{{route('LoanedClients')}}">Loaned Clients(live)</a>
                        <a class="collapse-item" href="{{route('Accountsblank')}}">Rejected Loans</a>
                        <a class="collapse-item" href="{{route('Accountsform')}}">Forms</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Loan Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Loans:</h6>
                        <a class="collapse-item" href="{{route('findloanrepaymentsearch')}}">Loan Repayment</a>
                        <a class="collapse-item" href="{{route('loanrepaymentsearch')}}">Loan Repayment*</a>
                        <a class="collapse-item" href="{{route('loanedclientslist')}}">Loaned Clients List</a>
                        <a class="collapse-item" href="{{route('loanstatements')}}">Loan Statements</a>
                        <a class="collapse-item" href="{{route('runningloanedclientslist')}}">Running Loans</a>
                        <a class="collapse-item" href="{{route('AccountsTables')}}">Table</a>
                        <a class="collapse-item" href="{{route('Accountsblank')}}">Blank</a>
                        <a class="collapse-item" href="{{route('Accountsform')}}">Forms</a>
                        
                    </div>
                </div>
            </li>
             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reports
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="{{route('monthlyloandisbusments')}}">Loan Disbusment Summary</a>
                        <a class="collapse-item" href="{{route('monthlyrepayments')}}">Loan Repayment Summary</a>
                        <a class="collapse-item" href="{{route('monthlyloanrepaymentlist')}}">Repayment Summary</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administration
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>HR Module</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('DemandLetter')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Demand Letter Tab</span></a>
            </li>
            <!-- Nav Item - assets -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Assets Register</span></a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                System Admins
            </div>

            <!-- Nav Item - users -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('ActiveStaffList')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>SISDO STAFF</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

              <!-- Divider -->
              <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Actions
                </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('signout')}}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Sign out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        

        </ul>