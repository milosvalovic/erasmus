@extends('layout.client.app.master')
@section('title', isset($mobilityDetail[0]->university->name)?$mobilityDetail[0]->university->name:'')
@section('article_in_row', $article_in_row)
@section('css', asset('css/client/app/detail.css'))
@section('masthead')
    @include('client.app.layout.detail.masthead', ['title'=> isset($mobilityDetail[0]->title)?$mobilityDetail[0]->title:'', 'background'=> isset($mobilityDetail[0]->university->img_url)?$mobilityDetail[0]->university->img_url:''])
    @include('client.app.layout.detail.subnavigation', ['title'=> isset($mobilityDetail[0]->university->name)?$mobilityDetail[0]->university->name:'', 'season'=> isset($mobilityDetail[0]->season[0])?$mobilityDetail[0]->season[0]:'', 'mobility_id' => isset($mobilityDetail[0])?$mobilityDetail[0]:-1])
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.detail.detail_sections', [
            'article_in_row' => $article_in_row,
            'mobilityDetail' => isset($mobilityDetail[0])?$mobilityDetail[0]:array(),
            'mobilityPrezentations' => isset($mobilityPrezentations[0])?$mobilityPrezentations[0]->presentation:array(),
            'getMobilityImages' => isset($getMobilityReviews[0]->review[0])?$getMobilityReviews[0]->review[0]->images:array(),
            'number_of_pictures' => isset($number_of_pictures)?$number_of_pictures:0,
            'getMobilityReviews' => isset($getMobilityReviews[0])?$getMobilityReviews[0]->review:array(),
        ])
    </div>
@endsection