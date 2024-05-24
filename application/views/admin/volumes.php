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
      <th scope="col">Volume Name</th>
      <th scope="col">Date Added</th>
      <th scope="col">Status</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($volumes as $volume): ?>
      <tr>
        <td><?php echo $volume['vol_name']; ?></td>
        <td><?php echo $volume['date_at']; ?></td>
        <td style="text-decoration: none;"><?php if ($volume['published'] == 0): ?>
            <a href="#" class="publish-volume" data-id="<?php echo $volume['volumeid']; ?>" title="Publish Volume"><i class="fa fa-eye" aria-hidden="true" style="color: #F1BD07; font-size: 20px;"></i></a>
          <?php else: ?>
            <a href="#" class="unpublish-volume" data-id="<?php echo $volume['volumeid']; ?>" title="Unpublish Volume"><i class="fa fa-eye-slash" aria-hidden="true" style="color: #F1BD07; font-size: 20px;"></i></a>
          <?php endif; ?></td>
        <td><a href="<?php echo base_url('admin/viewVolume/'.$volume['volumeid']);?>" title="Edit Volume"><i class="fa fa-expand" aria-hidden="true"></i></a>
        <a href="<?php echo base_url('admin/updateVolume/'.$volume['volumeid']);?>" title="Edit Volume"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#" class="archive-volume" data-id="<?php echo $volume['volumeid']; ?>" title="Archive Volume"><i class="fa fa-archive" aria-hidden="true"></i></a>
        <a href="<?php echo base_url('admin/removeVol/'.$volume['volumeid']); ?>" title="Remove Volume"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.publish-volume').forEach(function(publishLink) {
        publishLink.addEventListener('click', function(event) {
            event.preventDefault();
            const volumeID = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/publishVolume/'); ?>' + volumeID, {
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
                    alert('Failed to publish the volume.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.unpublish-volume').forEach(function(unpublishLink) {
        unpublishLink.addEventListener('click', function(event) {
            event.preventDefault();
            const volumeID = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/unpublishVolume/'); ?>' + volumeID, {
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
                    alert('Failed to unpublish the volume.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.archive-volume').forEach(function(archiveLink) {
        archiveLink.addEventListener('click', function(event) {
            event.preventDefault();
            const volumeID = this.getAttribute('data-id');

            fetch('<?php echo base_url('admin/archiveVolume/'); ?>' + volumeID, {
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
                    alert('Failed to archive the volume.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>