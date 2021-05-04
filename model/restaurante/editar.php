<?php include('config/DB.php');?>

<?php
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar" ){ 
    $id = $_POST['id_restaurante'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $hora_func = $_POST['hora_func'];

    $sql = "UPDATE restaurante SET 
            nome        = :nome,
            endereco    = :endereco,
            telefone    = :telefone,
            hora_func   = :hora_func
            
        WHERE   id_restaurante  = :id_restaurante";

    $stmt = DB::conexao()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':hora_func', $hora_func);
    $stmt->bindParam(':id_restaurante', $id);
    $stmt->execute();    
    }


?>

<?php
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM restaurante WHERE id_restaurante = :id";

        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
?>

<form method='post' action=''>
Nome:      
<input type="text" name='nome' value='<?php echo $restaurante[0]['nome']?>'></br>

Endereço:          
<input type="text" name='endereco' value='<?php echo $restaurante[0]['endereco']?>'></br>

Telefone:          
<input type="text" name='telefone' value='<?php echo $restaurante[0]['telefone']?>'></br>

Hora de Funcionamento:          
<input type="text" name='hora_func' value='<?php echo $restaurante[0]['hora_func']?>'></br>

<input type='hidden' name='id_restaurante' value='<?php echo $restaurante[0]['id_restaurante']?>'>
<input type='submit' name='botao' value='Salvar'>

</form>
<?php       

    }
    else{
        echo "ID INVÁLIDO"; 
    }
?>