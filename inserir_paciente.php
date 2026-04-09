<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir paciente</title>
</head>
<body style="background-color: cadetblue;">
    
<div style="background-color: white; width: 80%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 20px;">
    
    <center>
        <h1>Novo paciente:</h1><br><hr>
    </center>

    <p>
        <a href="menuPacientes.php">VOLTAR</a>
    </p><hr><hr><br>

    <form method="post">
        <fieldset>
            <legend>Dados do paciente</legend><br>

            <label>Nome do paciente:</label><br>
            <input type="text" name="pac_nome" required><br><br>

            <label>Sexo:</label><br>
            <input type="text" name="pac_sexo" required><br><br>

            <label>Data de nascimento:</label><br>
            <input type="text" name="pac_nascimento" required><br><br>

            <label>Enfermidade(s) atual(is):</label><br>
            <input type="text" name="pac_enfermidade"><br><br>

            <input type="submit" value="Cadastrar">
        </fieldset>
        <br>
    </form>

    <hr>

    <?php

    if (isset($_POST['pac_nome'])) {

        require_once "paciente.php";

        $paciente = new Paciente(
            $_POST['pac_nome'],
            $_POST['pac_sexo'],
            $_POST['pac_nascimento'],
            $_POST['pac_enfermidade']
        );

        echo "<h2>Paciente cadastrado com sucesso</h2>";
        echo "<p><strong>Paciente:</strong> " . $paciente->getNome() . "</p>";
        echo "<p><strong>Sexo:</strong> " . $paciente->getSexo() . "</p>";
        echo "<p><strong>Nascimento:</strong> " . $paciente->getNascimento() . "</p>";
        echo "<p><strong>Enfermidade:</strong> " . $paciente->getEnfermidadesPreexistentes() . "</p>";

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

        $lista[] = $paciente;

        // SALVAR TUDO DE NOVO 
        file_put_contents($arquivo, serialize($lista));
    }

    ?>

</div>



</body>
</html>