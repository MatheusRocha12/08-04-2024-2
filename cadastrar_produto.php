<?php
require_once('./conexao.php');
session_start();

$txtNomeProduto = $_POST['txtNomeProduto'];
$txtDescricaoProduto = $_POST['txtDescricaoProduto'];

$str_sql_cadastrar_produto = "INSERT INTO `produtos` (`nome`, `descricao`) VALUES ('$txtNomeProduto', '$txtDescricaoProduto')";

try {
    $cadastrar_produto = mysqli_query($conexao, $str_sql_cadastrar_produto);
    if ($cadastrar_produto) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idProduto'] = $ultimo_id;
        die('idProduto: ' . $_SESSION['idProduto']);
    } else {
        die('Não foi possível cadastrar o produto. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o produto. Erro: ' . $e->getMessage());
}
?>
