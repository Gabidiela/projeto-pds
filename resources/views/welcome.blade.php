@extends('layouts.public')

@section('content')
<div class="main-content d-flex justify-content-center align-items-center flex-column">
                <h1 class="title-c">Conexão<span class="title-m"> Musical</span></h1>
                <div class="d-flex align-items-center">
                    <!-- Slogan alinhado à esquerda -->
                    <div class="slogan-container">
                        <h1 class="slogan">
                            Unindo <span class="highlight">paixão</span> e <span class="highlight">aprendizado</span>, 
                            onde cada <span class="highlight">nota</span> encontra seu <span class="highlight">mentor</span>.
                        </h1>
                    </div>

                    <!-- Ilustração à direita -->
                    <div class="illustration-container">
                        <img src="{{ asset('img/illustration.png') }}" alt="Ilustração" class="illustration">
                    </div>
                </div>
            </div>
@endsection