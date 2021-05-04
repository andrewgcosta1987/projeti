<?php
    $sql = "SELECT * FROM cliente";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();

    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<table>
<tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>TELEFONE</th>
    <th colspan='2'>OPERAÇÃO</th>
</tr>

<?php 
if($clientes){
    foreach($clientes as $cliente){ 
?>
    <tr>
        <td><?php echo $cliente['id_cliente'];?></td>
        <td><?php echo $cliente['nome'];?></td>
        <td><?php echo $cliente['email'];?></td>
        <td><?php echo $cliente['telefone'];?></td>
        <td><a href="?modulo=cliente&acao=editar&id=<?php echo $cliente['id_cliente'];?>"> EDITAR </a></td>
        <td><a href="?modulo=cliente&acao=excluir&id=<?php echo $cliente['id_cliente'];?>"> EXCLUIR </a></td>
    
    </tr>
<?php 
    }
} 
?>
</table>