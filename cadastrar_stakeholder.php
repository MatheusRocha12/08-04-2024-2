<?php
require_once('./conexao.php');
session_start();

$txtNomeStakeholder = $_POST['txtNomeStakeholder'];
$txtDescricaoStakeholder = $_POST['txtDescricaoStakeholder'];

$str_sql_cadastrar_stakeholder = "INSERT INTO `stakeholders` (`nome`, `descricao`) VALUES ('$txtNomeStakeholder', '$txtDescricaoStakeholder')";

try {
    $cadastrar_stakeholder = mysqli_query($conexao, $str_sql_cadastrar_stakeholder);
    if ($cadastrar_stakeholder) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idStakeholder'] = $ultimo_id;
        die('idStakeholder: ' . $_SESSION['idStakeholder']);
    } else {
        die('Não foi possível cadastrar o stakeholder. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o stakeholder. Erro: ' . $e->getMessage());
}
?>
