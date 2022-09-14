<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('v/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">SPM</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">Menu</li>
        <li>
            <a href="{{ route('admin.index') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li> <a href="{{ route('supplier.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Supplier</a>
                </li>
                <li> <a href="{{ route('pejabat.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Pejabat</a>
                </li>
                <li> <a href="{{ route('dp.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Dasar
                        Pembayaran</a>
                </li>
                <li> <a href="{{ route('jd.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Jenis
                        Dokumen</a>
                </li>
                <li> <a href="{{ route('jenis-belanja.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Jenis
                        Belanja</a>
                </li>
                <li> <a href="{{ route('cb.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Cara Bayar</a>
                </li>
                <li> <a href="{{ route('js.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Jenis SPM</a>
                </li>
                <li> <a href="{{ route('jp.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Jenis Pembayaran</a>
                </li>
                <li> <a href="{{ route('sp.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Sifat Pembayaran</a>
                </li>
                <li> <a href="{{ route('sd.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Sumber Dana</a>
                </li>
                <li> <a href="{{ route('kw.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Kewenangan
                        Pelaksanaan</a>
                </li>
                <li> <a href="{{ route('ap.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Asal Penerimaan</a>
                </li>
                <hr>
                <li> <a href="{{ route('kw.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Akun</a>
                </li>
                <li> <a href="{{ route('ap.index') }}"><i class="bx bx-right-arrow-alt"></i>Data Kegiatan</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">SPP</div>
            </a>
            <ul>
                <li> <a href="{{ route('spp.list') }}"><i class="bx bx-right-arrow-alt"></i>Daftar SPP</a>
                </li>
                <li> <a href="{{ route('spp.index') }}"><i class="bx bx-right-arrow-alt"></i>SPP Baru</a>
                </li>

            </ul>
        </li>

        <li class="menu-label">Menu RKA-KL</li>
        <li>
            <a class="" href="{{ route('rkakl.index') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">RKA-KL</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Data RKA-KL</div>
            </a>
            <ul>
                <li> <a href="{{ route('kegiatan.index') }}"><i class="bx bx-right-arrow-alt"></i>Kegiatan</a>
                </li>
                <li> <a href="{{ route('akun.index') }}"><i class="bx bx-right-arrow-alt"></i>Akun</a>
                </li>

            </ul>
        </li>
        <li class="menu-label">Pengaturan Aplikasi</li>

        <li>
            <a href="{{ route('setting.index') }}">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Setting</div>
            </a>
        </li>
        <li class="menu-label">User Manejemen</li>

        <li>
            <a href="user-profile.html">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="timeline.html">
                <div class="parent-icon"> <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User</div>
            </a>
        </li>
        <li>
            <a onclick="logsout()" href="#">
                <div class="parent-icon"> <i class="bx bx-log-out-circle"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
            <form method="POST" id="flog" class="" action="{{ route('logout') }}">
                @csrf
            </form>
        </li>
    </ul>
    <!--end navigation-->
</div>
<script>
    function logsout() {
        var x = document.getElementById('flog');
        x.submit();
    }
</script>
