<?php
    require_once "modelo/cliente.php";
    $objCliente = new Cliente();
    $clientes = $objCliente->read();
    // $telefone = $objCliente->readNumber(0);
    // var_dump($telefone[0]["telefone"]);
    
    // $telefone = $objCliente->readNumber(0);
    // var_dump($telefone);
    
    //die;
?>

<!DOCTYPE html>

<html lang="pt-BR" data-bs-theme="dark">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="./assets/js/color-modes.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Time Objetivo">
    <meta name="generator" content="OBJ 1.0">
    <title>Desafio Técnico - Objetivo</title>


    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/app.css"

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.jsajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body cz-shortcut-listen="true">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (dark)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#moon-stars-fill"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Exibir</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Claro
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="dark" aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Escuro
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>


    <header data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4>Desafio:</h4>
                        <p class="text-body-primary">O desafio consiste em realizar um C.R.U.D utilizando-se PHP e conceitos de programação orientada a objetos.</p>

                        <br />

                        <h4>Gerenciador de Cadastros:</h4>

                        <p class="text-body-primary">O desafio consiste em criar um formulario de cadastro de um clientes, com os campos de nome e telefone, possuindo as funcionalidades de cadastrar, editar e excluir um cliente
                            cadastrado na base de dados.</p>

                    </div>

                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">

                    <strong>Desafio técnico - Objetivo Sistemas</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <img class="mb-3 logo-img" src="assets/img/obj.jpg">

                    <h3 class="fw-light">Luiz Ventura</h3>

                </div>
            </div>
        </section>

        <div class="row py-lg-5">
            <div class="col-lg-7 mx-auto">
                <form method="post" action="controle/ctr_cliente.php">
                    <input type="hidden" name="create">
                    <div class="mb-3">
                        <label for="" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="" name="txtNome" placeholder="Fulano da Silva Santos">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telefone:</label>
                        <input type="number" class="form-control" id="" name="txtTelefone" placeholder="(71) 3241-3010">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Observação:</label>
                        <textarea class="form-control" id="" name="txtObservacao" placeholder="Alguma Observação Aqui !" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
                    </div>
                </form>
            </div>
                
        </div>
        
        <hr/>
        
        <section class="py-2 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1>Lista de Clientes</h1>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    
                    
                    
                    
                    <?php $dados = array() ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <!--Inicio: Cards -->
                        <div class="col">
                            <div class="card shadow-sm">

                                <div class="card-body">
                                    <label class="text-uppercase"><strong>Nome do Cliente:</strong></label>
                                    <p class="card-text"><?php echo($cliente['nome'])?></p>
                                    <label class="text-uppercase"><strong>Telefone:</strong></label>
                                    <p class="card-text"><?php echo($objCliente->readNumber( $cliente['cliente_telefone_id_cliente_telefone']) )?></p>
                                    <!-- <p class="card-text"><?php //echo($cliente['cliente_telefone_id_cliente_telefone'])?></p> -->
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-sm btn-primary" href="#">Editar</a>
                                            <!-- <a type="button" class="btn btn-sm btn-danger" href="">Excluir</a> -->
                                            <form action="controle/ctr_cliente.php" method="POST">
                                                <input type="hidden" name="delete" value="<?php echo $cliente['id_cliente']; ?>">
                                                <button class="btn btn-sm btn-danger" type="submit">Excluir</button>
                                            </form>
                                        </div>
                                        <small class="text-body-secondary">Cadastrado em 12/01/2024</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim: Cards -->    
                    <?php endforeach; ?>
                    
                    





                </div>
            </div>
        </div>

    </main>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Voltar para o Inicio</a>
            </p>
            <p class="mb-1">Todas as informações do banco de dados se encontra na pasta data</p>
            <p class="mb-0">Objetivo Sistemas <?= date('Y'); ?></p>
        </div>
    </footer>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>

<!-- The Modal Editar-->
<div class="modal" id="myModalEditar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: black; color:white">
        <h4 class="modal-title">Editar Produto</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="controle/ctr_produto.php" method="POST">
                <input type="hidden" name="update" id="recipient-id">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="txtNome" id="recipient-nome">
                </div>
                <div class="form-group">
                    <label for="">Quantidade</label>
                    <input type="text" class="form-control" name="txtQuantidade" id="recipient-quantidade">
                </div>
                <div class="form-group">
                    <label for="">Preco</label>
                    <input type="text" class="form-control" name="txtPreco" id="recipient-price">
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
      </div>
    </div>
  </div>
</div>


</body>

</html>