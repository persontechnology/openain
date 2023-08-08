@extends('layouts.app')
@section('content')
<form action="{{ route('guardarChat') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $chat?$chat->id:'' }}">
    <div class="input-group">
      
        <input type="text" name="nombre" class="form-control" value="{{ $chat?$chat->titulo:'' }}" placeholder="Enter the process..." aria-label="Recipient's username with two button addons" autofocus>
        @if (!$chat)
            <button class="btn btn-primary" type="submit">Generate history</button>
        @else
            <button class="btn btn-success" {{ $chat?'':'disabled' }} type="submit">Estimate</button>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">New</a>
        @endif

        
    </div>




<div class="card border border-dark my-3">
  @if ($chat)
    <p><strong>Give me the user stories for a system {{ $chat->titulo }}</strong></p>
    {{ $chat->detalle_historia }}
    <hr>

    @if ($chat->detalle_estimacion)
    <p><strong>Estimate</strong></p>
    {{ $chat->detalle_estimacion }}
    @endif
  @endif
</div>

</form>


@endsection
