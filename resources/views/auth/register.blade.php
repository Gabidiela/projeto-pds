<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Conexão Musical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=id_card" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            margin: 0;
        }

        button {
            border: 2px solid #333;

            &:focus {
                outline: 2px solid #333;
                outline-offset: 2px;
            }
        }

        .main-flex-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #F5F4F6;

            .piano-container {
                width: 50%;
                height: inherit;
                overflow: hidden;

                img {
                    width: 50vw;
                    height: inherit;
                    position: relative;
                    object-fit: cover;
                    object-position: center;
                }
            }

            .right-container {
                width: 50%;
                height: inherit;
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

                .logo-container {
                    position: absolute;
                    top: 16px;
                    left: 16px;
                    display: flex;
                    align-items: center;
                    margin-bottom: 20px;
                    gap: 10px;
                    cursor: default;

                    .logo-img {
                        width: 45px;
                        height: 45px;
                    }

                    .logo-text {
                        font-size: 1rem;

                        span {
                            font-weight: bold;
                        }
                    }
                }

                .user-type-buttons {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 10px;
                    margin-bottom: 32px;

                    h3 {
                        font-weight: bold;
                        color: #333;
                    }

                    .buttons-container {
                        display: flex;
                        gap: 20px;

                        button {
                            width: 150px;
                            padding: 8px 16px;
                            border-radius: 12px;

                            &.selected {
                                background-color: #333;
                                color: #fff;
                            }

                            &:hover {
                                background-color: #333;
                                color: #fff;
                            }
                        }
                    }
                }

                .form-container {
                    width: 100%;
                    max-width: 450px;

                    .input-container {
                        margin-bottom: 16px;
                        display: flex;
                        gap: 8px;
                        align-items: center;
                        padding: 12px 16px;
                        background-color: #fff;
                        border: 1px solid #333;
                        border-radius: 10px;

                        input {
                            border: none;
                            outline: none;
                            width: 100%;
                        }
                    }

                    .form-button {
                        width: 100%;
                        padding: 8px 16px;
                        border-radius: 12px;
                        background-color: #333;
                        color: #fff;

                        &:hover {
                            background-color: #fff;
                            color: #333;
                        }
                    }

                    .page-buttons {
                        position: relative;
                        display: flex;
                        gap: 30px;
                        justify-content: center;
                        margin-top: 16px;

                        button {
                            border-radius: 50%;
                            padding: 8px;
                            width: 45px;
                            height: 45px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            z-index: 20;
                            cursor: pointer;
                            color: #fff;

                            &.on-page {
                                background-color: #333;
                            }

                            &:not(.on-page) {
                                background-color: #676565;
                                pointer-events: none;
                            }
                        }

                        .line {
                            width: 20%;
                            margin-left: auto;
                            margin-right: auto;
                            border: 1px solid #333;
                            opacity: 1;
                            position: absolute;
                            top: 4px;
                        }
                    }
                }

                .cpf{
                    color: #333 !important;
                }

                .to-login-link {
                    margin-top: 16px;
                    
                    a {
                        color: #333;
                        text-decoration: none;
                        font-weight: bold;

                        &:hover {
                            text-decoration: underline;
                        }
                    }
                }
                .button-container {
                    display: flex;
                    gap: 10px;
                    justify-content: space-between;
                }

                .button-container .form-button {
                    width: 48%; /* Ajuste a largura para 48% para que ambos os botões caibam lado a lado */
                }
            }
        }
    </style>
</head>
<body>
    <div class="main-flex-container">
        <!-- Imagem do piano -->
        <div class="piano-container">
            <img src="{{ asset('img/piano.png') }}" alt="Piano">
        </div>

        <!-- Formulário de cadastro -->
        <div class="right-container">
            <div class="logo-container">
                    <img src="{{ asset('img/cm-logo-p.png') }}" alt="Logo Conexão Musical" class="logo-img">
                    <span class="logo-text"><span>Conexão </span>Musical</span>
            </div>  
            <div class="user-type-buttons">
                <h3>Preencha os campos abaixo:</h3>
                <div class="buttons-container">
                    <button class="selected">Sou professor</button>
                    <button class="">Sou aluno</button>
                </div>
            </div>

            <div class="form-container">
                <form method="POST" action="{{ route('register') }}" id="registrationForm">
                    @csrf
                    
                    <!-- Etapa 1 -->
                    <div class="form-step" id="step-1">
                        <div class="input-container">
                            <span><i class="bi bi-person"></i></span>
                            <input type="text" id="name" name="name" placeholder="Insira seu nome completo" required>
                        </div>
                        <div class="input-container">
                            <span><i class="bi bi-envelope"></i></span>
                            <input type="email" id="email" name="email" placeholder="Insira seu e-mail" required>
                        </div>
                        <div class="input-container">
                            <span><i class="bi bi-lock"></i></span>
                            <input type="password" id="password" name="password" placeholder="Insira sua senha" required>
                        </div>
                        <div class="input-container">
                            <span><i class="bi bi-lock"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita sua senha" required>
                        </div>
                        <button type="button" class="form-button" onclick="validateAndProceed()">Próximo</button>
                    </div>
                    <!-- Etapa 2 -->
                    <div class="form-step" id="step-2" style="display: none;">
                        <h4 style="font-weight: 300;">Fale sobre você</h4>
                        <div class="input-container">
                            <span><i class="bi bi-person-vcard"></i></span>
                        <input class="cpf" type="text" name="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" autocomplete="cpf" placeholder="Insira seu CPF">
                        </div>
                        <div class="input-container">
                            <span><i class="bi bi-calendar"></i></span>
                            <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Insira sua data de nascimento" required>
                        </div>
                        <div class="input-container">
                            <span><i class="bi bi-telephone"></i></span>
                            <input class="telefone" type="text" id="telefone" name="telefone" pattern="\(\d{2}\) \d{4,5}-\d{4}" placeholder="Insira seu telefone" required>
                        </div>
                        <div class="button-container">
                            <button type="button" class="form-button" onclick="prevStep()">Anterior</button>
                            <button type="submit" class="form-button" onclick="nextStep()">Finalizar Cadastro</button>
                        </div>
                    </div>
                </form>
                
                <!-- Indicador de progresso -->
                <div class="page-buttons ">
                    <button type="button" id="page-1" class="on-page">1</button>
                    <button type="button" id="page-2">2</button>
                    <hr class="line">

                </div>
            </div>
            <span class="to-login-link">Já possui uma conta? <a href="{{ route('login') }}">Faça Login</a></span>
        </div>
    </div>

    <script>
        // Função para verificar se todos os campos estão preenchidos
        function checkInputs() {
            const inputs = document.querySelectorAll('#step-1 input');
            return Array.from(inputs).every(input => input.value.trim() !== '');
        }

        // Função para validar e prosseguir para a próxima etapa
        function validateAndProceed() {
            if (checkInputs()) {
                nextStep();
            } else {
                alert("Por favor, preencha todos os campos antes de continuar.");
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('#step-1 input');

            // Adiciona um evento 'input' em cada campo para verificar em tempo real
            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    document.querySelector('.form-button').classList.toggle('disabled', !checkInputs());
                });
            });
        });
    </script>


    <script>
        let currentStep = 1;

        function showStep(step) {
            // Esconder todas as etapas
            document.querySelectorAll('.form-step').forEach((element) => {
                element.style.display = 'none';
            });
            // Mostrar a etapa atual
            document.getElementById('step-' + step).style.display = 'block';

            // Atualizar indicador de progresso
            document.querySelectorAll('.page-buttons button').forEach((element) => {
                element.classList.remove('on-page');
            });
            document.getElementById('page-' + step).classList.add('on-page');
        }

        function nextStep() {
            currentStep++;
            if (currentStep > 2) currentStep = 2;
            showStep(currentStep);
        }

        function prevStep() {
            currentStep--;
            if (currentStep < 1) currentStep = 1;
            showStep(currentStep);
        }

        // Mostrar a primeira etapa ao carregar a página
        document.addEventListener('DOMContentLoaded', () => {
            showStep(currentStep);
        });
    </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
