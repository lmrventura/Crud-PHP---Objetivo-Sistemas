<?php
    require_once '../modelo/cliente.php';

    $objCliente = new Cliente();

    $objTelefone = new Telefone();

    if(isset($_POST["create"])){
        $name = $_POST["txtNome"];
        $observacao = $_POST["txtObservacao"];
        $telefone = $_POST["txtTelefone"];
        

        if($objCliente->create($name, $observacao)){
            if($objTelefone->create($telefone)){
                $objCliente->redirect("../luizVentura.php");
            }
        }
    }

    if(isset($_POST["update"])){
        $name = $_POST["txtNome"];
        $telefone = $_POST["txtTelefone"];
        $observacao = $_POST["txtObservacao"];

        if($objCliente->update($nome, $telefone, $observacao, $id)){
            $objCliente->redirect("../luizVentura.php");
        }
    }

    if(isset($_POST["delete"])){
        $id = $_POST["delete"];

        if($objCliente->delete($id)){
            $objCliente->redirect("../luizVentura.php");
        }
    }
?>