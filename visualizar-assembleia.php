<?php
require_once(__DIR__ . "/classes/modelo/Assembleia.class.php");
require_once(__DIR__ . "/classes/dao/AssembleiaDAO.class.php");
?>
<?php
$assembleia = new Assembleia();
$dao = new AssembleiaDAO();
$assembleias = $dao->findAll();
?>

<?php
require_once(__DIR__ . "/classes/modelo/Tipo_assembleia.class.php");
require_once(__DIR__ . "/classes/dao/Tipo_assembleiaDAO.class.php");
?>
<?php
$tipo_assembleia = new Tipo_assembleia();
$dao = new Tipo_assembleiaDAO();
$tipos_assembleias = $dao->findAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/home.css">
	<link rel="stylesheet" type="text/css" href="assets/css/base.css">
	<link rel="stylesheet" type="text/css" href="assets/css/botoes.css">
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>
<body>
    <!-- Menu lateral -->
    <div class="sidenav">
        <li>
            <a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a>
        </li>  
        
        <button class="dropdown-btn"><i class="fa fa-bars"></i> <span>Assembléia</span>  
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
                <button class="dropdown-btn"><i class="fa fa-bars"></i> <span>Cadastrar</span>  
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="cadastrar-assembleia.php">Assembleia</a>
                    <a href="#">Pauta</a>
                    <a href="#">Tipo de Assembleia</a>
                </div>
                <a href="visualizar-assembleia.php">Visualizar</a>
        </div>

        <button class="dropdown-btn"><i class="fa fa-users"></i> <span>Morador</span>  
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#">Cadastrar</a>
            <a href="#">Visualizar</a>
        </div>
    </div>
        
    <div class="main">
    <!-- <h2>Sidebar Dropdown</h2>
    <p>Click on the dropdown button to open the dropdown menu inside the side navigation.</p>
    <p>This sidebar is of full height (100%) and always shown.</p>
    <p>Some random text..</p> -->
    </div>
        
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
    <!-- Fim menu lateral -->

    <div class="container">
        <table class="table table-sm table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">assembleia</th>
                    <th scope="col">data</th>
                    <th scope="col">ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assembleias as $assembleia): ?>
                    <tr>
                        <th scope="col"><?=$assembleia->getId();?></th>
                        <td><?=$assembleia->getNome();?></td>
                        <td><?=$assembleia->getData();?></td>
                        <td>
                            <button type="submit" data-toggle="modal" data-target="#janela1"><i class="far fa-edit"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="janela1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar assembleia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="">
                    <div class="form-row">

                        <div class="col-md-6 mb-3">
					        <div class="form-group">
						        <label for="tipo_assemb." class="required">Tipo de Assembléia</label>
						        <select class="form-control" id="tipo_assemb." name="tipo_assembleia">
							        <?php foreach ($tipos_assembleias as $tipo_assembleia): ?>
                                    <option value="<?=$tipo_assembleia->getId()?>"><?=$tipo_assembleia->getNome();?></option>
                                    <?php endforeach; ?>                             
                                </select>
					        </div>
                        </div>
                        
                        <div class="col-md-10 mb-3">
					        <label for="nome-assembleia" class="required">Nome da Assembléia</label>
					        <input type="text" class="form-control" id="nome-assembleia" name="nome-assembleia" required value="<?=$tipo_assembleia->getNome();?>"/>
                        </div>
                        
                        <div class="col-md-3 mb-3">
					        <label for="data-assembleia" class="required">Data da Assembléia</label>
					        <input type="date" class="form-control" id="data-assembleia" name="data-assembleia" required />
				        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Editar</button>
            </div>
            </div>
        </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html> 