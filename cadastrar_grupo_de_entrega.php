<?php
require_once('./conexao.php');
session_start();

$txtNomeGrupoDeEntrega = $_POST['txtNomeGrupoDeEntrega'];
$txtDescricaoGrupoDeEntrega = $_POST['txtDescricaoGrupoDeEntrega'];

$str_sql_cadastrar_grupo_de_entrega = "INSERT INTO `grupos_de_entrega` (`nome`, `descricao`) VALUES ('$txtNomeGrupoDeEntrega', '$txtDescricaoGrupoDeEntrega')";

try {
    $cadastrar_grupo_de_entrega = mysqli_query($conexao, $str_sql_cadastrar_grupo_de_entrega);
    if ($cadastrar_grupo_de_entrega) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idGrupoDeEntrega'] = $ultimo_id;
        die('idGrupoDeEntrega: ' . $_SESSION['idGrupoDeEntrega']);
    } else {
        die('Não foi possível cadastrar o grupo de entrega. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o grupo de entrega. Erro: ' . $e->getMessage());
}
?>
