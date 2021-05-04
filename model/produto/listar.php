<?php
    include('config/DB.php');
    $sql = "SELECT * FROM produto";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
?>
<table>
<tr>
    <th>ID</th>
    <th>DESCRICAO</th>
    <th>PRECO</th>
    <!-- <th>QUANTIDADE</th> -->
    <th colspan='2'>OPERAÇÃO</th>
</tr>

<?php
if($produtos){
    foreach($produtos as $produto){
?>
    <tr>
        <td><?php echo $produto['id_produto'];?></td>
        <td><?php echo $produto['descricao'];?></td>
        <td><?php echo $produto['preco'];?></td>
        <!-- <td><?php echo $produto['quantidade'];?></td> -->
        <td><a href="?modulo=produto&acao=editar&id=<?php echo $produto['id_produto'];?>"> EDITAR </a></td>
        <td><a href="?modulo=produto&acao=excluir&id=<?php echo $produto['id_produto'];?>"> EXCLUIR </a></td>
    </tr>
<?php
    }
}    
?>
</table>