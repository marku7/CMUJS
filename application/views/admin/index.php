  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Admin</a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          <a href="#">
          <img width="30" src="../assets/img/admin.png" alt="" />
          </a>
        </div>
      </nav>
      <main>
        <div class="main__container">
          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>CMU Journal of Science</h1>
              <p>Administrator dashboard</p>
            </div>
          </div>
          <div class="main__cards">
            <div class="card">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Number of Users</p>
                <span class="font-bold text-title"><?= $total_users ?></span>
              </div>
            </div>
            <div class="card">
              <i class="fa fa-newspaper-o fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Number of Articles</p>
                <span class="font-bold text-title"><?= $total_articles ?></span>
              </div>
            </div>
            <div class="card">
              <i class="fa fa-archive fa-2x text-yellow"
                aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Number of Archives</p>
                <span class="font-bold text-title"><?= $total_archives ?></span>
              </div>
            </div>
            <div class="card">
              <i class="fa fa-address-book-o fa-2x text-green"
                aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Number of Authors</p>
                <span class="font-bold text-title"><?= $total_authors ?></span>
              </div>
            </div>
          </div>
        </div>
      </main>