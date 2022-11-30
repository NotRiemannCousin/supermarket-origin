<?php
 

require_once '../res/scripts/blackmesa.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancos de Dados</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php include_once '../res/php/header.php'; ?>
    <main>
        <?php




        ?>
        <div class="division hello" style="grid-area: hello">
            <h2>
                <?= "Olá, $_USER->name!" ?>
                </2>
        </div>

        <div class="division content" style="grid-area: content">
            <h3>Produtos</h3>
            <table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Preço</td>
                        <td>Em Estoque</td>
                        <td>Detalhes</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (R::findAll('product') as $product) {
                    ?>
                        <tr <?= $product['storage'] ?: 'style="background-color: var(---gray-alpha-50); color: var(---gray-1)"' ?>>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format($product['price'], 2) ?>&nbsp;R$</td>
                            <td><?= ($product['storage'] ? 'sim' : 'não') ?></td>
                            <td>
                                <a <?= 'href="details/details.php?id=' . $product['id'] . '"' ?>>
                                    <svg viewBox="0 0 500 500" style="height:1.4em">
                                        <path d="M 458.178 420.222 L 412.975 463.874 L 257.294 302.66 L 257.378 302.579 C 236.123 315.094 211.348 322.273 184.896 322.273 C 105.88 322.273 41.823 258.216 41.823 179.198 C 41.823 100.182 105.88 36.125 184.896 36.125 C 263.914 36.125 327.971 100.182 327.971 179.198 C 327.971 209.057 318.825 236.778 303.181 259.714 L 458.178 420.222 Z M 184.896 81.892 C 131.157 81.892 87.59 125.459 87.59 179.198 C 87.59 232.94 131.157 276.504 184.896 276.504 C 238.638 276.504 282.203 232.94 282.203 179.198 C 282.203 125.459 238.638 81.892 184.896 81.892 Z" style="stroke: black; fill: var(---gray-1);" data-bx-origin="-0.10045 -0.084454"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="division config" style="grid-area: config">

            <table>
                <thead>
                    <tr>
                        <td colspan="2">
                            <h3>Configurações</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ativo</td>
                        <td>sim</td>
                    </tr>
                    <tr>
                        <td>Cargo</td>
                        <td> <?= $offices[$_USER->office] ?> </td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td> <?= $_USER->genre ?> </td>
                    </tr>
            </table>

            <?= in_array($_USER->office, [0, 2, 3]) ? '<a class="link" href="management/add-product.php">Adicionar Produto</a>' : '' ?>
        </div>
    </main>
    <?php include_once '../res/php/footer.php';
    R::close(); ?>
</body>

</html>