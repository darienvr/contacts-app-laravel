@extends('app')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 350px;">
            <div class="card-body">
                <h4 class="card-title text-center fw-bold py-2">NEW CONTACT</h4>
                <form action="{{ route('contacts')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" name="nombre" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Numero</label>
                        <input type="text" name="numero" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Ej. 987654321 (9 digits)</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('contacts')}}" class="btn btn-secondary">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
@endsection