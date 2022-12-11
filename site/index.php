<?php


require_once '../res/scripts/blackmesa.php';


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Origin</title>
   <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
   <?php include_once '../res/php/header.php'; ?>
   <main>
      <?php
      ?>
      <div class="division hello" style="grid-area: hello">
         <h2>
            <?= "Olá, {$_USER->getName()}!" ?>
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
                  <tr
                     <?= $product['storage'] ?: 'style="background-color: var(---gray-alpha-50); color: var(---gray-1)"' ?>>
                     <td><?= $product['name'] ?></td>
                     <td><?= number_format($product['price'], 2) ?>&nbsp;R$</td>
                     <td><?= ($product['storage'] ? 'sim' : 'não') ?></td>
                     <td>
                        <a <?= 'href="details/manage.php?id=' . $product['id'] . '"' ?>>
                           <svg viewBox="0 0 500 500" style="height:1.4em">
                              <path
                                 d="M 458.178 420.222 L 412.975 463.874 L 257.294 302.66 L 257.378 302.579 C 236.123 315.094 211.348 322.273 184.896 322.273 C 105.88 322.273 41.823 258.216 41.823 179.198 C 41.823 100.182 105.88 36.125 184.896 36.125 C 263.914 36.125 327.971 100.182 327.971 179.198 C 327.971 209.057 318.825 236.778 303.181 259.714 L 458.178 420.222 Z M 184.896 81.892 C 131.157 81.892 87.59 125.459 87.59 179.198 C 87.59 232.94 131.157 276.504 184.896 276.504 C 238.638 276.504 282.203 232.94 282.203 179.198 C 282.203 125.459 238.638 81.892 184.896 81.892 Z"
                                 style="stroke: black; fill: var(---gray-1);"
                                 data-bx-origin="-0.10045 -0.084454"></path>
                           </svg>
                        </a>
                        <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 500 500" height="1.4em" id="svg2999" version="1.1" inkscape:version="0.48.4 r9939" width="100%" sodipodi:docname="sla.svg">
                           <path inkscape:connector-curvature="0" id="path3003" data-bx-origin="-0.967992 -0.827544" d="m 31.995955,22.836475 83.522325,32.024996 c 12.36236,15.925327 10.96025,38.943446 -3.89815,53.229709 -15.425623,14.83384 -39.68624,14.80561 -55.075034,0.26397 L 31.995955,22.836475 z" style="fill:#ffffff" />
                           <path inkscape:connector-curvature="0" id="path3005" data-bx-origin="-0.204248 -0.175438" d="m 32.092948,22.783681 31.74875,12.17328 c 4.697425,6.054104 4.164575,14.803151 -1.483139,20.232323 -5.862573,5.637892 -15.084309,5.62807 -20.934604,0.100677 z m 26.056836,87.295249 0.187848,-0.18048 c 15.428082,12.9259 38.443746,12.41024 53.282498,-1.86006 14.83876,-14.26785 16.25683,-37.244225 3.94604,-53.168324 l 0.10927,-0.10436 327.76142,340.867804 -0.0111,0.0111 13.43051,13.96704 c 15.28566,15.89586 14.78965,41.17307 -1.10621,56.4575 -15.89587,15.28444 -41.17307,14.78965 -56.4575,-1.10621 L 125.71732,180.447 c -0.54881,-0.56969 -1.07675,-1.15288 -1.58382,-1.74589 z" />
                        </svg>
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
                  <td> <?= $_USER->getOffice() ?> </td>
               </tr>
               <tr>
                  <td>Sexo</td>
                  <td> <?= $_USER->getGenre() ?> </td>
               </tr>
            </table>

            <?= $_USER->hasPermissions(Permission::AddProducts) ? '<a class="link" href="management/add-product/index.php">Adicionar Produto</a>' : '' ?>
         </div>
      </main>
      <?php include_once '../res/php/footer.php';
      R::close(); ?>
   </body>

</html>