<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de pacientes</title>
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

if (isset($_POST['editar'])) {

    $indice = $_POST['indice'];

    header("Location: form_editar.php?indice=" . $indice);
    exit;
}
?>

<h1>Editar conta de paciente:</h1><br><hr>

<p>
    <a href="index.php">VOLTAR</a>
</p><hr>

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

<input type="submit" name="editar" value="Editar">

</form>

</body>
</html>