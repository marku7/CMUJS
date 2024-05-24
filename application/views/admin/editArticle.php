<link rel="stylesheet" href="../../assets/css/form.css">
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../../assets/css/button.css">
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<body id="body">
    <div class="container">  
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="article">Article Management</a>
          <a href="">Add New Article</a>
          <a class="active_link" href="#"></a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <img width="30" src="../../assets/img/admin.png" alt="" />
          </a>
        </div>
      </nav>
      <main>
    <div class="main__container">
    <?php echo validation_errors(); ?>
    <form action="<?php echo site_url('admin/updateArt/' . $article['articleNo']); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="artid" value="<?php echo $article['articleNo']; ?>"> 
<div class="nice-form-group">
  <label>Article Title</label>
  <input type="text" placeholder="Title" name="title" value="<?php echo $article['title']; ?>" />
</div>

<div class="nice-form-group">
  <label>Key Words</label>
  <textarea placeholder="Key Words" name="keywords"><?php echo isset($article) ? $article['keywords'] : '' ?></textarea>
</div>

<div class="nice-form-group">
  <label>Abstract</label>
  <textarea placeholder="Abstract" id="editor1" name="abstract"><?php echo isset($article) ? $article['abstract'] : '' ?></textarea>
</div>

<div class="nice-form-group">
  <label>Digital Object Identifies</label>
  <input type="text" name="doi" placeholder="DOI" value="<?php echo $article['doi']; ?>"/>
</div>

<div class="nice-form-group">
    <label>Volume</label>
    <select name="volumeid">
    <?php foreach ($volumes as $volume): ?>
      <option value="<?php echo $volume['volumeid']; ?>" <?php echo ($volume['volumeid'] == 1) ? 'selected' : ''; ?>>
        <?php echo $volume['vol_name']; ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>

<br>

<button class="button" type="submit">
  <span class="button-text">Submit</span>
  <div class="fill-container"></div>
</button>
</form>
</div>
</main>

