@extends('layouts.app')

@section('content')
  <h2>{{ $title }}</h2>
  <p>Bienvenue sur le blog !</p>
  
  <ul>
    <li><a href="{{ route('articles.index') }}">Articles</a></li>
    <li><a href="{{ route('about') }}">À Propos</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
  </ul>
@endsection