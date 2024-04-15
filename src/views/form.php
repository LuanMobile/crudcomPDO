<?php $this->layout('master', ['title' => $title]) ?>


<div class="container p-5">
    <h1>Formulário - Cadastro de Clientes</h1>
    <form action="/form" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" name="name" class="form-control" placeholder="Digite seu nome completo">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">CPF</label>
            <input type="email" name="email" class="form-control" placeholder="Digite seu CPF">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Email</label>
            <input type="text" name="subject" class="form-control" placeholder="Digite seu email">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.
        </div>
        <div class="mb-3">
            <label for="message">Data de Nascimento</label>
            <input type="date" name="" id="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>