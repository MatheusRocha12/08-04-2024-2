<?php
require_once('./conexao.php');
session_start();

$txtNomeRestricao = $_POST['txtNomeRestricao'];
$txtDescricaoRestricao = $_POST['txtDescricaoRestricao'];

$str_sql_cadastrar_restricao = "INSERT INTO `restricoes` (`nome`, `descricao`) VALUES ('$txtNomeRestricao', '$txtDescricaoRestricao')";

try {
    $cadastrar_restricao = mysqli_query($conexao, $str_sql_cadastrar_restricao);
    if ($cadastrar_restricao) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idRestricao'] = $ultimo_id;
        die('idRestricao: ' . $_SESSION['idRestricao']);
    } else {
        die('Não foi possível cadastrar a restrição. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar a restrição. Erro: ' . $e->getMessage());
}
?>
