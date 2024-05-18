<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Archive Management</a>
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
              <h1>Manage Achives</h1>
              <p>List of All Archive Articles</p>
              <br>
            </div>
          </div>
  <thead>
    <tr>
      <th scope="col">Archive ID</th>
      <th scope="col">Article Title</th>
      <th scope="col">DOI</th>
      <th scope="col">Volume Number</th>
      <th scope="col">Key Words</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($archives as $archive): ?>
      <tr>
        <td><?php echo $archive['articleid']; ?></td>
        <td><?php echo $archive['title']; ?></td>
        <td><?php echo $archive['doi']; ?></td>
        <td><?php echo $archive['volumeid']; ?></td>
        <td><?php echo $archive['keywords']; ?></td>
        <td>
          <a href="#" title="Edit Archived"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <a href="#" title="View Archived"><i class="fa fa-eye" aria-hidden="true"></i></a>
          <a href="#" class="unarchive-article" data-id="<?php echo $archive['articleid']; ?>" title="Unarchive Article"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a>
          <a href="#" title="Delete Archived Article"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
</tbody>

</table>
</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.unarchive-article').forEach(function(unarchiveLink) {
        unarchiveLink.addEventListener('click', function(event) {
            event.preventDefault();
            const articleId = this.getAttribute('data-id');
            
            if (confirm('Are you sure you want to unarchive this article?')) {
                fetch('<?php echo base_url('admin/unarchiveArticle/'); ?>' + articleId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        location.reload();
                    } else {
                        alert('Failed to unarchive the article.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});
</script>
