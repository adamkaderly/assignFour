<?php
include_once "./models/ArticleDAO.php";

class Home extends Controller{

    public function performAction(){
        $articleDAO = new ArticleDAO();

        $articles=$articleDAO->getArticles();
        $this->renderView("article",$articles);
    }
}
?>