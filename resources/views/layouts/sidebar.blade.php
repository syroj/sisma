<!-- sidebar -->
    <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <!-- dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('/home')}}">
                <i class="nav-icon fa fa-desktop"></i> Dashboard
              </a>
            </li>
            <!-- data sekolh -->
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle">
                <i class="nav-icon fa fa-home"></i>Data Sekolah</a>
             <ul class="nav-dropdown-items">
              <li class="nav-item">
                  <a class="nav-link" href="{{url('struktur')}}">
                    <i class="nav-icon fa fa-sitemap"></i> Struktur Organisasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('staf')}}">
                    <i class="nav-icon fa fa-users"></i> Staf</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('data_guru')}}">
                    <i class="nav-icon fa fa-user-circle"></i> Guru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="data_siswa">
                    <i class="nav-icon fa fa-vcard"></i> Siswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('kbm')}}">
                    <i class="nav-icon fa fa-university"></i> Proses KBM
                  </a>
                </li>    
              </ul>
            </li>
            <!-- nilai -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('nilai')}}">
                <i class="nav-icon fa fa-edit"></i> Nilai
              </a>
            </li>
            <!-- presensi -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('presensi')}}">
                <i class="nav-icon fa fa-book"></i> Presensi
              </a>
            </li>
            <!-- guru -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('guru')}}">
                <i class="nav-icon fa fa-briefcase"></i> Guru
              </a>
            </li>
            <!-- siswa -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('siswa')}}">
                <i class="nav-icon fa fa-users"></i> Siswa
              </a>
            </li>
            <!-- tata usaha -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('tu')}}">
                <i class="nav-icon fa fa-gear"></i> Tata Usaha
              </a>
            </li>
            <!-- bendahara -->
            <li class="nav-item">
              <a class="nav-link" href="{{url('bendahara')}}">
                <i class="nav-icon fa fa-money"></i> Bendahara
              </a>
            </li>
            
            <li class="divider"></li>
            <li class="nav-title"><span><i class="fa fa-gear"> </i></span> Setting Aplikasi</li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('setting')}}">
                <i class="nav-icon fa fa-wrench"></i> Setting</a>
            </li>
            
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <!-- end sidebar -->
