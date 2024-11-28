<?php 
require("Requests.php");

if(strtoupper($_SERVER["REQUEST_METHOD"]) == "POST")
    die("método não permitido");

$response = Requests::send("http://localhost:3000/pessoa", Requests::GET, array());

if($response === false)
    die("requisicao não respondida.");

$pessoas = json_decode($response, true);
if($pessoas === null)
    die("não foi posível fazer a requisicao");
?>
<!DOCTYPE html>
<html lang="pt">
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
    </style>
</head>
<body>
    <p><a href="incluir.php">Incluir Pessoa</a></p>

    <table>
        <tr>
            <td>id</td>
            <td>nome</td>
            <td>telefone</td>
            <td>email</td>
        </tr>
        <?php foreach($pessoas as $pessoa) { ?>
            <tr>
                <td><?=$pessoa["id"] ?></td>
                <td><?=$pessoa["nome"] ?></td>
                <td><?=$pessoa["telefone"] ?></td>
                <td><?=$pessoa["email"] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>