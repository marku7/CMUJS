<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/button.css">
<body>
<div class="header-img">
  <img src="assets/img/cover.png" alt="Cover Image">
</div>
<div class="row">
<h2 style="margin-top: 20px !important;">ARTICLES</h2>
  <div class="leftcolumn">
    <?php foreach ($volumes as $volume): ?>
      <div class="card">
        <a href="<?php echo site_url('pages/viewVolume/' . $volume['volumeid']); ?>">
          <h3><?php echo $volume['vol_name']; ?></h3>
        </a>
        <?php foreach ($articles as $article): ?>
          <?php if ($article['volumeid'] == $volume['volumeid']): ?>
            <a href="<?php echo base_url('pages/viewArticle/' . $article['articleid']); ?>" style="text-decoration:none;">
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
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
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
      <div class="card">Update on User Registration Email Requirements for CMU Journal of Science</div><br>
      <div class="card">Call for Papers for Volume 28 (2024)</div><br>
      <div class="card">CMU Journal of Science is now transitioning to Open Journal System (OJS)</div>
      <div class="card">Downloadable Files for Volume 22, Issue 1 (2018) and earlier</div>
    </div>
    <div class="card">
      <h3>Volumes</h3>
      <?php foreach ($volumes as $volume): ?>
        <a href="<?php echo site_url('pages/viewVolume/' . $volume['volumeid']); ?>"> <?php echo $volume['vol_name']; ?></a><br>
      <?php endforeach; ?>
    </div>
    <div class="card">
      <button class="button" type="submit">
        <span class="button-text" style="font-size: 20px;">Make a Submission</span>
        <div class="fill-container"></div>
      </button>
    </div>
  </div>
</div>
