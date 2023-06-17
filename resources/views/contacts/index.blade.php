@extends('app')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 400px;">
            <div class="card-body text-center">
                <h1>Bienvenido User</h1>
                <a href="{{route('contacts-create')}}">
                    <button class="btn btn-success">Agregar Contacto</button>
                </a>
            </div>
        </div>
    </div>

    <div>
        @foreach ($contacts as $contact)
            <div class="d-flex justify-content-center mt-5">
                <div class="card" style="width: 300px;">
                    <div class="card-body" style="width: 200px;">
                        <h3>{{$contact->nombre}}</h3>
                        <h5>{{$contact->numero}}</h5>
                        <a href="{{route('contacts-edit', ['id'=>$contact->id])}}">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{ route('contacts-destroy', ['id'=>$contact->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection