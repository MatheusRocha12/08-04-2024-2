<?php
require_once('./conexao.php');
session_start();

$txtNomeLinhaDoTempo = $_POST['txtNomeLinhaDoTempo'];
$txtDescricaoLinhaDoTempo = $_POST['txtDescricaoLinhaDoTempo'];

$str_sql_cadastrar_linha_do_tempo = "INSERT INTO `linhas_do_tempo` (`nome`, `descricao`) VALUES ('$txtNomeLinhaDoTempo', '$txtDescricaoLinhaDoTempo')";

try {
    $cadastrar_linha_do_tempo = mysqli_query($conexao, $str_sql_cadastrar_linha_do_tempo);
    if ($cadastrar_linha_do_tempo) {
        $ultimo_id = $conexao->insert_id;
        $_SESSION['idLinhaDoTempo'] = $ultimo_id;
        die('idLinhaDoTempo: ' . $_SESSION['idLinhaDoTempo']);
    } else {
        die('Não foi possível cadastrar a linha do tempo. Erro: ' . mysqli_error($conexao));
    }
} catch(Exception $e) {
    die('Não foi possível cadastrar a linha do tempo. Erro: ' . $e->getMessage());
}
?>
