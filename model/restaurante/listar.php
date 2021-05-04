<?php
    $sql = "SELECT * FROM restaurante";
    $stmt = DB::Conexao()->prepare($sql);
    $stmt->execute();

    $restaurante = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>ENDERECO</th>
        <th>TELEFONE</th>
        <th>HORA_FUNC</th>
    </tr>
<?php
    if($restaurante){
        foreach($restaurante as $restaurante){
?>
        <tr>
            <td><?php echo $restaurante['id_$restaurante'];?></td>
            <td><?php echo $restaurante['nome'];?></td>
            <td><?php echo $restaurante['endereco'];?></td>
            <td><?php echo $restaurante['telefone'];?></td>
            <td><?php echo $restaurante['hora_func'];?></td>
            <td><a href="?modulo=$restaurante&acao=editar&id=<?php echo $restaurante['id_$restaurante'];?>"> EDITAR </a></td>
            <td><a href="?modulo=$restaurante&acao=excluir&id=<?php echo $restaurante['id_$restaurante'];?>"> EXCLUIR </a></td>
        </tr>
    <?php
        }
    }
    ?>
</table>