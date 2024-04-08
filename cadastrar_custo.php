<?php
require_once('./conexao.php');
session_start();

$txtNomeCusto = $_POST['txtNomeCusto'];
$txtDescricaoCusto = $_POST['txtDescricaoCusto'];

$str_sql_cadastrar_custo = "INSERT INTO `custos` (`nome`, `descricao`) VALUES ('$txtNomeCusto', '$txtDescricaoCusto')";

try {
    $cadastrar_custo = mysqli_query($conexao, $str_sql_cadastrar_custo);
    if ($cadastrar_custo) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idCusto'] = $ultimo_id;
        die('idCusto: ' . $_SESSION['idCusto']);
    } else {
        die('Não foi possível cadastrar o custo. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar o custo. Erro: ' . $e->getMessage());
}
?>
