<link rel="stylesheet" href="../assets/css/form.css">
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
        <form action="">
<div class="nice-form-group">
  <label>Email</label>
  <input type="email" placeholder="Email Address" value="" />
</div>

<div class="nice-form-group">
  <label>Username</label>
  <input type="tel" placeholder="Username" value="" />
</div>

<div class="nice-form-group">
  <label>Full Name</label>
  <input type="url" placeholder="Full Name" value="" />
</div>

<div class="nice-form-group">
  <label>Password</label>
  <input type="password" placeholder="Password" />
</div>
<br>
<button class="button">
  <span class="button-text">Submit</span>
  <div class="fill-container"></div>
</button>
</form>
</div>
</main>