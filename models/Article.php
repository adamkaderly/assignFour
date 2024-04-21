<?php
    class Article implements JsonSerializable{
        private $articleID;
        private $title;
        private $imagePath;
        private $content;
        private $userID;

        public function load($row){
            $this->setArticleID($row['articleID']);
            $this->setTitle($row['title']);
            $this->setImagePath($row['imagePath']);
            $this->setContent($row['content']);
            $this->setUserID($row['userID']);
        }

        public function setUserID($userID){
            $this->userID=$userID;
        }

        public function getUserID(){
            return $this->userID;
        }

        public function setArticleID($articleID){
            $this->articleID=$articleID;
        }

        public function getArticleID(){
            return $this->articleID;
        }

        public function setTitle($title){
            $this->title=$title;
        }

        public function getTitle(){
            return $this->title;
        }

        public function setImagePath($imagePath){
            $this->imagePath=$imagePath;
        }

        public function getImagePath(){
            return $this->imagePath;
        }

        public function setContent($content){
            $this->content=$content;
        }

        public function getContent(){
            return $this->content;
        }
        
        public function jsonSerialize(){
            return array(
                'articleID' => $this->articleID,
                'title'=> $this->title,
                'imagePath' => $this->imagePath,
                'content' => $this->content,
                'userID' => $this->userID
            );
        }
    }
?>