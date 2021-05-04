<?php
    $sql = "SELECT * FROM cardapio";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();

    $cardapio = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
    <tr>
        <th>ID</th>
        <th>CATEGORIA</th>
        <th>TIPO</th>
        <th>PRECO</th>
        <th>QUANTIDADE</th>
        <th>DISPONIVEL</th>
    </tr>
<?php
    if($cardapio){
        foreach($cardapio as $cardapio){
?>
        <tr>
            <td><?php echo $cardapio['id_cardapio'];?></td>
            <td><?php echo $cardapio['categoria'];?></td>
            <td><?php echo $cardapio['tipo'];?></td>
            <td><?php echo $cardapio['preco'];?></td>
            <td><?php echo $cardapio['quantidade'];?></td>
            <td><?php echo $cardapio['disponivel'];?></td>
            <td><a href="?modulo=cardapio&acao=editar&id=<?php echo $cardapio['id_cardapio'];?>"> EDITAR </a></td>
            <td><a href="?modulo=cardapio&acao=excluir&id=<?php echo $cardapio['id_cardapio'];?>"> EXCLUIR </a></td>
        </tr>
    <?php
        }
    }
    ?>
</table>