<?php
require_once('./conexao.php');
session_start();

$txtNomeProjeto = $_POST['txtNomeProjeto'];
$txtDescricaoProjeto = $_POST['txtDescricaoProjeto'];   

$str_sql_cadastrar_projeto = "INSERT INTO `projetos` (`nome`, `descricao`) VALUES ('$txtNomeProjeto', '$txtDescricaoProjeto')";

try {
    $cadastrar_projeto = mysqli_query($conexao, $str_sql_cadastrar_projeto);
    if ($cadastrar_projeto) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idProjeto'] = $ultimo_id;
        die('idProjeto: ' . $_SESSION['idProjeto']);
    } else {
        die('Não foi possível cadastrar o projeto. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o projeto. Erro: ' . $e->getMessage());
}
?>
