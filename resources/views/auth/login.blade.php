@extends('app')

@section('content')

    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 350px;">
            <div class="card-body">
                <h4 class="card-title text-center fw-bold py-2">Bienvenido</h4>
                <form action="{{ route('login-post')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Iniciar Sesion</button>
                    <a href="{{route('register')}}" class="btn btn-secondary">Registrarse</a>
                </form>
            </div>
        </div>
    </div>

@endsection