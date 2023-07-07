@extends('layouts.app')
@section('content')
<form action="{{ route('guardarChat') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $chat?$chat->id:'' }}">
    <div class="input-group">
        <input type="text" name="nombre" class="form-control" value="{{ $chat?$chat->titulo:'' }}" placeholder="Ingrese el caso.." aria-label="Recipient's username with two button addons" autofocus>
        @if (!$chat)
            <button class="btn btn-primary" type="submit">GENERAR HISTORIA</button>
        @else
            <button class="btn btn-success" {{ $chat?'':'disabled' }} type="submit">ESTIMACIÓN</button>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">NUEVO</a>
        @endif

        
    </div>




<div class="card border border-dark my-3">
  @if ($chat)
    <p><strong>Dame las historias de usuario para un sistema de {{ $chat->titulo }}</strong></p>
    {{ $chat->detalle_historia }}
    <hr>

    <p><strong>Estimación</strong></p>
    {{ $chat->detalle_estimacion }}


  @endif
</div>

</form>


@endsection
