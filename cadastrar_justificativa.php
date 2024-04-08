<?php
require_once('./conexao.php');
session_start();

$txtNomeJustificativa = $_POST['txtNomeJustificativa'];
$txtDescricaoJustificativa = $_POST['txtDescricaoJustificativa'];

$str_sql_cadastrar_justificativa = "INSERT INTO `justificativas` (`nome`, `descricao`) VALUES ('$txtNomeJustificativa', '$txtDescricaoJustificativa')";

try {
    $cadastrar_justificativa = mysqli_query($conexao, $str_sql_cadastrar_justificativa);
    if ($cadastrar_justificativa) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idJustificativa'] = $ultimo_id;
        die('idJustificativa: ' . $_SESSION['idJustificativa']);
    } else {
        die('Não foi possível cadastrar a justificativa. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar a justificativa. Erro: ' . $e->getMessage());
}
?>
