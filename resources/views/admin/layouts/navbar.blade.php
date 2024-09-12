
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav ml-auto">
    
        <li class="dropdown">
            @php
                $user = getAuthenticatedUser();
            @endphp
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if ($user && $user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Avatar">
                @endif
                @if ($user)
                    <div>{{ $user->firstName }} {{ $user->lastName }}</div>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('dashboard.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> โปรไฟล์
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> ล็อกเอ้าท์
                </a>
            </div>
            
        </li>
    </ul>
</nav>
