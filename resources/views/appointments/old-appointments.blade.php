<section class="cajita2">

    <table>
        <thead class="redondeado1 d-flex  titulo col-12 col-sm-4 col-md-8 col-lg-12 ">
            <tr class="texto">

                <th scope="col">Especialidad</th>

                <th scope="col">Fecha</th>


                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($oldAppointments as $cita)
                <tr class="letras redondeado2 cajas col-12 col-sm-4 col-md-8 col-lg-12">

                    <td>
                        <p>{{ $cita->specialty->name }}</p>
                    </td>
                    <td>
                        <p>{{ $cita->scheduled_date }}</p>
                    </td>
                    <td>
                        <p>{{ $cita->status }}</p>
                    </td>
                    <td>
                        <a href="{{ url('/miscitas/' . $cita->id) }}" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{--  <div class="pag d-flex justify-content-end">

        {{ $patients->links() }}

    </div> --}}
</section>
