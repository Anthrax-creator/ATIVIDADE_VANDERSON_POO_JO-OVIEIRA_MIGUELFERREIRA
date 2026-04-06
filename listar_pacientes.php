<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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
        echo "<p><strong>Paciente:</strong> " . $paciente->getNome() . "</p>";
        echo "<p><strong>Sexo:</strong> " . $paciente->getSexo() . "</p>";
        echo "<p><strong>Nascimento:</strong> " . $paciente->getNascimento() . "</p>";
        echo "<p><strong>Enfermidade:</strong> " . $paciente->getEnfermidadesPreexistentes() . "</p>";
    }
    
}

?>
</body>
</html>