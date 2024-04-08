<?php
require_once('./conexao.php');
session_start();

$txtNomePremissa = $_POST['txtNomePremissa'];
$txtDescricaoPremissa = $_POST['txtDescricaoPremissa'];

$str_sql_cadastrar_premissa = "INSERT INTO `premissas` (`nome`, `descricao`) VALUES ('$txtNomePremissa', '$txtDescricaoPremissa')";

try {
    $cadastrar_premissa = mysqli_query($conexao, $str_sql_cadastrar_premissa);
    if ($cadastrar_premissa) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idPremissa'] = $ultimo_id;
        die('idPremissa: ' . $_SESSION['idPremissa']);
    } else {
        die('Não foi possível cadastrar a premissa. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar a premissa. Erro: ' . $e->getMessage());
}
?>
