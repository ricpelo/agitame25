<?php

namespace App\Livewire;

use App\Models\Pista;
use App\Models\Reserva;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reservas extends Component
{
    public $pista_id = null;
    public $tabla = [];

    public function reservar($fecha_hora)
    {
        Reserva::create([
            'fecha_hora' => $fecha_hora,
            'pista_id' => $this->pista_id,
            'user_id' => Auth::id(),
        ]);

        $this->actualizaTabla();
    }

    public function cancelar(Reserva $reserva)
    {
        $reserva->delete();
        $this->actualizaTabla();
    }

    public function render()
    {
        $this->actualizaTabla();

        return view('livewire.reservas', [
            'pistas' => Pista::all(),
        ])->layout('layouts.app');
    }

    private function actualizaTabla()
    {
        if ($this->pista_id !== null) {
            $pista = Pista::find($this->pista_id);
            for ($i = 10; $i < 20; $i++) {
                $this->tabla[$i] = [];
                for ($j = 1; $j <= 5; $j++) {
                    $dow = today()->dayOfWeek($j);
                    $fecha_hora = $dow->addHours($i);
                    $reserva = $pista->reservas()->
                        where([
                            'fecha_hora' => $fecha_hora,
                        ])->first();
                    $this->tabla[$i][] = $reserva ?? $fecha_hora;
                }
            }
        }
    }
}
