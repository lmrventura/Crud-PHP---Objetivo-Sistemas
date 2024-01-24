<?php
    require_once '../modelo/cliente.php';

    $objCliente = new Cliente();

    if(isset($_POST["create"])){
        $name = $_POST["txtNome"];
        $telefone = $_POST["txtTelefone"];
        $observacao = $_POST["txtObservacao"];

        if($objCliente->create($name, $telefone, $observacao)){
            $objCliente->redirect("../index.php");
        }

        // if($objCliente->create($name, $observacao)){
        //     if($objCliente->createNumber($telefone)){
        //         $objCliente->redirect("../index.php");
        //     }
        // }else{
        //     $objCliente->redirect("../index.php");
        // }
    }

    if(isset($_POST["update"])){
        $name = $_POST["txtNome"];
        $telefone = $_POST["txtTelefone"];
        $observacao = $_POST["txtObservacao"];

        if($objCliente->update($nome, $telefone, $observacao, $id)){
            $objCliente->redirect("../index.php");
        }
    }

    if(isset($_POST["delete"])){
        $id = $_POST["delete"];

        if($objCliente->delete($id)){
            $objCliente->redirect("../index.php");
        }
    }
?>