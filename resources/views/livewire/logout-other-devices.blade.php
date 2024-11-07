<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="logoutOtherDevices" class="btn btn-danger">Cerrar Sesiones en Otros Dispositivos</button>
</div>
