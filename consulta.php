<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Veterinario</title>
</head>

<body>
    <script>
        //função pra copiar consulta (implode)
        function Copiar(consulta) {
            console.log(consulta);
            navigator.clipboard.writeText(consulta);
            alert("Resultado da consulta: " + consulta + ".");
        }
    </script>
    <?php
    //classificações de animais atendidos na clinica
    $petsAtendidos = array("Gato", "Cachorro", "Peixe", "Hamster");
    $sivelstresAtendidos = array("Veado", "Jaguatirica", "Tamanduá");
    //filtro generico (merge)
    $totalAnimais = array_merge($petsAtendidos, $sivelstresAtendidos);
    ?>
    <form method="POST" action="">
        <label for="especifico">Procure um animal especifico:</label>
        <input type="text" id="especifico" name="especifico">

        <label for="animais">Escolha os tipos de animais:</label>
        <select name="animais" id="seletor">
            <option value="total">Todos os animais</option>
            <option value="pets">Apenas Pets</option>
            <option value="silvestres">Apenas Silvestres</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura o valor selecionado
        $tipoAnimal = $_POST['animais'];
        if ($tipoAnimal == "pets") {
            $resultado = $petsAtendidos;
        } elseif ($tipoAnimal == "silvestres") {
            $resultado = $sivelstresAtendidos;

        } elseif ($tipoAnimal == "total") {

            $resultado = $totalAnimais;
        }
        //verifica se há uma consulta especifica
        if (!empty($_POST['especifico'])) {
            //captura o valor do html
            $especifico = htmlspecialchars($_POST['especifico']);
            //verifica se o valor do html está no array
            $encontrado = in_array($especifico, $resultado);

            //condicional baseada na presença do valor especifico no array
            if ($encontrado) {
                echo "<p class=''>Resultado da consulta: Animal Encontrado</p>";
                //parametro para poder copiar a consulta, caso necessário
                $parametro = '"' . $especifico . '"';
                echo "<button onclick='Copiar(" . $parametro . ")'>Copiar Consulta</button>";
                echo "<img class='' src='imgs/" . $especifico . ".png' alt=" . $especifico . ">";
            } else {
                echo "<p class=''>Resultado da consulta: Sem resultados</p>";
            }

        }
        //else se caso não há consulta especifica
        else {
            //coloca a consulta em ordem alfabetica (Sort)
            sort($resultado);
            //conta a quantidade de animais correspondentes na consulta (Count)
            $quantidade = count($resultado);
            echo "<div><div><p class=''>Resultado da consulta: " . $quantidade . " resultado(s)</p>";
            
            //transfomação o array em string (implode) e criação de parametro para poder copiar a consulta, caso necessário
            $animais = implode(", ", $resultado);
            $parametro = '"' . $animais . '"';
            echo "<button onclick='Copiar(" . $parametro . ")'>Copiar Consulta</button></div>";
            
            //mostrando todos os itens correnspondetes a consulta e suas respectivas fotos (manipulação de imagem) atráves de um for
            echo "<div class=''>";
            for ($i = 0; $i < $quantidade; $i++) {
                echo "<div class=''>";
                echo "<p class=''>" . $resultado[$i] . "</p>";
                echo "<img class='' src='imgs/" . $resultado[$i] . ".png' alt=" . $resultado[$i] . ">";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
            }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA5NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>