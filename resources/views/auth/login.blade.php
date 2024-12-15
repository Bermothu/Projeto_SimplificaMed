@extends('layout.main')

@section('title', 'Acesso - SimplificaMed')

@section('content')
<!-- <div class="container mt-5 col-md-6 offset-md-3 pb-5" style="max-width: 600px;"> -->
<div class="main-container container col-md-6 offset-md-3 pb-5" style="max-width: 600px;">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  <main class="card p-4 shadow-sm">
    <form action="{{ route('perfil_login') }}" method="POST">
      @csrf
      <h2 class="mb-4">Entrar</h2>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Insira o e-mail" value="{{ old('email') }}">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Insira a senha">
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-3">Entrar</button>
      <div class="text-center mt-3">
        <a href="#" class="link-primary">Esqueceu a senha?</a>
      </div>
    </form>
  </main>
</div>

@endsection