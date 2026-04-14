<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Médicos</title>
</head>
<body style="background-color: cadetblue;">
    
<div style="background-color: white; width: 75%; margin: auto; padding: 20px; border: 3px solid #757575ff; border-radius: 20px;">
    
    <center>
        <h1>Editar conta de médico:</h1><br><hr>
    </center>
    
    <?php
    require_once "medico.php";
    $arquivo = "contas.txt";

    $indice = [];
    $medico = [];

    if (file_exists($arquivo) && filesize($arquivo) > 0) {
        $dados = file_get_contents($arquivo);
        $medico = unserialize($dados);
    }

    if (isset($_POST['editar'])) {

        $indice = $_POST['indice'];

        header("Location: form_editar_medicos.php?indice=" . $indice);
        exit;
    }
    ?>

    <p>
        <a href="menuMedicos.php">VOLTAR</a>
    </p><hr><hr>

    <h2>Lista de Médicos:</h2><hr>

    <?php
    foreach ($medico as $index=>$d) {
        if ($d instanceof Medico) {
            echo "<p><strong>-->Médico:</strong> " . $d->getNome() . "</p>";
            echo "<p><strong>Sexo:</strong> " . $d->getSexo() . "</p>";
            echo "<p><strong>Nascimento:</strong> " . $d->getNascimento() . "</p>";
            echo "<p><strong>CRM:</strong> " . $d->getCrm() . "</p>";
            echo "<p><strong>Especialidade:</strong> " . $d->getEspecialidade() . "</p>";
            echo "<hr>";
        }
    }
    ?>

    <!-- MESMA IDEIA DE EXCLUIR, PORÉM QUANDO A PESSOA É SELECIONADA O USUÁRIO VAI A OUTRA PÁGINA PARA EDITA-LA -->

    <form method="post">

    <select name="indice" required>
    <?php foreach ($medico as $index => $d) { ?>
        <?php if ($d instanceof Medico) { ?>
            <option value="<?php echo $index; ?>">
                <?php echo $d->getNome(); ?>
            </option>
        <?php } ?>
    <?php } ?>
    </select>

    <input type="submit" name="editar" value="Editar">

    </form>
</div>


</body>
</html>