<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Author Management</a>
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
      <table class="table table-hover">
      <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>Manage Authors</h1>
              <p>List of All Authors</p>
              <br>
            </div>
          </div>
  <thead>
    <tr>
      <th scope="col">Author ID</th>
      <th scope="col">Author Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date Registered</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($authors as $author): ?>
      <tr>
        <td><?php echo $author['authorID']; ?></td>
        <td><?php echo $author['name']; ?></td>
        <td><?php echo $author['email']; ?></td>
        <td><?php echo $author['date_created']; ?></td>
        <td>
        <a href="<?php echo base_url('admin/viewAuthor/'.$author['authorID']); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a href="<?php echo base_url('admin/removeAuthor/'.$author['authorID']); ?>" title="Remove Author"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</main>