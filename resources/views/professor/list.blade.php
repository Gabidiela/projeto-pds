@extends('layouts.public')

@section('title', 'CM - Professores')

@section('content')
<style>
    /* Importação da fonte Montserrat */
    @font-face {
        font-family: "montserrat", sans-serif;
        src: url(https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap);
    }
    
    /* Estilos gerais */
    body {
        font-family: 'montserrat', sans-serif;
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
        margin-left: 5%;
        border-radius: 23px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Cabeçalho do Card */
    .card-header {
        background-color: #333333;
        color: white;
        border-radius: 23px 23px 0 0 !important;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Botão Adicionar Professor */
    .btn-adicionar-professor {
        border-radius: 15px;
        padding: 10px 20px;
        font-weight: bold;
        background-color: #ffffff;
        color: #333333;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-adicionar-professor:hover {
        background-color: #333333;
        color: #ffffff;
    }

    /* Campo de busca */
    .search-bar {
        width: 90%;
        margin: 20px 10px 20px 10px;
        display: flex;
        justify-content: flex-end;
    }

    .search-bar input { 
        border: 1px solid #333333;
        border-radius: 15px;
        padding: 8px 15px;
        font-size: 1rem;
        width: 250px;
    }

    /* Tabela */
    .card-body {
        padding: 0 20px 0 20px;
    }

    .table {
        width: calc(100% - 20px);
        margin: 0 15px;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        background-color: #fff;
        font-weight: bold;
    }

    /* Ajustando largura das colunas */
    .table th#nome, .table td.nome {
        width: 50%; /* Largura reduzida da coluna Nome */
        text-align: left;
        padding-left: 35px;
    }

    .table th#contato, .table td.telefone {
        width: 20%; /* Largura da coluna Contato */
        text-align: left;
        padding-left: 30px;
    }

    .table th#acoes, .table td.acoes {
        width: 15%; /* Largura aumentada da coluna Ações */
        text-align: left;
        padding-left: 30px;
    }

    .table th, .table td {
        padding: 10px;
        border: 1px solid #333333;
    }

    #nome {
        border-radius: 20px 0 0 0;
    }

    #acoes {
        border-radius: 0 20px 0 0;
    }

    .table tbody tr {
        border-top: 1px solid #e6e6e6;
    }

    /* Ícones de ação */
    .icon-action {
        font-size: 1.2rem;
        color: #333333;
        margin: 0 5px;
        transition: color 0.3s;
    }

    .icon-action:hover {
        color: #333333;
    }

    /* Paginação */
    .pagination-container {
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<h2>
    Gerenciar <span style="font-weight: bold;">Professores</span>
</h2>
<hr class="linha-home">

<div class="card">
    <div class="card-header">
        <span style="font-size: 1.4rem; font-weight: 400; color: white;">Professores</span>
        <a href="{{ route('professor.criar') }}" class="btn btn-light btn-adicionar-professor">
            <i class="bi bi-plus-lg"></i> Adicionar Professor
        </a>
    </div>
    
    <div class="search-bar">
        <form class="d-flex" id="form" role="search" action="{{route('professor.list')}}" method="GET">
            @if($search)
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // colocar cursor no fim do texto
                        var input = document.getElementById('seach-input');
                        input.focus();
                        input.setSelectionRange(input.value.length, input.value.length);

                    });
                </script>
            @endif
            <input id="seach-input" class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" name='search' value="{{$search}}">


            <script>
                var typingTimer;                //timer identifier
                var doneTypingInterval = 1000;  //time in ms (1 seconds)

                //on keyup, start the countdown
                $('#seach-input').keyup(function(){
                    clearTimeout(typingTimer);
                    if ($('#seach-input').val) {
                        typingTimer = setTimeout(doneTyping, doneTypingInterval);
                    }
                });

                //user is "finished typing," do something
                function doneTyping () {
                    //triger the search
                    $('#form').submit();
                }
            </script>
        </form>
    </div>

    <div class="card-body">
        <table class="table text-center align-middle table-sm">
            <thead>
                <tr>
                    <th id="nome" scope="col">Nome</th>
                    <th id="contato" scope="col">Contato</th>
                    <th id="acoes" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professores as $professor)
                <tr>
                    <td class="nome">{{$professor->nome}}</td>
                    <td class="telefone">{{$professor->telefone}}</td>
                    <td class="acoes">
                        <a href="{{ route('professor.visualizar', $professor->id) }}" class="link-secondary icon-action" title="Visualizar"><span class="material-symbols-outlined fs-4">visibility</span></a>   |
                        <a href="{{ route('professor.editar', $professor->id) }}" class="link-secondary icon-action" title="Editar"><span class="material-symbols-outlined fs-4">edit_square</span></a>   |
                        <a type="button" class="link-secondary icon-action" data-bs-toggle="modal" data-bs-target="#idModal{{ $professor->id }}" title="Excluir"><span class="material-symbols-outlined fs-4">delete</span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <!-- Paginação personalizada -->
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
@foreach($professores as $professor)
<div class="modal fade" id="idModal{{ $professor->id }}" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <!-- Aumentamos o tamanho do modal com "modal-xl" -->
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 15px; text-align: center; padding: 20px;">
            <!-- Removemos o título do modal -->
            <div class="modal-header border-0" style="justify-content: flex-end;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- Aumentamos o tamanho do ícone de alerta -->
                <img src="{{ asset('img/warning-icon.png') }}" alt="Atenção" style="width: 180px; margin-bottom: 15px;">
                <p style="font-size: 1.5rem; font-weight: 500;">Você tem certeza de que quer deletar esse usuário?</p>
                <p><strong>{{ $professor->nome }}</strong></p>
            </div>
            <div class="modal-footer border-0 d-flex justify-content-center">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" style="border-radius: 10px; padding: 10px 20px; font-weight: bold;">Não, cancelar</button>
                <a href="{{ route('professor.excluir', $professor->id) }}" class="btn btn-danger" style="border-radius: 10px; padding: 10px 20px; font-weight: bold;">Sim, deletar usuário</a>
            </div>
        </div>
    </div>
</div>
@endforeach



@endsection
