<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
require_once "paciente.php";

$arquivo = "contas.txt";
$pacientes = [];

if (file_exists($arquivo)) {
    $pacientes = unserialize(file_get_contents($arquivo));
}

$indice = $_GET['indice'];
$paciente = $pacientes[$indice];

if (isset($_POST['salvar'])) {

    $indice = $_POST['indice'];

    $pacientes[$indice]->setNome($_POST['nome']);
    $pacientes[$indice]->setSexo($_POST['sexo']);
    $pacientes[$indice]->setNascimento($_POST['nascimento']);
    $pacientes[$indice]->setEnfermidadesPreexistentes($_POST['enfermidade']);

    file_put_contents($arquivo, serialize($pacientes));

    header("Location: editar_paciente.php");
    exit;
}

if (isset($_POST['cancelar'])) {
    header("Location: editar_paciente.php");
}

?>

<h2>Editar paciente:</h2><hr><br>

<form method="post">

    <fieldset>
        <legend>Editar dados do paciente:</legend><br>

        <input type="hidden" name="indice" value="<?php echo $indice; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $paciente->getNome(); ?>"><br><br>

        <label>Sexo:</label><br>
        <input type="text" name="sexo" value="<?php echo $paciente->getSexo(); ?>"><br><br>

        <label>Data de nascimento:</label><br>
        <input type="text" name="nascimento" value="<?php echo $paciente->getNascimento(); ?>"><br><br>

        <label>Enfermidade atual(is):</label><br>
        <input type="text" name="enfermidade" value="<?php echo $paciente->getEnfermidadesPreexistentes(); ?>"><br><br>

        <button type="submit" name="salvar">Salvar</button>
        <button type="submit" name="cancelar">Cancelar</button>
    </fieldset>

</form>

</body>
</html>