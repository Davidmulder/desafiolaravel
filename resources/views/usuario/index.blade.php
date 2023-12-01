

<x-layout title="Usuarios">





    <a href="{{ route('usuario.create') }}" class="btn btn-dark mb-2 ">Adicionar Usuarios</a>




<ul class="list-group">
    @foreach ($usuario as $usuario)   
    
   
    <li class="list-group-item d-flex justify-content-between align-items-center" >
    {{$usuario->name}}  --  {{$usuario->email}}
     </li> 
    @endforeach
    
    
    
</ul>


</x-layout>