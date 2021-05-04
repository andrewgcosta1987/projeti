<?php
if(isset($_POST['botao']) AND $_POST['botao'] == "Salvar"){
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $disponivel = $_POST['disponivel'];

    $sql = "INSERT INTO cardapio (categoria, tipo, preco, quantidade, disponivel)
                    VALUES  (:categoria, :tipo, :preco, :quantidade, :disponivel)";

    try{
        $stmt = DB::Conexao()->prepare($sql);   
        $stmt->bindParam(':categoria', $categoria);  
        $stmt->bindParam(':tipo', $tipo);  
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':disponivel', $disponivel); 
        $stmt->execute();

        echo "Registro Efetuado com Sucesso!";

    }catch(PDOException $e){
        echo "Erro ao Inserir Registro:<br/> [ ".$e->getMessage()." ]";
    }
}
?>


<form method='post' action=''>
Categoria:  <input type="text" name='categoria'></br>
Tipo:       <input type="text" name='tipo'></br>
Preço:      <input type="text" name='preco'></br>
Quantidade: <input type="text" name='quantidade'></br>
Disponível: <input type="text" name='disponivel'></br>

<input type='submit' name='botao' value='Salvar'>

</form>