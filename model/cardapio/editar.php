<?php include('config/DB.php');?>
<?php
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar" ){ 
    $id = $_POST['id_cardapio'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $disponivel = $_POST['disponivel'];

    $sql = "UPDATE cardapio SET 
            categoria   = :categoria,
            tipo        = :tipo,
            preco       = :preco,
            quantidade  = :quantidade,
            disponivel  = :disponivel
            
        WHERE   id_cardapio  = :id_cardapio";

    $stmt = DB::conexao()->prepare($sql);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':disponivel', $disponivel);
    $stmt->bindParam(':id_cardapio', $id);
    $stmt->execute();    
    }


?>



<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM cardapio WHERE id_cardapio = :id";

        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
?>

<form method='post' action=''>
Categoria:      
<input type="text" name='categoria' value='<?php echo $cardapio[0]['categoria']?>'></br>

Tipo:          
<input type="text" name='tipo' value='<?php echo $cardapio[0]['tipo']?>'></br>

Preço:     
<input type="text" name='preco' value='<?php echo $cardapio[0]['preco']?>'></br>

Quantidade:     
<input type="text" name='quantidade' value='<?php echo $cardapio[0]['quantidade']?>'></br>

Produto disponível:     
<input type="text" name='disponivel' value='<?php echo $cardapio[0]['disponivel']?>'></br>

<input type='hidden' name='id_cardapio' value='<?php echo $cardapio[0]['id_cardapio']?>'>
<input type='submit' name='botao' value='Salvar'>

</form>
<?php       

    }
    else{
        echo "ID INVÁLIDO"; 
    }
?>