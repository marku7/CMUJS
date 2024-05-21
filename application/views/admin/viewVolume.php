<style>
* {
  box-sizing: border-box;
}

html, body {
  font-family: "Lato", sans-serif;
  margin: 0;
  padding: 0 !important;
  background: #f1f1f1;
  height: 100%;
}

.container {
  display: flex;
  flex-direction: column;
  height: 100vh;
  margin: 0;
  padding: 0;
  width: 100%;
}

.navbar {
  flex: 0 0 auto;
}

#sidebar {
  flex: 0 0 auto;
}

.main {
  flex: 1 0 auto;
  display: flex;
  flex-direction: column;
}

.leftcolumn {
  flex: 1;
  width: 100%;
}

.card {
  background-color: white;
  padding: 20px;
  margin-top: 10px;
  width: 100% !important;
  height: 100% !important;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  flex: 1 0 auto; /* Allow card to grow and take remaining space */
}

.row {
  display: flex;
  flex: 1 0 auto; /* Allow row to grow and take remaining space */
}

.article-content {
  display: flex;
  flex-direction: column;
  margin-top: -70px;
}

.article-details {
  margin-top: 10px;
}

@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
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
          <a  href="../volume">Volume Management</a>
          <a href="../addVolume">Add New Volume</a>
          <a class="active_link" href="#">View Article</a>
        </div>
      </nav>
      
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="../../assets/img/js.png" alt="logo" />
            <h1>CMU JS</h1>
          </div>
        </div>
                  
        <div class="sidebar__menu">
          <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="../index">Dashboard</a>
          </div>
          <h2>Management</h2>
          <div class="sidebar__link">
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
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-book"></i>
            <a href="<?php echo base_url('admin/volume'); ?>">Volume Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-newspaper-o"></i>
            <a href="<?php echo base_url('admin/archive'); ?>">Archive Management</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="<?php echo base_url(" ") ?>">Log out</a>
          </div>
        </div>
      </div>

      <main>
<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css'); ?>">
<div class="row">
  <div class="leftcolumn">
    <div class="card" >
      <h1><?php echo $volume['vol_name']; ?></h1>
      <h5><?php echo $volume['date_at']; ?></h5><br>
      <div class="card" style="width: 100%;">
        <div class="article-content">
          <img src="<?php echo base_url('assets/img/archiveIMG.png'); ?>" alt="Volume Image" width="200px">
          <div class="article-details">
            <p><i><b></b></i><?php echo $volume['description']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
</div>