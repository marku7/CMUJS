<link rel="stylesheet" href="../assets/css/form.css">
<link rel="stylesheet" href="../assets/css/style.css">
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="navbar__left">
          <a href="volume">Volume Management</a>
          <a class="active_link" href="">Create New Volume</a>
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

    <?php echo form_open('admin/addVolume'); ?>
        <form action="">
<div class="nice-form-group">
  <label>Volume Name</label>
  <input type="text" placeholder="Volume Name" name="name" value="" />
</div>

<div class="nice-form-group">
  <label>Description</label>
  <textarea id="editor1" name="description" placeholder="Description" value=""></textarea>
</div>
<br>
<button class="button" type="submit">
  <span class="button-text">Submit</span>
  <div class="fill-container"></div>
</button>
</form>
</div>
</main>