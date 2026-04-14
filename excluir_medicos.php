<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remoção de médicos</title>
</head>
<body style="background-color: cadetblue;">
    
<div style="background-color: white; width: 75%; margin: auto; padding: 20px; border: 3px solid #757575ff; border-radius: 20px;">
    
    <center>
        <h1>Excluir conta de médico:</h1><br><hr>
    </center>

    <p>
        <a href="menuMedicos.php">VOLTAR</a>
    </p><hr><hr>

    <h2>Lista de médicos:</h2><hr>
    
    <?php
    require_once "medico.php";
    $arquivo = "contas.txt";

    $indice = [];
    $medico = [];

    if (file_exists($arquivo)) {
        $dados = file_get_contents($arquivo);
        $medico = (unserialize ($dados));
    }

    if (isset($_POST['excluir'])) {

        $indice = $_POST['indice'];

        unset($medico[$indice]);

        $medico = array_values($medico);

        file_put_contents($arquivo, serialize($medico));

        // ISSO AQUI FAZ COM QUE O SITE N EXCLUA NINGUEM QUANDO RECARREGA A PÁGINA
        header("Location: excluir_medicos.php");
        exit;
    }
    ?>

    <?php
    foreach ($medico as $index=>$c) {
        if ($c instanceof Medico) {
            echo "<p><strong>-->Médico:</strong> " . $c->getNome() . "</p>";
            echo "<p><strong>Sexo:</strong> " . $c->getSexo() . "</p>";
            echo "<p><strong>Nascimento:</strong> " . $c->getNascimento() . "</p>";
            echo "<p><strong>CRM:</strong> " . $c->getCrm() . "</p>";
            echo "<p><strong>Especialidade:</strong> " . $c->getEspecialidade() . "</p>";
            echo "<hr>";
        }
    }
    ?>

    <form method="post">

    <select name="indice" required>
    <?php foreach ($medico as $index=>$c) { ?>
        <?php if ($c instanceof Medico) { ?>
            <option value="<?php echo $index; ?>">
                <?php echo $c->getNome(); ?>
            </option>
        <?php } ?>
    <?php } ?>
    </select>

    <input type="submit" name="excluir" value="Excluir">

    </form>
</div>

</body>
</html>