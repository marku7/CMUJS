<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="user">User Management</a>
          <a href="addUser">Register New User</a>
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
              <h1>Manage User</h1>
              <p>List of All Users</p>
          <br>
      </div>
    </div>
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?php echo $user['complete_name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>
          <?php
          switch ($user['role']) {
              case 1:
                  echo "Author";
                  break;
              case 2:
                  echo "Researcher";
                  break;
              case 3:
                  echo "Evaluator";
                  break;
              default:
                  echo "Unknown";
                  break;
          }
          ?>
      </td>
      <td style="text-decoration: none;">
      <?php if ($user['status'] == 0): ?>
          <a href="<?php echo base_url('admin/enableUser/'.$user['userid']); ?>" title="Enable User"><i class="fa fa-toggle-off" aria-hidden="true" style="color: #F1BD07; font-size: 24px;"></i></a>
        <?php else: ?>
          <a href="<?php echo base_url('admin/disableUser/'.$user['userid']); ?>" title="Disable User"><i class="fa fa-toggle-on" aria-hidden="true" style="color: #F1BD07; font-size: 24px;"></i></a>
        <?php endif; ?>
      </td>
        <td><a href="<?php echo base_url('admin/updateNow/'.$user['userid']); ?>" title="Edit User"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
        <a href="<?php echo base_url('admin/viewUser/'.$user['userid']); ?>" title="View User" ><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a href="<?php echo base_url('admin/removeUser/'.$user['userid']); ?>" title="Remove User"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    <?php endforeach; ?>  
  </tbody>
</table>
</div>
</main>