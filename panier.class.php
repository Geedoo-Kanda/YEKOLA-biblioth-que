<?php 
    class panier {

        public function __construct(){
            if(!isset($_SESSION)){
                session_start(); 
            }
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();
            }
        }

        public function add($id){
            $_SESSION['panier'][$id] = 1;
        }

        public function del($id){
            unset($_SESSION['panier'][$id]);
        }
    }
    
?> 