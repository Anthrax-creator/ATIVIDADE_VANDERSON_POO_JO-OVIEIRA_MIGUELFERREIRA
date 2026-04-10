<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>
</head>
<body style="background-color: cadetblue;">

<div style="background-color: white; width: 75%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 20px;">
    
    <center>
        <h1>Lista de pacientes cadastrados:</h1><br><hr>
    </center>

    <p>
        <a href="menuPacientes.php">VOLTAR</a>
    </p><hr><hr>


    <?php
    require_once "paciente.php";
    $arquivo = "contas.txt";

    $paciente = [];

    if (file_exists($arquivo)) {
        $dados = file_get_contents($arquivo);
        $paciente = (unserialize ($dados));
    }

    foreach ($paciente as $index => $c) {
        if ($c instanceof Paciente){
            echo "<p><strong>-->Paciente:</strong> " . $c->getNome() . "</p>";
            echo "<p><strong>Sexo:</strong> " . $c->getSexo() . "</p>";
            echo "<p><strong>Nascimento:</strong> " . $c->getNascimento() . "</p>";
            echo "<p><strong>Enfermidade:</strong> " . $c->getEnfermidadesPreexistentes() . "</p>";
            echo "<hr>";
        }
        
    }

    ?>

</div>

</body>
</html>