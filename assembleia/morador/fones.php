<?php
require_once(__DIR__ . "/../classes/modelo/FoneMorador.class.php");
require_once(__DIR__ . "/../classes/dao/FoneMoradorDAO.class.php");

$mor_id = $_GET['id'];
$id = new Morador();
$id->setId($mor_id);
$foneDao = new FoneMoradorDAO();
$fones = $foneDao->findByMorador($id);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>FONES - MORADORES</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
</head>
<body>
    <legend>Telefones do Morador</legend>
    <fieldset>
        <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($fones as $fone): ?>
                        <tr>
                            <td><?=$fone->getMorador()->getId()?></td>
                            <td><?=$fone->getMorador()->getNome()?></td>
                            <td><?=$fone->getFone()?></td>
                        </tr>  
                    <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>