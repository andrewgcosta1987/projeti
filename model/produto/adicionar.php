<?php

if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produto (descricao, preco, quantidade) 
                    VALUES (:descricao, :preco, :quantidade)";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':descricao', $descricao);  
        $stmt->bindParam(':preco', $preco);  
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
   
?>

<form method='post' action=''>
Descrição:      <input type="text" name='descricao'></br>
Preço:          <input type="text" name='preco'></br>
Quantidade:     <input type="text" name='quantidade'></br>
<input type='submit' name='botao' value='Salvar'>
</form>


