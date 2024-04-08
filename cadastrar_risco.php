<?php
require_once('./conexao.php');
session_start();

$txtNomeRisco = $_POST['txtNomeRisco'];
$txtDescricaoRisco = $_POST['txtDescricaoRisco'];

$str_sql_cadastrar_risco = "INSERT INTO `riscos` (`nome`, `descricao`) VALUES ('$txtNomeRisco', '$txtDescricaoRisco')";

try {
    $cadastrar_risco = mysqli_query($conexao, $str_sql_cadastrar_risco);
    if ($cadastrar_risco) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idRisco'] = $ultimo_id;
        die('idRisco: ' . $_SESSION['idRisco']);
    } else {
        die('Não foi possível cadastrar o risco. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o risco. Erro: ' . $e->getMessage());
}
?>
