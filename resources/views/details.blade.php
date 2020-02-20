@extends('layouts.app')

@section('content')
<details-component :movie='{{json_encode($movie)}}'></details-component>
@endsection
