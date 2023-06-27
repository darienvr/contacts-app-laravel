@extends('app')

@section('content')

    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 350px;">
            <div class="card-body">
                <h4 class="card-title text-center fw-bold py-2">Ingrese sus datos</h4>
                @if ($errors->any())
                    <div class="alert alert-danger pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register-post')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="{{route('login')}}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

@endsection