<link rel="stylesheet" href="../assets/css/form.css">
<link rel="stylesheet" href="../assets/css/style.css">
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="article">Article Management</a>
          <a class="active_link" href="">Add New Article</a>
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

    <?php echo form_open('admin/addArticle'); ?>
<div class="nice-form-group">
  <label>Article Title</label>
  <input type="text" placeholder="Title" name="title" value="" />
</div>

<div class="nice-form-group">
  <label>Key Words</label>
  <textarea placeholder="Key Words" name="keywords" value=""></textarea>
</div>

<div class="nice-form-group">
  <label>Abstract</label>
  <textarea placeholder="Abstract" id="editor1" name="abstract" value=""></textarea>
</div>

<div class="nice-form-group">
  <label>Digital Object Identifies</label>
  <input type="text" name="doi" placeholder="DOI" />
</div>

<div class="nice-form-group">
  <label>Volume</label>
    <div class="radio-horizontal">
      <?php foreach ($volumes as $volume): ?>
        <div>
          <input type="radio" id="<?php echo $volume['volumeid']; ?>" name="volumeid" value="<?php echo $volume['volumeid']; ?>" <?php echo ($volume['volumeid'] == 1) ? 'checked' : ''; ?>>
            <label for="<?php echo $volume['volumeid']; ?>"> <?php echo $volume['vol_name']; ?></label>
        </div>
      <?php endforeach; ?>
        </div>
 </div>
<input type="hidden" name="articleid" value="<?php echo uniqid(); ?>">
<br>
<button class="button" type="submit">
  <span class="button-text">Submit</span>
  <div class="fill-container"></div>
</button>
</div>
</main>