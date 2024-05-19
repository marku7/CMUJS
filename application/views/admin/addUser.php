<link rel="stylesheet" href="../assets/css/form.css">
<link rel="stylesheet" href="../assets/css/style.css">
<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="user">User Management</a>
          <a class="active_link" href="">Register New User</a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <img width="30" src="../assets/img/admin.png" alt="" />
          </a>
        </div>
      </nav>
      <main>
    <div class="main__container">
    <?php echo validation_errors(); ?>

    <?php echo form_open('admin/addUser'); ?>
        <form action="">
<div class="nice-form-group">
  <label>Email</label>
  <input type="email" placeholder="Email Address" name="email" value="" />
</div>

<div class="nice-form-group">
  <label>Full Name</label>
  <input type="text" placeholder="Full Name" name="name" value="" />
</div>

<div class="nice-form-group">
  <label>Password</label>
  <input type="password" name="password" placeholder="Password" />
</div>

<div class="nice-form-group">
  <label>User Role</label>
  <div class="radio-horizontal">
    <div>
      <input type="radio" id="author" name="role" value="1" checked>
      <label for="author">Author</label>
    </div>
    <div>
      <input type="radio" id="evaluator" name="role" value="2">
      <label for="evaluator">Evaluator</label>
    </div>
    <div>
      <input type="radio" id="researcher" name="role" value="3">
      <label for="researcher">Researcher</label>
    </div>
  </div>
</div>
<br>
<input type="hidden" name="user_id" value="<?php echo uniqid(); ?>">
<button class="button" type="submit">
  <span class="button-text">Submit</span>
  <div class="fill-container"></div>
</button>
</form>
</div>
</main>