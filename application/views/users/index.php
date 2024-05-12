<h1 style="text-align: center;">Data Manipulation</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>

<?php
  foreach ($users as $user) {
    echo '<tr class="table-secondary">';
    echo '<th scope="row">' .$user['userid'] . '</th>';
    echo '<td>' .$user['username'] . '</td>';
    echo '<td>' .$user['fullname'] . '</td>';
    echo '<td>' .$user['email'] . '</td>';
    echo '<td><a href="#"><i class="fa-sharp fa-solid"></i></a></td>';
    echo '</tr>';
}
?>

  </tbody>
</table>
