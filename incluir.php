<?php 

require("requests.php");

if(strtoupper($_SERVER["REQUEST_METHOD"]) == "POST")
{
    $data = array();
    $campos = array("nome", "telefone", "email");
    foreach($campos as $campo)
        if(array_key_exists($campo, $_POST))
            $data[$campo] = $_POST[$campo];
    
    $response = Requests::send("http://localhost:3000/pessoa", Requests::POST, $data);

    if($response === false)
        die("falha na requisição");

    header("Location: index.php", true);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: monospace;
        }

        p {
            text-align: center;
        }
        
        table {
            width: 100%;
            border: 1px solid gray;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            border: 1px solid gray;
            padding: 4px;
        }
        input[type='text'] {
            width: 100%;
        }
        fieldset {
            border: none;
        }
    </style>
</head>
<body>
    <form action="incluir.php" method="post">
        <fieldset>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>
        </fieldset>
        <fieldset>
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required>
        </fieldset>
        <fieldset>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
        </fieldset>
        <p><button type="reset">Limpar</button><button type="submit">Enviar</button></p>
    </form>
</body>
</html>