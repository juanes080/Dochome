<section class="cajita2">

    <table>
        <thead class="redondeado1 d-flex  titulo col-12 col-sm-4 col-md-8 col-lg-12 ">
            <tr class="texto">
                <th scope="col">Descripción</th>
                <th scope="col">Especialidad</th>
                @if ($role == 'paciente')
                    <th scope="col">Médico</th>
                @elseif ($role == 'doctor')
                    <th scope="col">Paciente</th>
                @endif
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($pendingAppointments as $cita)
                <tr class="letras redondeado2 cajas col-12 col-sm-4 col-md-8 col-lg-12">
                    <td>
                        <p>{{ $cita->description }}</p>

                    </td>
                    <td>
                        <p>{{ $cita->specialty->name }}</p>
                    </td>
                    @if ($role == 'paciente')
                        <td>
                            <p>{{ $cita->doctor->nombres_y_apellidos }}</p>
                        </td>
                    @elseif($role == 'doctor')
                        <td>
                            <p>{{ $cita->patient->nombres_y_apellidos }}</p>
                        </td>
                    @endif
                    <td>
                        <p>{{ $cita->scheduled_date }}</p>
                    </td>
                    <td>
                        <p>{{ $cita->Scheduled_Time_12 }}</p>
                    </td>
                    <td>
                        <p>{{ $cita->type }}</p>
                    </td>
                    <td>
                        @if ($role == 'doctor')
                            <form action="{{ url('/miscitas/' . $cita->id . '/confirm') }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" title="Confirmar cita"><i
                                        class='bx bx-check ' style='color:#ffffff'></i></button>
                            </form>
                        @endif

                        <form action="{{ url('/miscitas/' . $cita->id . '/cancel') }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" title="Cancelar cita"><i
                                    class='bx bx-minus'></i></button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{--  <div class="pag d-flex justify-content-end">

        {{ $patients->links() }}

    </div> --}}
</section>
