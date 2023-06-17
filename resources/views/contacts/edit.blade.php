@extends('app')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 350px;">
            <div class="card-body">
                <h4 class="card-title text-center fw-bold py-2">EDIT CONTACT</h4>
                <form action="{{ route('contacts-update', ['id'=>$contact->id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" name="nombre" class="form-control" value="{{$contact->nombre}}" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Numero</label>
                        <input type="text" name="numero" class="form-control" value="{{$contact->numero}}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Ej. 987654321 (9 digits)</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('contacts')}}" class="btn btn-secondary">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
@endsection