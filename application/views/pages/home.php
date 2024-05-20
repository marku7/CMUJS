<link rel="stylesheet" href="assets/css/home.css">
<body>
<div class="header-img">
  <img src="assets/img/cover.png" alt="Cover Image">
</div>
<div class="row">
  <div class="leftcolumn">
    <div class="card">
    <a href="articles">
    <h2>ARTICLES</h2>
    </a>
      <?php foreach ($articles as $article): ?>
        <div class="card" style="width: 100%;">
          <div class="article-content">
            <img src="assets/img/articleIMG.png" alt="Article Image" width="200px">
            <div class="article-details">
              <h4 style="font-weight: bold;"><?php echo $article['title']; ?></h4>
              <h6><?php echo $article['created_at']; ?></h6>
              <p><b><i>Volume <?php echo $article['volumeid']; ?></i><br></p></b>
              <p><i><b>DOI:</b></i><?php echo $article['doi']; ?></p>
              <p><b>Keywords: </b><br><?php echo $article['keywords']; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="card">
        <a href="#">
        <h2>ARCHIVES</h2>
        </a>
      <?php foreach ($archives as $archive): ?>
        <div class="card" style="width: 100%;">
          <div class="archive-content">
            <img src="assets/img/archiveIMG.png" alt="Archive Image" width="200px">
            <div class="archive-details">
            <h4 style="font-weight: bold;"><?php echo $archive['title']; ?></h4>
            <h6><?php echo $archive['created_at']; ?></h6>
              <p><b><i>Volume <?php echo $archive['volumeid']; ?></i><br></p></b>
              <p><i><b>DOI:</b></i><?php echo $archive['doi']; ?></p>
              <p><b>Keywords: </b><br><?php echo $archive['keywords']; ?></p>
            </div> 
          </div>
        </div>
      <?php endforeach; ?>
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
      <?php foreach ($volumes as $volume): ?>
        <a href="<?php echo site_url('volume/view/' . $volume['volumeid']); ?>">* <?php echo $volume['vol_name']; ?></a><br>
      <?php endforeach; ?>
    </div>
  </div>
</div>
