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
    <?php
    $petsAtendidos = array("Gato", "Cachorro", "Peixe", "Hamster");
    $sivelstresAtendidos = array("Veado", "Jaguatirica", "Tamanduá");
    $totalAnimais = array_merge($petsAtendidos, $sivelstresAtendidos);

    //Funções utilizadas: Count, Implode, In, Sort, Merge
    ?>
    <label for="animais">Escolha os tipos de animais:</label>

    <select name="animais" id="seletor" onchange="mostrarAnimais()">
        <option value="pets">Apenas Pets</option>
        <option value="silvestres">Apenas Silvestres</option>
        <option value="total">Todos os animais</option>
    </select>
</body>

<script>
        function mostrarAnimais() {
            const selecionado = document.getElementById("animais").value;

            // Animais disponíveis (pode ser melhorado para não usar PHP dentro do JS)
            const pets = <?php echo json_encode($petsAtendidos); ?>;
            const silvestres = <?php echo json_encode($sivelstresAtendidos); ?>;
            const todos = <?php echo json_encode($totalAnimais); ?>;

            let resultado;
            if (selecionado === "pets") {
                resultado = pets;
            } else if (selecionado === "silvestres") {
                resultado = silvestres;
            } else {
                resultado = todos;
            }

            // Exibe o resultado
            document.getElementById("resultado").innerHTML = resultado.join(", ");
            
        }
</script>
<?php 
    echo 'imgs\ . $petsAtendidos . '.png";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>