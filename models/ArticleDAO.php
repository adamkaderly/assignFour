<?php
    require_once 'Article.php';

    class ArticleDAO {
        

        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "assign4user", "mvcpass", "assign4DB");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addArticle($article){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO articles (title, imagePath, content, userID) VALUES (?, ?, ?, ?);");
            $stmt->bind_param("sssi", $article->getTitle(), $article->getImagePath(), $article->getContent(), $article->getUserID());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function updateArticle($article){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("UPDATE articles SET title=?, imagePath=?, content=?, userID=? WHERE articleID = ?;");
            $stmt->bind_param("sssii", $article->getTitle(), $article->getImagePath(), $article->getContent(), $article->getUserID(), $article->getArticleID());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteArticle($articleID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM articles WHERE articleID = ?;");
            $stmt->bind_param("i", $articleID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getArticles(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $article = new Article();
                $article->load($row);
                $articles[]=$article;
            }    
            $stmt->close();
            $connection->close();
            return $articles;
        }

        public function getArticle($articleID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles WHERE articleID = ?;"); 
            $stmt->bind_param("i", $articleID);
            $stmt->execute();
            $result = $stmt->get_result();
            if($row = $result->fetch_assoc()){
                $article = new Article();
                $article->load($row);
            }    
            $stmt->close();
            $connection->close();
            return $article;
        }
        
        //HAVEN"T CHANGED FROM WHAT USERDAO HAD
        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? and passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            return $found;
        }

    }
?>
