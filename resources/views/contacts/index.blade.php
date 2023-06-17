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

    <div class="d-flex justify-content-center mt-1">
        <div class="row">
        @foreach ($contacts as $counter => $contact)
            @if ($counter % 3 == 0)
                <div class="row">
                </div>  
            @endif
            <div class="col-md-4 mt-3 d-flex justify-content-center" >
                <div class="card text-center" style="width: 250px;">
                    <div class="card-body align-items-center">
                        <h3>{{$contact->nombre}}</h3>
                        <h5>{{$contact->numero}}</h5>
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