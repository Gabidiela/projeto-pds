@extends('layouts.public')

@section('title', 'CM - Editar Professor')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
    /* Estilos Gerais */
    body {
        font-family: 'Montserrat', sans-serif;
    }

    h2 {
        text-align: left;
        margin-top: 2%;
        margin-left: 5%;
        color: #333333;
        font-weight: 300;
        font-size: 24px;
    }

    hr.linha-home {
        margin-left: 5%;
        margin-top: 1%;
        margin-bottom: 5%;
        width: 40%;
        border: 1px solid black;
    }

    /* Card principal */
    .card {
        width: 90%;
        margin: auto;
        border-radius: 23px;
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.3);
    }

    /* Cabeçalho do Card */
    .card-header {
        background-color: #333333;
        color: white;
        border-radius: 15px 15px 0 0 !important;
        padding: 15px;
        font-size: 1.2rem;
    }

    /* Títulos de Seções */
    .section-title {
        font-weight: bold;
        margin-top: 20px;
        font-size: 1.2rem;
        color: #333333;
    }

    /* Inputs e ícones */
    .input-group-text {
        background-color: #fff;
        border: 1px solid #333333;
        border-radius: 10px 0 0 10px;
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.3);
    }

    .form-control {
        border: 1px solid #333333;
        border-radius: 0 10px 10px 0;
        padding-left: 10px;
        box-shadow: none;
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.3);
        color: #333 !important;
    }

    .input-group {
        margin-bottom: 20px;
    }

    /* Botões */
    .btn-save {
        background-color: #333333;
        color: #fff;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: bold;
        transition: background-color 0.3s;
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.3);

    }

    .btn-save:hover {
        background-color: #555555;
        color: #fff;
    }

    .btn-cancel {
        background-color: #f5f5f5;
        color: #333333;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: bold;
        margin-left: 10px;
        transition: background-color 0.3s;
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.3);

    }

    .btn-cancel:hover {
        background-color: #e0e0e0;
    }

    .btn-delete {
        background-color: #bb2d3b;
        color: #fff;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: bold;
        margin-left: 10px;
        transition: background-color 0.3s;
        box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.3);
    }

    .btn-delete:hover {
        background-color: #ff6666;
        color: #fff;
    }
</style>

<h2>Gerenciar <span style="font-weight: bold;">Professores</span></h2>
<hr class="linha-home">

<div class="card">
    <div class="card-header">
        Professores - Cadastrar
    </div>
    <div class="card-body">
        <form action="{{ route('professor.store') }}" method="POST">
            @csrf            
            <!-- Dados Pessoais -->
            <h3 class="section-title">Dados Pessoais</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome do Professor</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do professor" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                        <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="Insira o CPF" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insira o E-mail" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Número de Telefone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="tel" class="form-control telefone" id="telefone" name="telefone" placeholder="Insira o telefone" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>
                </div>
            </div>

            <!-- Segurança -->
            <h3 class="section-title">Segurança</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Insira a senha" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="confirm_password" class="form-label">Confirmar senha</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repita a senha" required>
                    </div>
                </div>
            </div>

            <!-- Botões de ação -->
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-save"><i class="bi bi-save"></i> Salvar alterações</button>
                <a href="{{ route('professor.list') }}" class="btn btn-cancel"><i class="bi bi-x-circle"></i> Cancelar</a>
            </div>
        </form>
    </div>
</div>


@endsection
