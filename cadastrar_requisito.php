<?php
require_once('./conexao.php');
session_start();

$txtNomeRequisito = $_POST['txtNomeRequisito'];
$txtDescricaoRequisito = $_POST['txtDescricaoRequisito'];

$str_sql_cadastrar_requisito = "INSERT INTO `requisitos` (`nome`, `descricao`) VALUES ('$txtNomeRequisito', '$txtDescricaoRequisito')";

try {
    $cadastrar_requisito = mysqli_query($conexao, $str_sql_cadastrar_requisito);
    if ($cadastrar_requisito) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idRequisito'] = $ultimo_id;
        die('idRequisito: ' . $_SESSION['idRequisito']);
    } else {
        die('Não foi possível cadastrar o requisito. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o requisito. Erro: ' . $e->getMessage());
}
?>
