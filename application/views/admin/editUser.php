<link rel="stylesheet" href="../../assets/css/form.css">
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../../assets/css/button.css">
<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
      </nav>
      
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="../../assets/img/js.png" alt="logo" />
            <h1>CMU JS</h1>
          </div>
          <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
        </div>
                  
        <div class="sidebar__menu">
          <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="../index">Dashboard</a>
          </div>
          <h2>Management</h2>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="<?php echo base_url('admin/user'); ?>">User Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-newspaper-o"></i>
            <a href="<?php echo base_url('admin/article'); ?>">Article Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-address-book-o"></i>
            <a href="<?php echo base_url('admin/author'); ?>">Author Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-book"></i>
            <a href="<?php echo base_url('admin/volume'); ?>">Volume Management</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="<?php echo base_url(" ") ?>">Log out</a>
          </div>
        </div>
      </div>

      <main>
        <div class="main__container">
          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>Edit User</h1>
              <br>
            </div>
          </div>
          <?php echo validation_errors(); ?>
          <form action="<?php echo site_url('admin/updateNow/' . $user['userid']); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="userId" value="<?php echo $user['userid']; ?>"> 
            <div class="nice-form-group">
              <label>Email</label>
              <input type="email" placeholder="Email Address" name="email" value="<?php echo $user['email']; ?>" />
            </div>
            <div class="nice-form-group">
              <label>Full Name</label>
              <input type="text" placeholder="Full Name" name="name" value="<?php echo $user['complete_name']; ?>" />
            </div>
            <div class="nice-form-group">
              <label>Password</label>
              <input type="password" name="password" placeholder="Password" value="<?php echo $user['pword']; ?>" />
            </div>
            <br>
            <button class="button" type="submit">
              <span class="button-text">Save</span>
              <div class="fill-container"></div>
            </button>
          </form>
        </div>
      </main>
    </div>
</body>
