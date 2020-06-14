<h1>Crea un role</h1>

<form action="/role" method="POST">

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
            value=" {{ old('role') }} "
    >

    <button
        type="submit"
    >Save</button>

</form>
