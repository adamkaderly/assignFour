<?php
include_once "./models/ArticleDAO.php";

class ArticleAdd extends Controller{
    private $articleDAO;
    private $article;

    public function performAction(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $this->renderView("articleAdd",[]);
        }else{
            if($_POST['submit']=='Confirm'){
                $article = new Article();
                $article->setTitle($_POST['title']);
                $article->setImagePath($_POST['imagePath']);
                $article->setContent($_POST['content']);
                $articleDAO = new ArticleDAO();
                $articleDAO->addArticle($article);
            }
            header( "Location: home.php");
            exit;
        }
    }
}
?>