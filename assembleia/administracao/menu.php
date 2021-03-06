<?php
// include(__DIR__ . "/../administracao/logado.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Assembleia</title>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../assets/css/base.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/home2.css">
    <link rel="stylesheet" href="../assets/css/all.css">
	<!-- <link rel="stylesheet" type="text/css" href="../assets/css/login.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../assets/css/botoes.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css"> -->
</head>

    <!-- Menu lateral -->
        <div class="sidenav">
            
                <a href="#" disabled style="color:white;">
                    <span>
                        <?php if ($_SESSION['MoradorPerfilID'] == 1): ?>    
                        <i class="fab fa-angellist fa-2x"></i> 
                        <?php elseif ($_SESSION['MoradorPerfilNome'] == 4): ?>
                        <i class="fas fa-award fa-2x"></i>
                        <?php else: ?>
                        <i class="fas fa-air-freshener fa-2x"></i> <?php endif; ?>
                        <?=$_SESSION['MoradorNome'];?> <br>(<?=$_SESSION['MoradorPerfilNome'];?>)
                    </span>
                </a>
                               
            <a href="../index.php"><i class="fa fa-home"></i> <span>Home</span></a>
                                    
            <button class="dropdown-btn"><i class="fa fa-list-alt"></i> <span>Cadastrar</span>  
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <button class="dropdown-btn"> <i class="fas fa-hotel"></i> <span>Assembléias</span>  
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="../assembleia/index.php">Assembléia</a>  
                    <a href="../tipoAssembleia/index.php">Tipo de Assembléia</a>
                </div>
                <button class="dropdown-btn"><i class="fa fa-list-alt"></i> <span>Pautas</span>  
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="../pauta/index.php">Pauta</a>
                    <a href="../opcaoResposta/index.php">Resposta</a>                 
                </div>
                <a href="../morador/index.php"><i class="fa fa-users"></i> <span>Morador</span> </a>
                <a href="../sindico/index.php"><i class="fa fa-user"></i> <span>Síndico</span> </a>
                <a href="../apartamento/index.php"><i class="fa fa-users"></i> <span>Apartamento</span> </a>
            </div>
            <!-- <//?php endif;?> -->
    
            <a href="../administracao/logout.php" style="color: red"><i class="fas fa-sign-out-alt"></i><span>Sair</span></a>
                
        </div>

    <script>
      //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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

</html>