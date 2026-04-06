<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remoção de pacientes</title>
</head>
<body>
    
<?php
require_once "paciente.php";
$arquivo = "contas.txt";

$indice = [];
$paciente = [];

if (file_exists($arquivo)) {
    $dados = file_get_contents($arquivo);
    $paciente = (unserialize ($dados));
}

if (isset($_POST['excluir'])) {

    $indice = $_POST['indice'];

    unset($paciente[$indice]);

    $paciente = array_values($paciente);

    file_put_contents($arquivo, serialize($paciente));

    header("Location: excluir_pacientes.php");
    exit;
}
?>

<h1>Excluir conta de paciente:</h1>

<h2>Lista de pacientes:</h2>

<?php
foreach ($paciente as $index=>$c) {
    if ($c instanceof Paciente) {
        echo "<p><strong>->Paciente: </strong>" . $c->getNome() . "</p>";
        echo "<p><strong>Sexo:</strong> " . $c->getSexo() . "</p>";
        echo "<p><strong>Nascimento:</strong> " . $c->getNascimento() . "</p>";
        echo "<p><strong>Enfermidade:</strong> " . $c->getEnfermidadesPreexistentes() . "</p><br>";
    }
}
?>

<form method="post">

<select name="indice" required>
<?php foreach ($paciente as $index=>$c) { ?>
    <option value="<?php echo $index; ?>">
        <?php echo $c->getNome(); ?>
    </option>
<?php } ?>
</select>

<input type="submit" name="excluir" value="Excluir">

</form>

</body>
</html>
