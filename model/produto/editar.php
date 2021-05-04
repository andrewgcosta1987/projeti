<?php include('config/DB.php');?>

<?php
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar" ){ 
    $id = $_POST['id_produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produto SET 
            descricao   = :descricao,
            preco   = :preco,
            quantidade = :quantidade
            
        WHERE   id_produto  = :id_produto";

    $stmt = DB::conexao()->prepare($sql);
    $stmt->bindParam(':descricao', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidade', $telefone);
    $stmt->bindParam(':id_produto', $id);
    $stmt->execute();    
    }


?>

<?php
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM produto WHERE id_produto = :id";

        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
?>

<form method='post' action=''>
Descrição:      
<input type="text" name='descricao' value='<?php echo $produto[0]['descricao']?>'></br>

Preço:          
<input type="text" name='preco' value='<?php echo $produto[0]['preco']?>'></br>

Quantidade:     
<input type="text" name='quantidade'></br>

<input type='hidden' name='id_produto' value='<?php echo $produto[0]['id_produto']?>'>
<input type='submit' name='botao' value='Salvar'>

</form>
<?php       

    }
    else{
        echo "ID INVÁLIDO"; 
    }
?>