<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Article Management</a>
          <a href="addArticle">Add New Article</a>
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
      <th scope="col">Volume</th>
      <th scope="col">Article Title</th>
      <th scope="col">Key Words</th>
      <th scope="col">DOI</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article): ?>
      <tr>
        <td><?php echo $article['vol_name']; ?></td>
        <td><?php echo $article['title']; ?></td>
        <td><?php echo $article['keywords']; ?></td>
        <td><?php echo $article['doi']; ?></td>
        <td style="font-size: 18px;">
            <a href="<?php echo base_url('admin/viewArt/'.$article['articleid']); ?>" title="View Article"><i class="fa fa-expand" aria-hidden="true"></i></a>
          <a href="<?php echo base_url('admin/updateArt/'.$article['articleid']); ?>" title="Edit Article"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <?php if ($article['isPublished'] == 0): ?>
            <a href="#" class="publish-article" data-id="<?php echo $article['articleid']; ?>" title="Publish Article"><i class="fa fa-eye" aria-hidden="true"></i></a>
          <?php else: ?>
            <a href="#" class="unpublish-article" data-id="<?php echo $article['articleid']; ?>" title="Unpublish Article"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
          <?php endif; ?>
          <?php if ($article['feature'] == 0): ?>
            <a href="#" class="tag-highlight" data-id="<?php echo $article['articleid']; ?>" title="Highlight Article"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
          <?php else: ?>
            <a href="#" class="untag-highlight" data-id="<?php echo $article['articleid']; ?>" title="Untag Highlight"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
          <?php endif; ?>
          <a href="#" class="archive-article" data-id="<?php echo $article['articleid']; ?>" title="Archive Article"><i class="fa fa-archive" aria-hidden="true"></i></a>
          <a href="<?php echo base_url('admin/removeArticle/'.$article['articleid']); ?>" title="Remove Article"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.publish-article').forEach(function(publishLink) {
        publishLink.addEventListener('click', function(event) {
            event.preventDefault();
            const articleId = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/publishArticle/'); ?>' + articleId, {
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
                    alert('Failed to publish the article.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.unpublish-article').forEach(function(unpublishLink) {
        unpublishLink.addEventListener('click', function(event) {
            event.preventDefault();
            const articleId = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/unpublishArticle/'); ?>' + articleId, {
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
                    alert('Failed to unpublish the article.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.tag-highlight').forEach(function(publishLink) {
        publishLink.addEventListener('click', function(event) {
            event.preventDefault();
            const articleId = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/tagArticle/'); ?>' + articleId, {
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
                    alert('Failed to tag the article.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.untag-highlight').forEach(function(publishLink) {
        publishLink.addEventListener('click', function(event) {
            event.preventDefault();
            const articleId = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/untagArticle/'); ?>' + articleId, {
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
                    alert('Failed to untag the article.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.archive-article').forEach(function(archiveLink) {
        archiveLink.addEventListener('click', function(event) {
            event.preventDefault();
            const articleId = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/archiveArticle/'); ?>' + articleId, {
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
                    alert('Failed to archive the article.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>
