

<x-layout title="Usuarios">





    <a href="{{ route('usuario.create') }}" class="btn btn-dark mb-2 ">Adicionar Usuarios</a>




<ul class="list-group">
    @foreach ($usuario as $usuario)   
    
   
    <li class="list-group-item d-flex  align-items-center" >
    

    <div class="ms-2 me-auto">
    
      <div class="fw-bold"> {{$usuario->name}} </div>
      {{$usuario->email}}
    </div>
     </li> 
    @endforeach
    
    
    
</ul>


</x-layout>