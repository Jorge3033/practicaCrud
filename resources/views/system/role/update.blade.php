<h1>Modificar el roll  {{ $data->role  }}</h1>

<form action="/role/{{ $data->id }}" method="POST">

    @method('PUT')
    @csrf


    @if($errors->first('role'))
        <p>
            {{ $errors->first('role')}}
        </p>
    @endif

    <label
            for=""
    >Nombre del Roll</label>

    <input
            type="text"
            name="role"
            value=" {{ $data->role }} "
    >

    <button
        type="submit"
    >change</button>

</form>
