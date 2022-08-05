<?php

//Constantes para armazenamento das variáveis de conexão.
$host = "localhost";
$user = "root";
$pass = "147258çç";
$dbname = "PDOPHP";

try {
    //Conexão com o MySQL
    $dsn = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $user, $pass);
    //echo "Conectado com o banco de dados";

    //Conexão nativa com o Postgres
    // $conn = pg_connect("host=" . HOST ."dbname=" . DBNAME . "user=" . USER . "password=" . PASSWORD, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {

    echo 'A conexão falhou e retornou a seguinte mensagem de erro: ' . $e->getMessage();
}

/***PREPARAÇÃO E INSERÇÃO NO BANCO DE DADOS ***/
$stmt = $dsn->prepare("INSERT INTO cliente(nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente) VALUES (?, ?, ?, ?) ");

$resultSet = $stmt->execute([
        $_REQUEST['nome_cliente'],
        $_REQUEST['cpf_cliente'], $_REQUEST['email_cliente'],
        $_REQUEST['data_nascimento_cliente']
    ]);

if ($resultSet) {
    //echo "Os dados foram inseridos com sucesso.";
} else {
    echo "Ocorreu um erro e não foi possível inserir os dados.";
    exit;
}

/***PREPARAÇÃO E SELEÇÃO NO BANCO DE DADOS ***/
$instrucaoSQL = "Select id_cliente, nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente From cliente";
$resultSet = $dsn->query($instrucaoSQL);

//Destruindo o objecto statement e fechando a conexão
$stmt = null;
$dsn = null;

?>



<!DOCTYPE html>
<html>

<head>
    <title>Formulário HTML - Listagem de Clientes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Listagem de Clientes</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#
                                            <th scope="col">Nome
                                            <th scope="col">CPF
                                            <th scope="col">E-mail
                                            <th scope="col">Data de Nascimento
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id_cliente']; ?></th>
                                                <td><?php echo $row['nome_cliente']; ?></td>
                                                <td><?php echo preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $row['cpf_cliente']); ?></td>
                                                <td><?php echo $row['email_cliente']; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($row['data_nascimento_cliente'])); ?></td>
                                            </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>