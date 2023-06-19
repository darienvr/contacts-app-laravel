@extends('app')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card border-dark" style="min-width: 400px;">
            <div class="card-body text-center">
                <h1>¡ Bienvenido {{ $user->name }} !</h1>
                <a href="{{route('contacts-create')}}">
                    <button class="btn btn-primary">Agregar Contacto</button>
                </a>
            </div>
        </div>
    </div>

    <h3 class="text-center text-light mt-3">{{ count($contacts)}} contactos agregados</h3>
    <div class="d-flex justify-content-center mt-1">
        <div class="row d-flex justify-content-center">
        @foreach ($contacts as $counter => $contact)
            @if ($counter % 3 == 0)
                <div class="row">
                </div>  
            @endif
            <div class="col mt-3 d-flex justify-content-center">
                <div class="card bg-dark text-light text-center border-light" style="width: 300px;">
                    <div class="card-body align-items-center">
                        <h3 class="card-title">{{$contact->nombre}}</h3>
                        <h5 class="card-text">{{$contact->numero}}</h5>
                        <a href="{{route('contacts-edit', ['id'=>$contact->id])}}">
                            <button class="btn btn-warning mb-2" style="width: 80px;">Edit</button>
                        </a>
                        <form action="{{ route('contacts-destroy', ['id'=>$contact->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="width: 80px;">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection