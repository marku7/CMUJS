<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Volume Management</a>
          <a href="addVolume">Create New Volume</a>
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
              <h1>Manage Volumes</h1>
              <p>List of All Volumes Released</p>
              <br>
            </div>
          </div>
  <thead>
    <tr>
      <th scope="col">Volume ID</th>
      <th scope="col">Volume Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Added</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($volumes as $volume): ?>
      <tr>
        <td><?php echo $volume['volumeid']; ?></td>
        <td><?php echo $volume['vol_name']; ?></td>
        <td><?php echo $volume['description']; ?></td>
        <td><?php echo $volume['date_at']; ?></td>
        <td><a href="<?php echo base_url('admin/editVolume/'.$volume['volumeid']);?>" title="Edit Volume"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="" title="View Volume"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a href="<?php echo base_url('admin/removeVol/'.$volume['volumeid']); ?>" title="Remove Volume"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</main>