@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

<<<<<<< HEAD
                <div class="container">
                <div class="welcome-message">
                    <h2>Olá {{ Auth::user()->name }}</h2>
                    <p>O que podemos te ensinar hoje?</p>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Digite as palavras chave da busca">
                </div>
                <div class="courses">
                    <div class="course">
                        <h3>Fundamentos de programação com C#</h3>
                        <p>Nível: Medium</p>
                        <p>Duração: 72h</p>
                        <p>Score: ★★★☆☆</p>
                        <button><a href="">Ver detalhes</a></button>
                    </div>
                    <div class="course">
                        <h3>Design Paramétrico na prática</h3>
                        <p>Nível: Expert</p>
                        <p>Duração: 56h</p>
                        <p>Score: ★★★★☆</p>
                        <button><a href="../courses-detail/index.html">Ver detalhes</a></button>
                    </div>
                    <div class="course">
                        <h3>Desbravando os princípios do S.O.L.I.D</h3>
                        <p>Nível: Expert</p>
                        <p>Duração: 18h</p>
                        <p>Score: ★★★★★</p>
                        <button><a href="../courses-detail/index.html">Ver detalhes</a></button>
                    </div>
=======
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
>>>>>>> 9e0876fc1dd33cbce34c98aa1216b0e725611145
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
