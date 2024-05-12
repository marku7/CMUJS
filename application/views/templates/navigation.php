<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img src="assets/img/js.png" alt="CMU Journal Logo" style="height: 50px; width: auto; margin-right: 5px;">
      CMU Journal of Science <p style="font-size: 12px; margin-left: 60px; margin-top: -15px;"><i>by Mark Yaba</i></p>
    </a>
    
    <div class="collapse navbar-collapse" id="navbarColor01" style="margin-left: 300px;">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?php echo $active_page === 'home' ? 'active' : ''; ?>" href="<?php echo base_url('home'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active_page === 'announcements' ? 'active' : ''; ?>" href="<?php echo base_url('announcements'); ?>">Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active_page === 'issues' ? 'active' : ''; ?>" href="<?php echo base_url('issues'); ?>">Current Issue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active_page === 'archives' ? 'active' : ''; ?>" href="<?php echo base_url('archives'); ?>">Archives</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active_page === 'about' ? 'active' : ''; ?>" href="<?php echo base_url('about'); ?>">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="login">Login</a>
            <a class="dropdown-item" href="<?php echo base_url("login") ?>">Register</a>
            <a class="dropdown-item" href="<?php echo base_url("admin/index") ?>">Logout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
