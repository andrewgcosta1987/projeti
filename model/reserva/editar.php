<?php include('config/DB.php');?>

<?php
if(isset($_POST["botao"]) && $_POST["botao"] == "Salvar" ){ 
    $id = $_POST['id_reserva'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $qtd_pessoas = $_POST['qtd_pessoas'];
    $confirmar = $_POST['confirmar'];

    $sql = "UPDATE reserva SET 
            nome        = :nome,
            data        = :data,
            hora        = :hora,
            qtd_pessoas = :qtd_pessoas,
            confirmar   = :confirmar
            
        WHERE   id_reserva  = :id_reserva";

    $stmt = DB::conexao()->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':qtd_pessoas', $qtd_pessoas);
    $stmt->bindParam(':confirmar', $confirmar);
    $stmt->bindParam(':id_produto', $id);
    $stmt->execute();    
    }


?>

<?php
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM reserva WHERE id_reserva = :id";

        $stmt = DB::Conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
?>

<form method='post' action=''>
Nome:      
<input type="text" name='nome' value='<?php echo $reserva[0]['nome']?>'></br>

Data da Reserva:          
<input type="text" name='data' value='<?php echo $reserva[0]['data']?>'></br>

Hora da Reserva:          
<input type="text" name='hora' value='<?php echo $reserva[0]['hora']?>'></br>

Quantidade de Pessoas:          
<input type="text" name='qtd_pessoas' value='<?php echo $reserva[0]['qtd_pessoas']?>'></br>

Confirmar Reserva:          
<input type="text" name='confirmar' value='<?php echo $reserva[0]['confirmar']?>'></br>

<input type='hidden' name='id_reserva' value='<?php echo $reserva[0]['id_reserva']?>'>
<input type='submit' name='botao' value='Salvar'>

</form>
<?php       

    }
    else{
        echo "ID INVÁLIDO"; 
    }
?>