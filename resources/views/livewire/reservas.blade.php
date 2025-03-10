<div>
    <select name="pista_id" wire:model.live="pista_id">
        <option value="">Seleccione la pista...</option>
        @foreach ($pistas as $pista)
            <option value="{{ $pista->id }}">
                {{ $pista->nombre }}
            </option>
        @endforeach
    </select>

    @if (!empty($tabla))

    <table border="1">
        <thead>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </thead>
        <tbody>
            @foreach ($tabla as $hora => $fila)
            <tr>
                <td>{{ $hora }}:00 </td>
                @foreach ($fila as $celda)
                <td>
                    @if ($celda::class == "App\Models\Reserva")
                    @if ($celda->user == \Illuminate\Support\Facades\Auth::user())
                    <button wire:click="cancelar({{ $celda->id }})">
                        Cancelar
                    </button>
                    @else
                    Reservada
                    @endif
                        @else
                        <button wire:click="reservar('{{ $celda }}')">
                            Reservar
                        </button>
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
