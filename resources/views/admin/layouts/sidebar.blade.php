<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ 'dashboard' }}">Activity</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">ATVM</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
          <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">จัดการข้อมูล</li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>จัดการข้อมูลผู้ใช้</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('student.manage') }}">ข้อมูลนักศึกษา</a></li>
          <li><a class="nav-link" href="{{ route('coordinator.manage') }}">ข้อมูลฝ่ายกิจกรรม</a></li>
          <li><a class="nav-link" href="{{ route('professor.manage') }}">ข้อมูลอาจารย์</a></li>
          <li><a class="nav-link" href="{{ route('admin.manage') }}">ข้อมูลผู้ดูแล</a></li>
        </ul>
      </li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-table"></i><span>จัดการข้อมูลทั่วไป</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('area.manage') }}">จัดการข้อมูลสาขา</a></li>
          <li><a class="nav-link" href="{{ route('activity.manage') }}">จัดการข้อมูลกิจกรรม</a></li>
          <li><a class="nav-link" href="{{ route('activity.submitList') }}">จัดการข้อมูลลงทะเบียนกิจกรรม</a></li>
          <li><a class="nav-link" href="{{ route('file.manage') }}">จัดการข้อมูลเอกสาร</a></li>
        </ul>
      </li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>ข่าวสาร ประชาสัมพันธ์</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('news.manage') }}">จัดการข้อมูลข่าวสาร</a></li>
        </ul>
      </li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>รายงาน</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('reportcenter') }}">รายงาน</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
