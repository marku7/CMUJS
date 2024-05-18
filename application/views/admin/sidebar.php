
<div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="../assets/img/js.png" alt="logo" />
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
          <div class="sidebar__link <?php echo $active_page === 'dashboard' ? 'active_menu_link' : ''; ?>">
            <i class="fa fa-home"></i>
            <a href="index">Dashboard</a>
          </div>
          <h2>Management</h2>
          <div class="sidebar__link <?php echo $active_page === 'user' ? 'active_menu_link' : ''; ?>">
          <i class="fa fa-user" aria-hidden="true"></i>
          <a href="user">User Management</a>
          </div>
          <div class="sidebar__link <?php echo $active_page === 'article' ? 'active_menu_link' : ''; ?>">
            <i class="fa fa-newspaper-o"></i>
            <a href="article">Article Management</a>
          </div>
          <div class="sidebar__link <?php echo $active_page === 'author' ? 'active_menu_link' : ''; ?>">
            <i class="fa fa-address-book-o"></i>
            <a href="author">Author Management</a>
          </div>
          <div class="sidebar__link <?php echo $active_page === 'volume' ? 'active_menu_link' : ''; ?>">
            <i class="fa fa-book"></i>
            <a href="volume">Volume Management</a>
          </div>
          <div class="sidebar__link <?php echo $active_page === 'archive' ? 'active_menu_link' : ''; ?>">
            <i class="fa fa-newspaper-o"></i>
            <a href="archive">Archive Management</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="<?php echo base_url(" ") ?>">Log out</a>
          </div>
        </div>
      </div>
      