<x-layout title="Cadastro de Usuarios">
<form action="{{route('usuario.stores')}}" method="post">
@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">

<div class="col-8">
  <label for="name" class="form-label">Nome</label>
  <input type="text" class="form-control" id="name" name="name" 
   value=""  >
  </div>

  <div class="col-8">
  <label for="email" class="form-label">E-mail</label>
  <input type="text" class="form-control" id="email" name="email" 
   value=""  >
  </div>

  <div class="col-2">
  <label for="password" class="form-label">Senha</label>
  <input type="password" class="form-control" id="password" name="password" 
   value="" >
  </div>

  <div class="col-2">
  <label for="password2" class="form-label">Confirmação de Senha</label>
  <input type="password" class="form-control" id="senha2" name="senha2" 
   value="" >
  </div>
</div>
<button type="submit" class="btn btn-primary mb-3">Cadastra usuario</button>


</form>







</x-layout>