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
	<title>Cadastrar Assembléia</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/base.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/botoes.css">
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/all.css">
	<link rel="stylesheet" href="assets/css/home.css">
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
	
	<!-- Início do container -->
	<div class="container" >

		<!-- Form -->
		<form method="get" action="cadAssembleia.php">

			<!-- Div1 -->
			<div class="form-row">

				<div class="col-md-10 mb-3">
					<label><h2>Cadastro das Assembléias</h2></label>
				</div>
				<!-- Tipo de Assembleia -->
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
                <!-- Fim Tipo de Assembleia -->
                
				<!-- Nome da assembléia -->
				<div class="col-md-10 mb-3">
					<label for="nome-assembleia" class="required">Nome da Assembléia</label>
					<input type="text" class="form-control" id="nome-assembleia" name="nome-assembleia" required">
				</div>
				<!-- Fim da assembléia  -->

				<!-- Descrição da assembléia -->
				<!-- <div class="col-md-10 mb-3">
					<label for="descricao-assembleia">Descrição</label>
					<input type="text" class="form-control" id="descricao-assembleia" name="descricao-assembleia" placeholder="Descrição para assembléia" />
				</div> -->
				<!-- Fim Descrição da assembléia -->
	
				<!-- Data da assembléia -->
				<div class="col-md-3 mb-3">
					<label for="data-assembleia" class="required">Data da Assembléia</label>
					<input type="date" class="form-control" id="data-assembleia" name="data-assembleia" required />
				</div>
				<!-- Fim data da assembléia -->

			</div>
			<!-- Fim Div1 -->

			<!-- Botões -->
			<div class="submit-row">
				<button type="submit" value="Salvar" class="btn btn-success">Salvar</button>
				<button type="reset" class="btn btn-warning">Limpar</button>
			</div>
			<!-- Fim Botões -->

		</form>
<!-- Fim Form -->
</div>  
<!-- Fim do container -->
</body>
</html> 