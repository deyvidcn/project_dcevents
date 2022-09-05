@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque por um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placerolder="Procurar um evento">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Resultados para: {{ $search }}</h2>
    @else
        <h2>Busque por um evento</h2>
    @endif
    <p>Veja os eventos dos proximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date))}}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participantes">{{ count($event->users) }} Participantes</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saiba mais</a>
            </div>
        </div>
        @endforeach 
        @if(count($events) == 0  && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="/" class="btn btn-primary">Ver todos Eventos</a> </p>
        @elseif(count($events) == 0)
            <p>Nenhum evento disponível!</p>
        @endif    
    </div>
</div>
@endsection