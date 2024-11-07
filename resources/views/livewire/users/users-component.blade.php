<div>
    <div class="card-header bg-white d-flex items-center">
        <div class="input-group">
            <x-input type="text" id="search" wire:model.live="search" class="form-control mx-sm-2"
                placeholder="Ingresa el valor a buscar" />
            @can('users.create')
                @livewire('users.create-user')
            @endcan
        </div>

    </div>
    @if ($users->count() > 0)
        <div class="card-body bg-white ">
            <table class="table table-striped">
                <thead>
                    <th class="text-center cursor-pointer" wire:click="order('id')">Id
                        @if ($sort == 'id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-up float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-down float-right mt-1"></i>
                            @endif
                        @else

                            <i class="fas fa-sort float-right mt-1"></i>

                        @endif
                    </th>
                    <th class="text-center cursor-pointer" wire:click="order('name')">Name
                        @if ($sort == 'name')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-up float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-down float-right mt-1"></i>
                            @endif
                        @else

                            <i class="fas fa-sort float-right mt-1"></i>

                        @endif
                    </th>
                    <th class="text-center cursor-pointer" wire:click="order('email')">Email
                        @if ($sort == 'email')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-up float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-down float-right mt-1"></i>
                            @endif
                        @else

                            <i class="fas fa-sort float-right mt-1"></i>

                        @endif
                    </th>

                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>

                                <a href="{{route('usuarios.edit', $user)}}" class="btn btn-primary">Editar</a>

                                @can('users.destroy')
                                    <button type="button" wire:click="assignName({{ $user->id }}, '{{ $user->name }}')"
                                        class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        Eliminar
                                    </button>

                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    @else
        <div class="card-body">
            <td>No existe el registro que estas buscando</td>
        </div>
    @endif
    <div class="card-footer bg-white">
        {{$users->links()}}
    </div>

    <div class="modal fade" id="deleteModal" wire:ignore.self tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>¿Estas seguro de eliminar el usuario {{ $name }} </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" wire:click="destroy({{$id}})">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
1