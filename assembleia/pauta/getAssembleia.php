<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
    
    <?php
    $q = intval($_GET['q']);
    $conexao = mysqli_connect('localhost', 'root', '', 'db_assembleia');
    if (!$conexao) {
        die('Erro na conexão: ' . mysqli_error($con));
    }

    mysqli_select_db($conexao, "ajax_demo");
    $sql = "SELECT * FROM tb_pautas WHERE PK_PAU = '".$q."'";
    $result = mysqli_query($conexao,$sql);

    echo "<table class='table table-striped table-hover'>
    <tr>
    <th>#</th>
    <td>Pauta</td>
    <td>Descrição</td>
    <th>Id assembleia</th>
    <th colspan='2'>Ações</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['PK_PAU'] . "</td>";
        echo "<td>" . $row['PAU_NOME'] . "</td>";
        echo "<td>" . $row['PAU_DESCRICAO'] . "</td>";
        echo "<td>" . $row['FK_PAU_ASS'] . "</td>";
        /* Botões
        echo "<td>" . 
        "<form method='post'>
            <input type='hidden' name='id' value='<?=$pauta->getId();?>'>
            <button type='submit' class='btn btn-primary' name='editar' value='editar'>
                <i class='far fa-edit'></i>
            </button>
        </form>"
         . "</td>";
        echo "<td>" . 
        "<form method='post'>
            <input type='hidden' name='id' value='<?=$pauta->getId();?>'>
            <button type='submit' class='btn btn-danger' name='excluir' value='excluir'>
                <i class='far fa-trash-alt'></i>
            </button>
        </form>"
         . "</td>";
        echo "</tr>";
        */
    }
    echo "</table>";
    mysqli_close($conexao);
    ?>
</body>
</html>