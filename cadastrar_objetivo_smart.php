<?php
require_once('./conexao.php');
session_start();

$txtNomeObjetivoSmart = $_POST['txtNomeObjetivoSmart'];
$txtDescricaoObjetivoSmart = $_POST['txtDescricaoObjetivoSmart'];

$str_sql_cadastrar_objetivo_smart = "INSERT INTO `objetivos_smart` (`nome`, `descricao`) VALUES ('$txtNomeObjetivoSmart', '$txtDescricaoObjetivoSmart')";

try {
    $cadastrar_objetivo_smart = mysqli_query($conexao, $str_sql_cadastrar_objetivo_smart);
    if ($cadastrar_objetivo_smart) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idObjetivoSmart'] = $ultimo_id;
        die('idObjetivoSmart: ' . $_SESSION['idObjetivoSmart']);
    } else {
        die('Não foi possível cadastrar o objetivo SMART. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o objetivo SMART. Erro: ' . $e->getMessage());
}
?>
