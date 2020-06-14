<h1>Reporte Role</h1>

<a href="/role/create">Alta de Rol</a>

<table border="1" >

    <tr>
        <td>Nombe</td>
    </tr>

    @foreach ($data as $d)

        <tr>
            <td> {{ $d->role }} </td>
            <td> <a href="/role/{{ $d->id }}/edit">Modificar</a> </td>
            <td>
                <form action="/role/{{ $d->id }}" method="POST">
                     @method('DELETE')
                     @csrf
                    <button
                        type="submit"
                    >Eminimar</button>
                </form>
            </td>
        </tr>

    @endforeach

</table>

<hr>

<h2>Registros dados de baja</h2>
<table>
    <tr>
        <td>id</td>
        <td>role</td>
    </tr>

    @foreach ($dataDeleted as $d)
        <tr>
            <td>
                {{ $d->id }}
            </td>
            <td>
                {{ $d->role }}
            </td>
        </tr>
    @endforeach

</table>

