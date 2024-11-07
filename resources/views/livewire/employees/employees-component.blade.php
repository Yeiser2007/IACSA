<div>

    <div class="card-header bg-white d-flex items-center">
        <div class="input-group">
            <input type="text" id="search" wire:model.live="search" class="form-control"
                placeholder="Ingresa el valor a buscar">
            @can('users.create')
                @livewire('employees.create-employee')
            @endcan
        </div>

    </div>
    @if ($employees->count() > 0)
        <div class="card-body bg-white">
            <table class="table table-striped table-responsive">
                <thead>
                    <th>Id</th>
                    <th>NOI</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Category</th>
                    <th>Daily Wage</th>
                    <th>Status</th>
                    <th>Hire Date</th>
                    <th>Termination Date</th>
                    <th>Gender</th>
                    <th>Payroll Type</th>
                    <th>RFC</th>
                    <th>Curp</th>
                    <th>Imms Number</th>
                    <th>Seniority Days</th>
                    <th>Employee Type</th>
                    <th>Acciones</th>
                </thead>
                <tbody>

                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->noi}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->category}}</td>
                            <td>{{$employee->daily_salary}}</td>
                            <td>{{$employee->status}}</td>
                            <td>{{$employee->hire_date}}</td>
                            <td>{{$employee->termination_date}}</td>
                            <td>{{$employee->gender}}</td>
                            <td>{{$employee->payroll_type}}</td>
                            <td>{{$employee->rfc}}</td>
                            <td>{{$employee->curp}}</td>
                            <td>{{$employee->imms_number}}</td>
                            <td>{{$employee->seniority_days}}</td>
                            <td>{{$employee->employee_type}}</td>

                            <td class="d-flex gap-2" >
                            <a href="{{route('empleados.edit', $employee)}}" class="btn btn-primary">Editar</a>
                                @can('users.destroy')
                                    <button type="button" wire:click="assignName({{ $employee->id }}, '{{ $employee->name }}')"
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
            <span> No existen registros</span>
        </div>

    @endif
    <div class="card-footer">
        {{ $employees->links() }}
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
                    <span>¿Estas seguro de eliminar el empleado {{ $name }} </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" wire:click="destroy({{$id}})">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>