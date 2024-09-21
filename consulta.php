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
        function Copiar(consulta) {
            console.log(consulta);
            navigator.clipboard.writeText(consulta);
            alert("Resultado da consulta: " + consulta + ".");
        }
    </script>
    <?php
    $petsAtendidos = array("Gato", "Cachorro", "Peixe", "Hamster");
    $sivelstresAtendidos = array("Veado", "Jaguatirica", "Tamanduá");
    $totalAnimais = array_merge($petsAtendidos, $sivelstresAtendidos);
    ?>
    <form method="POST" action="">
        <label for="animais">Escolha os tipos de animais:</label>

        <select name="animais" id="seletor">
            <option value="pets">Apenas Pets</option>
            <option value="silvestres">Apenas Silvestres</option>
            <option value="total">Todos os animais</option>
        </select>
        <br> <br>
        <label for="especifico">Procure um animal especifico:</label>
        <input type="text" id="especifico" name="especifico"><br>

        <input type="submit" value="Enviar">
    </form>
    <?php
    // Verifica se o formulário foi submetido
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
        if (!empty($_POST['especifico'])) {
            $especifico = htmlspecialchars($_POST['especifico']);
            $encontrado = in_array($especifico, $resultado);
            $parametro = '"' . $especifico . '"';
            if ($encontrado) {
                echo "<p class=''>Resultado da consulta: Animal Encontrado</p>";
                echo "<button onclick='Copiar(" . $parametro . ")'>Copiar Consulta</button>";
                echo "<img class='' src='imgs/" . $especifico . ".png' alt=" . $especifico . ">";
            } else {
                echo "<p class=''>Resultado da consulta: Sem resultados</p>";
            }

        } else {
            sort($resultado);
            $animais = implode(", ", $resultado);
            $quantidade = count($resultado);
            $parametro = '"' . $animais . '"';
            echo "<p class=''>Resultado da consulta: " . $quantidade . " resultado(s)</p>";

            echo "<button onclick='Copiar(" . $parametro . ")'>Copiar Consulta</button>";
            echo "<div class=''>";
            for ($i = 0; $i < $quantidade; $i++) {
                echo "<div class=''>";
                echo "<p class=''>" . $resultado[$i] . "</p>";
                echo "<img class='' src='imgs/" . $resultado[$i] . ".png' alt=" . $resultado[$i] . "><br><br>";
                echo "</div>";
            }
            echo "</div>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA5NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>