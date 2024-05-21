<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css'); ?>">
<body>
<div class="header-img">
  <img src="<?php echo base_url('assets/img/cover.png'); ?>" alt="Cover Image">
</div>
<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2><?php echo $article['title']; ?></h2>
      <div class="card" style="width: 100%;">
        <div class="article-content">
          <img src="<?php echo base_url('assets/img/articleIMG.png'); ?>" alt="Article Image" height="200px">
          <div class="article-details">
            <h4 style="font-weight: bold;">Volume <?php echo $article['volumeid']; ?></h4>
            <h6><?php echo $article['created_at']; ?></h6>
            <p><i><b>DOI:</b></i><?php echo $article['doi']; ?></p>
            <p><b>Keywords: </b><br><?php echo $article['keywords']; ?></p>
           <br><?php echo $article['abstract']; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <a href="about">
        <h2>About the Journal</h2>
      </a>
      <p>CMU Journal of Science publishes quality research outputs in the field of natural sciences, mathematics, engineering, and social sciences from local, national, and international contributors. It is a peer-reviewed multidisciplinary journal published annually by Central Mindanao University, Musuan, Maramag, Bukidnon, Philippines. This official scientific journal of the University is accredited by the Philippine Commission on Higher Education (CHED) as Category B and indexed in Philippine E-journals.</p>
    </div>
    <div class="card">
      <h3>Announcement</h3>
      <div class="fakeimg">Anouncement 1</div><br>
      <div class="fakeimg">Anouncement 2</div><br>
      <div class="fakeimg">Anouncement 3</div>
    </div>
    <div class="card">
      <h3>Volumes</h3>
      <a href="#">Volume 1</a>
    </div>
  </div>
</div>
