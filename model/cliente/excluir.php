<?php
    if(isset($_GET['id']) AND is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE * FROM cliente WHERE id_cliente = :id";
        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }else{
        echo "ID INVÁLIDO";
    }
?>