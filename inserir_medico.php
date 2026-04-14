<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir médico</title>
</head>
<body style="background-color: cadetblue;">
    
<div style="background-color: white; width: 75%; margin: auto; padding: 20px; border: 3px solid #757575ff; border-radius: 20px;">
    
    <center>
        <h1>Novo médico:</h1><br><hr>
    </center>

    <p>
        <a href="menuMedicos.php">VOLTAR</a>
    </p><hr><hr>

    <form method="post">
        <fieldset>
            <legend>Dados do médico</legend><br>

            <label>Nome do médico:</label><br>
            <input type="text" name="med_nome" required><br><br>

            <label>Sexo:</label><br>
            <input type="text" name="med_sexo" required><br><br>

            <label>Data de nascimento:</label><br>
            <input type="date" name="med_nascimento" required><br><br>

            <label>CRM:</label><br>
            <input type="number" name="med_crm"><br><br>

            <label>Especialidade(s):</label><br>
            <input type="text" name="med_especialidade"><br><br>

            <input type="submit" value="Cadastrar">
        </fieldset>
        <br>
    </form>
    <hr>

    <?php

    if (isset($_POST['med_nome'])) {

        require_once "medico.php";

        $medico = new Medico(
            $_POST["med_nome"],
            $_POST["med_sexo"],
            $_POST["med_nascimento"],
            $_POST["med_crm"],
            $_POST["med_especialidade"]
        );

        echo "<h2>Médico cadastrado com sucesso!</h2>";
        echo "<p><strong>Médico:</strong> " . $medico->getNome() . "</p>";
        echo "<p><strong>Sexo:</strong> " . $medico->getSexo() . "</p>";
        echo "<p><strong>Nascimento:</strong> " . $medico->getNascimento() . "</p>";
        echo "<p><strong>CRM:</strong> " . $medico->getCrm() . "</p>";
        echo "<p><strong>Especialidade:</strong> " . $medico->getEspecialidade() . "</p>";


        // ================= SALVAR NO ARQUIVO =================
        $arquivo = "contas.txt";
        $lista = [];

        // CARREGAR DADOS QUE JA POSSAM EXISTIR
        if (file_exists($arquivo) && filesize($arquivo) > 0) {
            $dados = file_get_contents($arquivo);
            $lista = unserialize($dados);
        }

        if (!is_array($lista)) {
            $lista = [];
        }

        $lista[] = $medico;

        // SALVAR TUDO DE NOVO 
        file_put_contents($arquivo, serialize($lista));
    }

    ?>

</div>


</body>
</html>