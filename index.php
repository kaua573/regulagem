<?php
//descobrir densidade kg/ha
//cria as variaveis
$espacamento_linhas1 = 0; 
$metros_coletados = 0;  
$qtd_coletada = 0;  
$densidade = 0;  
//atribui para variavel o valor do formulario
$espacamento_linhas1 = $_POST["espaco_linhas1"]; 
$metros_coletados = $_POST["metros_coletados"];
$qtd_coletada = $_POST["qtd_coletada"];
//conta para saber a densidade de adubo por ha com base na coleta
$densidade = (10000 / $espacamento_linhas1) * $qtd_coletada / $metros_coletados / 1000; 

//descobrir quanto coletar
//cria as variaveis
$espacamento_linhas2 = 0;
$metros_avaliados = 0;
$qtd_desejada = 0;
$qtd_coletar = 0;
//atribui para variavel o valor do formulario
$espacamento_linhas2 = $_POST["espaco_linhas2"];
$metros_avaliados = $_POST["metros_avaliados"];
$qtd_desejada = $_POST["qtd_desejada"];
// conta para saber o quanto tem que ser coletado, baseado na densidade de adubo desejada
$qtd_coletar = $metros_avaliados * $qtd_desejada / (10000 / $espacamento_linhas2) * 1000;

?>
<!DOCTYPE html>
<html>
    <head>
        <Title>Adubo</Title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h3>Adubo</h3>
        <!--Formulario para coletar dados para densidade-->
       <form action="index.php" method="post">
           Espaçamento entre Linhas: <input type="number" name='espaco_linhas1' step="any">
           Metros Coletados: <input type="number" name='metros_coletados' step="any">
           Quanidade Coletada (g): <input type="number" name='qtd_coletada' step="any">
           <input type=submit value="Descobrir Densidade de Adubo">
        </form>
        <!--Exibir resultado da conta de Densidade-->
        <?php echo "A densidade de adubo é (kg/ha): " . $densidade;?>
        <!--Formulario para coletar dados para quantidade a ser coletada-->
        <form action="index.php" method="post">
           Espaçamento entre Linhas: <input type="number" name='espaco_linhas2' step="any">
           Metros Avaliados: <input type="number" name='metros_avaliados' step="any">
           Quanidade Desejada (kg/ha): <input type="number" name='qtd_desejada' step="any">
           <input type=submit value="Descobrir qtd a ser Coletada">
        </form>
        <!--Exibir resultado da conta de quanto Coletar-->
        <?php echo "A quantidade de adubo a ser coletada é (g): " . $qtd_coletar;?>
        <h3>Regular Pulverização</h3>
    </body>
</html>