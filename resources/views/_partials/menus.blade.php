@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Users</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'educators.index' ? 'active' : '' }}" href="{{ route('educators.index') }}">
        <i class="fas fa-users text-dark"></i>
        <span class="nav-link-text">Data Pendidik</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'assignments.index' ? 'active' : '' }}" href="{{ route('assignments.index') }}">
        <i class="fas fa-building text-success"></i>
        <span class="nav-link-text">Data Penugasan Pendidik</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'certificates.index' ? 'active' : '' }}" href="{{ route('certificates.index') }}">
        <i class="fas fa-book text-warning"></i>
        <span class="nav-link-text">Data Riwayat Sertifikasi Pendidik</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'educations.index' ? 'active' : '' }}" href="{{ route('educations.index') }}">
        <i class="fas fa-book text-dark"></i>
        <span class="nav-link-text">Data Riwayat Pendidikan Formal Pendidik</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'childrens.index' ? 'active' : '' }}" href="{{ route('childrens.index') }}">
        <i class="fas fa-users text-success"></i>
        <span class="nav-link-text">Data Anak Pendidik</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'carriers.index' ? 'active' : '' }}" href="{{ route('carriers.index') }}">
        <i class="fas fa-book text-warning"></i>
        <span class="nav-link-text">Data Riwayat Karir Pendidik</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'students.index' ? 'active' : '' }}" href="{{ route('students.index') }}">
        <i class="fas fa-users text-danger"></i>
        <span class="nav-link-text">Data Siswa</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'achievements.index' ? 'active' : '' }}" href="{{ route('achievements.index') }}">
        <i class="fas fa-users text-dark"></i>
        <span class="nav-link-text">Data Prestasi Siswa</span>
    </a>
</li>
