@extends('layout')

@section('title', 'JSON / XML Earthquakes')

@section('navbar')
  <form class="d-flex" action="">
    <input class="form-control me-2" type="search" placeholder="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
@endsection

@section('content')
  <div class="btn-group mt-2 mb-2" role="group" aria-label="Basic example">
    <a href="?sort" class="btn btn-primary"><i class="bi bi-sort-down"></i> Sort by magnitude</a>
  </div>
  <div class="row">
    @foreach ($earthquakes as $earthquake)
      <div class="col-3">
        <div class="card m-auto" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Magnitude: {{ $earthquake['magnitude'] }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Datetime: {{ $earthquake['datetime'] }}</h6>
            <p class="card-text">Place: {{ $earthquake['place'] }}</p>
            <a target="_blank" href="https://www.google.com/maps/?q={{ $earthquake['coordinates'][1] }},{{ $earthquake['coordinates'][0] }}" class="btn btn-primary"><i class="bi bi-geo-alt-fill"></i> View location</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
