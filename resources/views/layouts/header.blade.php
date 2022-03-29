<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Administrator</span>
                        <span class="text-muted text-xs block">More <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="/profil-admin">Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{url('dashboard')}}"><i class="fa fa-laptop"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ request()->is('pengaduan') ? 'active' : '' }}">
                <a href="{{url('pengaduan')}}"><i class="fa fa-bug"></i> <span class="nav-label">Pengaduan</span></a>
            </li>
            @if(Auth::user()->role == "admin")
            <li class="{{ request()->is('categories') ? 'active' : '' }}">
                <a href="{{url('categories')}}"><i class="fa fa-server"></i> <span class="nav-label">Categori</span></a>
            </li>
            <li class="{{ request()->is('user') ? 'active' : '' }}">
                <a href="{{url('user')}}"><i class="fa fa-user"></i> <span class="nav-label">User</span></a>
            </li>
            @endif
        </ul>
    </div>
</nav>
<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang Di Lembaga Pengaduan</span>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
    </div>
