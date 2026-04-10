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
            <input type="text" name="med_nascimento" required><br><br>

            <label>CRM:</label><br>
            <input type="text" name="med_crm"><br><br>

            <label>Especialidade(s):</label><br>
            <input type="text" name="med_especialidade"><br><br>

            <input type="submit" value="Cadastrar">
        </fieldset>
        <br>


        
    </form>

    <hr>
    
</div>


</body>
</html>