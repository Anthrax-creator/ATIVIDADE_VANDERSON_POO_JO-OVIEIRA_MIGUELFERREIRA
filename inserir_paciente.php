<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir paciente</title>
</head>
<body>
    
<h1>Novo paciente:</h1>

<form method="post">
    <fieldset>
        <legend>Dados do paciente</legend><br>

        <label>Nome do paciente:</label><br>
        <input type="text" name="pac_nome" required><br><br>

        <label>Sexo:</label><br>
        <input type="text" name="pac_sexo" required><br><br>

        <label>Data de nascimento:</label><br>
        <input type="text" name="pac_nascimento" required><br><br>

        <label>Enfermidade(s):</label><br>
        <input type="text" name="pac_enfermidade">
    </fieldset>

    <br>
    <input type="submit" value="Cadastrar">
    
</form>

<hr>

<?php

if (
    isset($_POST['pac_nome'])
) {

    require_once "paciente.php";


    $paciente = new Paciente (
        $_POST['pac_nome'],
        $_POST['pac_sexo'],
        $_POST['pac_nascimento'],
        $_POST['pac_enfermidade'],
    );

    echo "<h2>Paciente cadastrado com sucesso</h2>";
    echo "<p><strong>Paciente:</strong> " . $paciente->getNome() . "</p>";
    echo "<p><strong>Sexo:</strong> " . $paciente->getSexo() . "</p>";
    echo "<p><strong>Nascimento:</strong> " . $paciente->getNascimento() . "</p>";
    echo "<p><strong>Enfermidade:</strong> " . $paciente->getEnfermidadesPreexistentes() . "</p>";
}

?>

</body>
</html>