<?php

if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $qtd_pessoas = $_POST['qtd_pessoas'];
    $confirmar = $_POST['confirmar'];

    $sql = "INSERT INTO produto (nome, data, hora, qtd_pessoas, confirmar) 
                    VALUES (:nome, :data, :hora, :qtd_pessoas, :confirmar)";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':nome', $nome);  
        $stmt->bindParam(':data', $data);  
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':qtd_pessoas', $qtd_pessoas);
        $stmt->bindParam(':confirmar', $confirmar);
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
   
?>

<form method='post' action=''>
Nome do Restaurante:      <input type="text" name='nome'></br>
Data da Reserva:          <input type="text" name='data'></br>
Hora da Reserva:          <input type="text" name='hora'></br>
Quatidade de Pessoas:     <input type="text" name='qtd_pessoas'></br>
Confirmar Reserva:        <input type="text" name='confirmar'></br>
<input type='submit' name='botao' value='Salvar'>
</form>