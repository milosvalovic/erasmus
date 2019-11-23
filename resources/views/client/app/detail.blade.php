@extends('layout.client.app.master')
@section('title', $mobilityDetail[0]->university->name)
@section('article_in_row', $article_in_row)
@section('css', asset('css/client/app/detail.css'))
@section('masthead')
    @include('client.app.layout.detail.masthead', ['title'=> $mobilityDetail[0]->title, 'background'=> $mobilityDetail[0]->university->img_url])
    @include('client.app.layout.detail.subnavigation', ['title'=> $mobilityDetail[0]->university->name, 'season'=> $mobilityDetail[0]->season[0], 'mobility_id' => $mobilityDetail[0]])
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.detail.detail_sections', [
            'article_in_row' => $article_in_row,
            'mobilityDetail' => $mobilityDetail[0],
            'mobilityPrezentations' => $mobilityPrezentations[0]->presentation,
            'getMobilityImages' => $getMobilityReviews[0]->review[0]->images,
            'number_of_pictures' => $number_of_pictures,
            'getMobilityReviews' => $getMobilityReviews[0]->review,
        ])
    </div>
@endsection