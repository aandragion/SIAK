 <!-- Navbar -->
 <nav class="navbar navbar-expand navbar-olive navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="/dashboard" style="color: white" class="nav-link">Home</a>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: white" href="#">
                 Mahasiswa
             </a>
             <div class="dropdown-menu">
                 <a class="dropdown-item" tabindex="-1" href="{{ route('dmahasiswa') }}">Daftar Mahasiswa</a>
             </div>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: white" href="#">
                 Perkuliahan
             </a>
             <div class="dropdown-menu">
                 <a class="dropdown-item" tabindex="-1" href="{{ route('kelas') }}">Buat Kelas</a>
                 <a  class="dropdown-item trigger right-caret" tabindex="-1" href="{{ route('nilai') }}" >Input Nilai</a>
                 <a  class="dropdown-item trigger right-caret" tabindex="-1" href="{{ route('skalan') }}" >Skala Nilai</a>
             </div>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: white" href="#">
                 Data
             </a>
             <div class="dropdown-menu">
                 <a class="dropdown-item" tabindex="-1" href="{{ route('druang') }}">Daftar Ruang</a>
                 <a class="dropdown-item" tabindex="-1" href="{{ route('dmatkul') }}">Daftar Matkul</a>
                 <a class="dropdown-item" tabindex="-1" href="{{ route('dprodi') }}">Daftar Program Studi</a>
                 <a class="dropdown-item" tabindex="-1" href="{{ route('kurikulum') }}">Daftar Kurikulum</a>
                 <a class="dropdown-item" tabindex="-1" href="{{ route('periode') }}">Daftar Periode</a>
                 <a class="dropdown-item" tabindex="-1" href="{{ route('dosen') }}">Daftar Dosen</a>
             </div>
         </li>
		 <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ route('pmban') }}" style="color: white" class="nav-link">Data PMB</a>
         </li>
		  <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ route('statustrx') }}" style="color: white" class="nav-link">Pembayaran SPP</a>
         </li>
         {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
     </ul>
     <ul class="navbar-nav ml-auto">
         <li class="nav-item d-none d-sm-inline-block float-right">
             <a href="{{ route('signout') }}" style="color: white" class="nav-link">Logout</a>
         </li>
     </ul>
     <!-- Right navbar links -->
     {{-- <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul> --}}
 </nav>
 <style>
    .content-wrapper{
        padding:50px;
        padding-top:0px;
    }
   </style>
 <!-- /.navbar -->
