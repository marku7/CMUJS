<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Article Management</a>
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
              <h1>Manage Articles</h1>
              <p>List of All Articles</p>
              <br>
            </div>
          </div>
  <thead>
    <tr>
      <th scope="col">Article ID</th>
      <th scope="col">Article Title</th>
      <th scope="col">volume ID</th>
      <th scope="col">Key Words</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article): ?>
      <tr>
        <td><?php echo $article['articleid']; ?></td>
        <td><?php echo $article['title']; ?></td>
        <td><?php echo $article['volumeid']; ?></td>
        <td><?php echo $article['keywords']; ?></td>
        <td><a href="#" title="Edit Article"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#" title="View Article"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a href="" title="Archive Article"><i class="fa fa-archive" aria-hidden="true"></i></a>
        <a href="#" title="Remove Article"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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