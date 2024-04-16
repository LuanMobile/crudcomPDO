<?php $this->layout('master', ['title' => $title]) ?>

<div class="container p-5">
    <h1>Lista de Clientes</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col">Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clientes as $index => $cliente) {
                echo "<tr>";
                echo '<th scope="row">' . ++$index . '</th>';
                echo "<td>" . $cliente['name'] . "</td>"; // Nome
                echo "<td>" . $cliente['cpf'] . "</td>"; // CPF
                echo "<td>" . $cliente['email'] . "</td>"; // Email
                echo "<td>" . date("d/m/Y", strtotime($cliente['data_nasc'])) . "</td>"; // Data de Nascimento
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>