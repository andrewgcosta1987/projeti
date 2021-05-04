<?php
    $sql = "SELECT * FROM reserva";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();

    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<table>
<tr>
    <th>ID</th>
    <th>NOME</th>
    <th>DATA</th>
    <th>HORA</th>
    <th>QTD_PESSOAS</th>
    <th>CONFIRMAR</th>
    <th colspan='2'>OPERAÇÃO</th>
</tr>

<?php 
if($reserva){
    foreach($reserva as $reserva){ 
?>
    <tr>
        <td><?php echo $reserva['id_reserva'];?></td>
        <td><?php echo $reserva['nome'];?></td>
        <td><?php echo $reserva['data'];?></td>
        <td><?php echo $reserva['hora'];?></td>
        <td><?php echo $reserva['qtd_pessoas'];?></td>
        <td><?php echo $reserva['confirmar'];?></td>
        <td><a href="?modulo=reserva&acao=editar&id=<?php echo $reserva['id_reserva'];?>"> EDITAR </a></td>
        <td><a href="?modulo=reserva&acao=excluir&id=<?php echo $reserva['id_reserva'];?>"> EXCLUIR </a></td>
    
    </tr>
<?php 
    }
} 
?>
</table>