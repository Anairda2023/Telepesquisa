<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "cadastro";


$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $cep = $conn->real_escape_string($_POST['cep']);
    $rua = $conn->real_escape_string($_POST['rua']);
    $numero = $conn->real_escape_string($_POST['numero']);
    $bairro = $conn->real_escape_string($_POST['bairro']);
    $estado = $conn->real_escape_string($_POST['estado']);
    $whatsapp = $conn->real_escape_string($_POST['whatsapp']);
    $cnpj_cpf = $conn->real_escape_string($_POST['cnpj_cpf']);

    
    $sql = "INSERT INTO empresas (nome, cep, rua, numero, bairro, estado, whatsapp, cnpj_cpf)
            VALUES ('$nome', '$cep', '$rua', '$numero', '$bairro', '$estado', '$whatsapp', '$cnpj_cpf')";

  
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'formulario.html';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $conn->error . "'); window.history.back();</script>";
    }
}

$conn->close();
?>
