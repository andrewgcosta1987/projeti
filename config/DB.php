<?php
    class DB{
        public static $conexao;

        public static function Conexao(){
            try{
                self::$conexao = new PDO('mysql:host=localhost;dbname=projeti_dados', 'root', '123456789');
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Erro:'.$e->getMessage(); 
            } 
            return self::$conexao;
        }    
    }
?>    