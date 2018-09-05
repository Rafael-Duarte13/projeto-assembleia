<?php require_once(__DIR__ . "/../classes/modelo/getPauta.class.php"); ?>
<?php require_once(__DIR__ . "/../classes/dao/getPautaDAO.class.php"); ?>
<?php require_once(__DIR__ . "/../classes/modelo/Assembleia.class.php"); ?>
<?php
$ass_id = $_GET['ass_id'];
$idAssembleia = new Assembleia();
$idAssembleia->setId($ass_id);
$dao = new getPautaDAO();
$pautas = $dao->findByIdAssembleia($idAssembleia);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assembléia</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
</head>
<body>
    <legend>Lista de pautas da assembléia com filtro</legend>
    <table class="table table-striped table-hover">
        <thead>
            <th>#</th>
            <th>Pauta</th>
            <th>Descrição</th>
            <th>Id Assembleia</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            <?php 
                foreach ($pautas as $pauta): ?>
                <tr>
                    <td><?=$pauta->getId();?></td>
                    <td><?=$pauta->getNome();?></td>
                    <td><?=$pauta->getDescricao();?></td>
                    <td><?=$pauta->getIdAssembleia()->getId();?></td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="id" value="<?=$pauta->getId();?>">
                            <button type="submit" class="btn btn-primary" name="editar" value="editar">
                                <i class="far fa-edit"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="index.php"> 
                            <input type="hidden" name="id" value="<?=$pauta->getId();?>">
                            <button type="submit" class="btn btn-danger" name="excluir" value="excluir">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
</body>
</html>