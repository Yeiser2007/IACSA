<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogoutOtherDevices extends Component
{
    public function logoutOtherDevices()
    {
        $user = Auth::user();

        // Borra todos los tokens de la base de datos, excepto el del dispositivo actual
        DB::table('personal_access_tokens')
            ->where('tokenable_id', $user->id)
            ->where('id', '!=', $user->currentAccessToken()->id)
            ->delete();

        session()->flash('message', 'Sesiones de otros dispositivos cerradas con éxito.');
    }

    public function render()
    {
        return view('close-seessions');
    }
}
