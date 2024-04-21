<div class="article_display">
  <body>
    <h1>Home</h1>
    <form action="start.php" method="GET">
            <a href="start.php?action=articleAdd" class="btn btn-primary">Add Article</a>
      
  <?php
    require 'model/ArticleDAO.php';
    
    $articleDAO = new ArticleDAO();
    $articles=$articleDAO->getArticles();

  for($index=0;$index<count($articles);$index++){
    $imagesrc = $articles[$index]->getImagePath();
    $title = $articles[$index]->getTitle();
    $content = $articles[$index]->getContent();
    echo "<span style='text-align: center;'>$title</span>";
    echo "<img scr=$imagesrc alt='An article' style='width:48px;height:48px;float:center;'>";
    echo "<span style='text-align: center;float:center;'>$content</span>";
  }
  ?>
  </form>
  </body>
</div>