@extends('admin.layout')

@section('title', $secondaryNav)

@section('head-assets')
<script type="text/javascript">
var dataTableFields = {!! json_encode($fields) !!};
</script>
@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', $secondaryNav)

@section('content')
    @include('admin.search-box')
    @include('admin.data-table')
@stop

@section('foot-assets')

@stop