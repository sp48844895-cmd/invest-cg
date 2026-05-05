@extends('layouts.app')

@section('content')
<script>
    window.location.href = "{{ route('startup.show', 'ecosystem') }}?subTab=college-innovation-startup-cells";
</script>
@endsection
