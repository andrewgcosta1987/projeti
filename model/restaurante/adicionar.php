<?php

if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $hora_func = $_POST['hora_func'];

    $sql = "INSERT INTO restaurante (nome, endereco, telefone, hora_func) 
                    VALUES (:nome, :endereco, :telefone, :hora_func)";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':nome', $nome);  
        $stmt->bindParam(':endereco', $endereco);  
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':hora_func', $hora_func);
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
   
?>

<form method='post' action=''>
Nome:                   <input type="text" name='nome'></br>
Endereço:               <input type="text" name='endereco'></br>
Telefone:               <input type="text" name='telefone'></br>
Hora de Funcionamento:  <input type="text" name='hora_func'></br>
<input type='submit' name='botao' value='Salvar'>
</form>