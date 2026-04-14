<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de médicos</title>
</head>
<body style="background-color: cadetblue;">
    
<div style="background-color: white; width: 75%; margin: auto; padding: 20px; border: 3px solid #757575ff; border-radius: 20px;">
    
    <center>
        <h1>Lista de médicos cadastrados:</h1><br><hr>
    </center>

    <p>
        <a href="menuMedicos.php">VOLTAR</a>
    </p><hr><hr>
    
    <?php
    require_once "medico.php";
    $arquivo = "contas.txt";

    $medico = [];

    if (file_exists($arquivo)) {
        $dados = file_get_contents($arquivo);
        $medico = (unserialize ($dados));
    }

    foreach ($medico as $index => $c) {
        if ($c instanceof Medico){
            echo "<p><strong>-->Médico:</strong> " . $c->getNome() . "</p>";
            echo "<p><strong>Sexo:</strong> " . $c->getSexo() . "</p>";
            echo "<p><strong>Nascimento:</strong> " . $c->getNascimento() . "</p>";
            echo "<p><strong>CRM:</strong> " . $c->getCrm() . "</p>";
            echo "<p><strong>Especialidade:</strong> " . $c->getEspecialidade() . "</p>";
            echo "<hr>";
        }   
    }
    ?>
</div>


</body>
</html>