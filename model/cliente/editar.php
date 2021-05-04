<?php include('config/DB.php');?>
<?php
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar" ){ 
    $id = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE cliente SET 
            nome   = :nome,
            email   = :email,
            telefone = :telefone
            
        WHERE   id_cliente  = :id_cliente";

    $stmt = DB::conexao()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id_cliente', $id);
    $stmt->execute();    
    }


?>



<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM cliente WHERE id_cliente = :id";

        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
?>

<form method='post' action=''>
Nome:      
<input type="text" name='nome' value='<?php echo $cliente[0]['nome']?>'></br>

Email:          
<input type="text" name='email' value='<?php echo $cliente[0]['email']?>'></br>

Telefone:     
<input type="text" name='telefone' value='<?php echo $cliente[0]['telefone']?>'></br>

<input type='hidden' name='id_cliente' value='<?php echo $cliente[0]['id_cliente']?>'>
<input type='submit' name='botao' value='Salvar'>

</form>
<?php       

    }
    else{
        echo "ID INVÁLIDO"; 
    }
?>