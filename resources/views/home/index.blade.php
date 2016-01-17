@extends('home.layout')

@section('content')
    <div class="am-center-header">
        <h3 class="am-text-primary am-text-lg">{{ $article['title'] }}</h3>
        <code>时间: {{ $article['updated_at'] }}</code>
        <hr>
    </div>
    <!--存放客户文章内容 -->
    <div class="article-content">
        {!! $article['content'] !!}
    </div>
    <!--存放客户文章内容 -->
@stop