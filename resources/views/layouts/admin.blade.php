<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'LEMS')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Allow page-specific styles/scripts to be injected -->
    @stack('head')
 <style>
      /* body { min-height: 100vh; display: flex; }
      .sidebar {
        width: 200px;
        background: #343a40;
        color: white;
        transition: width 0.3s ease;
      } */
      html, body {
          height: 100%;
          margin: 0;
          overflow: hidden;
      }

      body {
          display: flex;
          font-family: sans-serif;
      }

      .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        overflow-y: auto;
        overflow: visible; /* allow tooltip to show outside */
        z-index: 1000;     /* make sure it's on top */
        background: #343a40;
        color: white;
        transition: width 0.3s ease;
      }

      .content-wrapper {
          margin-left: 200px; /* same as sidebar width */
          transition: margin-left 0.3s ease;
          flex-grow: 1;
          height: 100vh;
          display: flex;
          flex-direction: column;
          overflow: hidden;
      }

      .content {
        flex-grow: 1;
        padding: 1rem;
        /* overflow: auto; */
        overflow-y: auto;
        transform: translateY(10px); /* slide up effect */
        transition: opacity 0.4s ease, transform 0.4s ease;
      }

      .sidebar a { color: #adb5bd; text-decoration: none; }
      .sidebar a.active,
      .sidebar a:hover { background: #495057; color: white; }
      .content-wrapper { flex-grow: 1; display: flex; flex-direction: column; }
      .topbar {
        height: 40px;              /* force a shorter bar */
        padding: 0.25rem 1rem;     /* less vertical padding */
        background: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
      }

      .sidebar.collapsed {
        width: 60px;
      }

      .sidebar.collapsed ~ .content-wrapper {
          margin-left: 60px;
      }

      .sidebar .toggle-btn {
        background: #222;
        color: white;
        border: none;
        padding: 10px;
        text-align: right;
        cursor: pointer;
      }

      .menu {
        flex: 1;
        padding: 10px 0;
      }

      .menu-item {
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.2;
        display: flex;
        align-items: center;
        cursor: pointer;
        position: relative;
        transition: padding 0.3s ease, justify-content 0.3s ease;
      }

      .menu-item:hover {
        background-color: #333;
      }

      .menu-item i {
        width: 20px;
        text-align: center;
      }

      /* Prevent span overflow in general */
      .menu-item span {
        display: inline-block;
        opacity: 1;
        width: auto;
        overflow: hidden;
        white-space: nowrap;
        transition: opacity 0.3s ease, width 0.3s ease;
      }

      /* Hide labels when sidebar is collapsed */
      .sidebar.collapsed .menu-item span {
        opacity: 0;
        width: 0;
      }

      /* Center icons */
      .sidebar.collapsed .menu-item {
        justify-content: center;
        gap: 0;
        padding-left: 0.5rem;
        padding-right: 0;
      }


      /* Tooltip on hover */
      .sidebar.collapsed .menu-item:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        top: 50%;
        left: calc(100% + 8px);
        transform: translateY(-50%);
        background: #333;
        color: #fff;
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 4px;
        white-space: nowrap;
        z-index: 1000;
        pointer-events: none;
      }


      .system-logo {
        max-height: 80px;
        transition: max-height 0.3s ease, transform 0.3s ease;
      }

      .sidebar.collapsed .system-logo {
        max-height: 40px !important;
        transform: scale(0.9);
      }

      .system-name {
        transition: opacity 0.3s ease, width 0.3s ease;
        white-space: nowrap;
        overflow: hidden;
      }
      .sidebar.collapsed .system-name {
         opacity: 0;
         width: 0;
      }


      .main-content {
        flex: 1;
        padding: 20px;
        color: white;
      }
      .topbar {
        /* background: linear-gradient(to right, #00C6C2, #33A9E5,rgb(138, 57, 239)); */
      }

      /*.sticky-header {
          position: sticky;
          top: 0;
          z-index: 1030; /* higher than most components */
          /*background-color: #fff; /* needed to avoid transparency */
          /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      } */

      .topbar h3 {
        margin-bottom: 1;          
        /* font-size: 1rem;*/
      }
      .topbar .btn {
        padding: 0.25rem 0.5rem;   /* smaller button padding */
      }
      .topbar .btn i {
        font-size: 1.25rem;        /* ~20px icons */
      }

      .text-ellipsis {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
      }

      /* Compact table style */
      .table-compact th,
      .table-compact td {
          padding: 0.2rem 0.4rem;       /* Minimal vertical and horizontal padding */
          font-size: 0.85rem;           /* Optional: adjust font size */
          line-height: 1.2;             /* Reduce space inside each row */
          vertical-align: middle;       /* Align text vertically */
      }

    </style>

    @stack('head')
</head>
<body>

  <!-- Sidebar -->
  <nav class="sidebar d-flex flex-column p-3" id="sidebar">
    <div class="text-center">
      <!-- Logo -->
      <img
        src="{{ asset('images/developer.png') }}"
        alt="Email Sender Logo"
        class="system-logo mx-auto d-block mb-3"
        style="max-height: 80px;"
      >

      <!-- System Name -->
      <h4 class="system-name text-white mb-4">Email Sender</h4>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item mb-1">
        <a href="{{ route('admin.dashboard') }}"
          class="menu-item nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
          data-tooltip="Dashboard">
          <i class="bi bi-speedometer2 me-2"></i><span> Dashboard</span>
        </a>
      </li>
      <li class="nav-item mb-1">
        <a href="{{ route('register.form') }}"
          class="menu-item nav-link {{ request()->routeIs('register.form') ? 'active' : '' }}"
          data-tooltip="Register">
          <i class="bi bi-person-plus-fill me-2"></i><span> Register</span>
        </a>
      </li>
      <li class="nav-item mb-1">
        <a href="{{ route('users.index') }}"
          class="menu-item nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
          data-tooltip="Registered Users">
          <i class="bi bi-people-fill me-2"></i><span> Registered Users</span>
        </a>
      </li>
      <li class="nav-item mb-1">
        <a href="{{ route('email.logs') }}"
          class="menu-item nav-link {{ request()->routeIs('email.logs') ? 'active' : '' }}"
          data-tooltip="Email Audit Log">
          <i class="bi bi-clipboard-check-fill me-2"></i><span> Email Audit Log</span>
        </a>
      </li>
      <li class="nav-item mb-1">
          <a href="{{ route('email.custom.form') }}"
            class="menu-item nav-link {{ request()->routeIs('email.custom.form') ? 'active' : '' }}"
            data-tooltip="Custom Email">
              <i class="bi bi-chat-square-text-fill me-2"></i><span> Custom Email</span>
          </a>
      </li>
      <!-- <li class="nav-item">
        <a href="{{ route('users.index') }}"
          class="menu-item nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
          data-tooltip="Email Sender">
          <i class="bi bi-envelope-fill me-2"></i><span> Email Sender</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="#"
          class="menu-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
          data-tooltip="About"
          data-bs-toggle="modal"
          data-bs-target="#aboutModal">
          <i class="bi bi-info-circle-fill me-2"></i><span> About</span>
        </a>
      </li>
    </ul>

    <hr>
    <!-- Logout Menu Item -->
    <div>
        <a href="#" 
        class="menu-item d-flex align-items-center text-white text-decoration-none rounded px-4 py-1"
        data-bs-toggle="modal"
        data-bs-target="#logoutModal"
        data-tooltip="Logout">
        <i class="bi bi-box-arrow-right me-2"></i><span> Logout</span>
      </a>
    </div>
  </nav>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      
      <div class="modal-footer">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <!-- Modern-style Cancel button -->
          <button type="button"
                  class="btn btn-sm border border-primary text-primary bg-white"
                  data-bs-dismiss="modal">
            Cancel
          </button>

          <!-- Primary-style Logout button -->
          <button type="submit" class="btn btn-primary btn-sm">
            Logout
          </button>
        </form>
      </div>

    </div>
  </div>
</div>



   <!-- Content + Topbar Wrapper -->
  <div class="content-wrapper">
      
    <!-- Topbar -->
    <nav class="topbar d-flex align-items-center m-0 sticky-header" style="padding: 10px 16px;">
      <!-- Sidebar Toggle -->
      <button id="toggleSidebar" class="toggle-btn btn btn-outline-secondary me-2 m-0" onclick="toggleSidebar()" 
              style="padding: 2px 6px; font-size: 0.75rem; line-height: 1;">
        <i class="bi bi-list"></i>
      </button>


      <!-- Page Title -->
      <h3 class="mb-0 text-truncate text-ellipsis">
        Admin Dashboard
      </h3>


      <div class="ms-auto d-flex align-items-center">
        <!-- Notification Icon -->
        <button class="btn position-relative me-2">
          <i class="bi bi-bell"></i>
          <!-- <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
          </span> -->
        </button>
        <!-- User Icon -->
        <button class="btn">
          <i class="bi bi-person-circle"></i>
        </button>
      </div>
    </nav>

    <!-- About Modal -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalLabel">About</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              
              <div class="modal-body">
                <!-- System Info -->
                <h6>System Features & Purpose</h6>
                <ul class="small mb-4">
                  <li>Sends batch or individual emails to selected users</li>
                  <li>Maintains an audit log of every sent email (recipient, subject, timestamp)</li>
                  <li>Filter, search and paginate through email logs</li>
                  <li>Register new users directly from the admin dashboard</li>
                  <li>Real-time notifications for successful or failed sends</li>
                </ul>
                <p class="small">
                  This application streamlines your communication workflow by letting you compose, send, and track emails—all from one intuitive dashboard.
                </p>

                <!-- Developer Info -->
                <div class="text-center">
                  <img
                    src="{{ asset('images/developer.png') }}"
                    alt="App Mailer Logo"
                    class="mx-auto d-block mb-3"
                    style="max-height: 80px;"
                  >
                  <h6>Developer</h6>
                  <p class="small mb-0">
                    <strong>Leonard T. Domingo</strong> <br> 
                    Bachelor of Science in Information Technology<br>
                    <a href="mailto:leonardtdomingovida@gmail.com">leonardtdomingovida@gmail.com</a>
                  </p>
                </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div>

    <!-- Main Content -->
    <div class="content">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 mt-auto bg-light border-top" style="font-size: 0.85rem;">
      <div class="container">
        <span class="text-muted">© {{ date('Y') }} Learner and Employee Management System. All rights reserved.</span>
      </div>
    </footer>

  </div>
  <script>
    // Sidebar toggle logic
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('collapsed');
    }
    // const sidebar = document.getElementById('sidebar');
    // const contentWrapper = document.querySelector('.content-wrapper');

    // function toggleSidebar() {
    //   sidebar.classList.toggle('collapsed');
    //   if (sidebar.classList.contains('collapsed')) {
    //     contentWrapper.style.marginLeft = '60px';
    //   } else {
    //     contentWrapper.style.marginLeft = '200px';
    //   }
    // }


    // const sidebar = document.getElementById('sidebar');
    // const toggleBtn = sidebar.querySelector('.toggle-btn i');

    // function toggleSidebar() {
    //   sidebar.classList.toggle('collapsed');
    // }
  </script>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('scripts')
</body>
</html>
