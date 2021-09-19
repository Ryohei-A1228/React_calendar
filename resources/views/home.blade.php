@extends('layouts.app')

<script>
  window.Laravel={};
  window.Laravel.id= {{ Auth::id() }} ; 
</script>

@section('content')
<div id="app"></div>
@csrf
{{ Auth::id() }}
@endsection
