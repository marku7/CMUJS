<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Volume Management</a>
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
      <th scope="col">Date Added</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($volumes as $volume): ?>
      <tr>
        <td><?php echo $volume['volumeID']; ?></td>
        <td><?php echo $volume['volumeName']; ?></td>
        <td><?php echo $volume['date_added']; ?></td>
        <td><a href="#" title="Edit Volume" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="" title="View Volume"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a href="#" title="Remove Volume"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</main>
<div class="modal" style="display: none;" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>