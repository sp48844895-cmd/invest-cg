@extends('layouts.app')

@section('content')
<script>
    window.location.href = "{{ route('startup.show', 'ecosystem') }}?subTab=cg-startup-cell";
</script>
@endsection
