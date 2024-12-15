@extends('layout.main')

@section('title', 'Cadastro - SimplificaMed')

@section('content')

<div class="container mt-5 col-md-6 offset-md-3 pb-5" style="max-width: 600px;">
    <form action="{{ route('perfil_register') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        <h2 class="mb-4">Página de Cadastro</h2>
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Senha">
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a Senha">
        </div>
        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        <a href="{{ route('login') }}" class="d-block mt-3 text-center">Já tem uma conta? Faça login!</a>
    </form>

    @if ($errors->has('password'))
        <div class="alert alert-danger mt-3">{{ $errors->first('password') }}</div>
    @endif
</div>

@endsection
