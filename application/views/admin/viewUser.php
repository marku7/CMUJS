<style>
* {
  box-sizing: border-box;
}

html, body {
  font-family: "Lato", sans-serif;
  margin: 0; 
  padding: 0; 
  background: #f1f1f1;
  height: 100%;
}

.container {
  margin: 0; 
  padding: 0; 
  width: 100%; 
}

.leftcolumn {   
  float: left;
  width: 100%;
}

.card {
  background-color: white;
  padding: 0;
  margin-top: 10px;
  height: 100% !important;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

#sidebar {
  padding: 0;
}
</style>
</head>
<body>
<link rel="stylesheet" href="../../assets/css/style.css">
<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a  href="../user">User Management</a>
          <a href="../addUser">Register New User</a>
          <a class="active_link" href="">View User</a>
        </div>
      </nav>
      
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="../../assets/img/js.png" alt="logo" />
            <h1>CMU JS</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
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
              <h1><?php echo $user['complete_name']; ?></h1>
              <?php
                switch ($user['role']) {
                    case 1:
                        echo "Author";
                        break;
                    case 2:
                        echo "Researcher";
                        break;
                    case 3:
                        echo "Evaluator";
                        break;
                    default:
                        echo "Unknown";
                        break;
                    }
                ?>
              <br>
            </div>
          </div>
          <div class="row">
            <div class="leftcolumn">
              <div class="card">
                <h2><?php echo $user['complete_name']; ?></h2>
                <h5><?php echo $user['email']; ?></h5>
                <p>About me jahsdkkhasydj jasjdhajs jashdljgkfg fghdfhd</p>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
</body>
</html>
