<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar médico</title>
</head>
<body style="background-color: cadetblue;">
    
<div style="background-color: white; width: 75%; margin: auto; padding: 20px; border: 3px solid #757575ff; border-radius: 20px;">

    <center>
        <h2>Editar médico:</h2><hr><br>
    </center>

    <?php
    require_once "medico.php";

    $arquivo = "contas.txt";
    $medicos = [];

    if (file_exists($arquivo)) {
        $medicos = unserialize(file_get_contents($arquivo));
    }

    $indice = $_GET['indice'];
    $medico = $medicos[$indice];

    if (isset($_POST['salvar'])) {

        $indice = $_POST['indice'];

        $medicos[$indice]->setNome($_POST['nome']);
        $medicos[$indice]->setSexo($_POST['sexo']);
        $medicos[$indice]->setNascimento($_POST['nascimento']);
        $medicos[$indice]->setCrm($_POST['crm']);
        $medicos[$indice]->setEspecialidade($_POST['especialidade']);

        file_put_contents($arquivo, serialize($medicos));

        header("Location: editar_medico.php");
        exit;
    }

    if (isset($_POST['cancelar'])) {
        header("Location: editar_medico.php");
    }

    ?>

    <form method="post">

        <fieldset>
            <legend>Editar dados do médico:</legend><br>

            <input type="hidden" name="indice" value="<?php echo $indice; ?>">

            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?php echo $medico->getNome(); ?>"><br><br>

            <label>Sexo:</label><br>
            <input type="text" name="sexo" value="<?php echo $medico->getSexo(); ?>"><br><br>

            <label>Data de nascimento:</label><br>
            <input type="date" name="nascimento" value="<?php echo $medico->getNascimento(); ?>"><br><br>

            <label>CRM:</label><br>
            <input type="number" name="crm" value="<?php echo $medico->getCrm(); ?>"><br><br>

            <label>Especialidade:</label><br>
            <input type="text" name="especialidade" value="<?php echo $medico->getEspecialidade(); ?>"><br><br>

            <button type="submit" name="salvar">Salvar</button>
            <button type="submit" name="cancelar">Cancelar</button>
        </fieldset>

    </form>

</div>

</body>
</html>