@extends('website.layout.master')

@section('content')
    <section class="listing py-5 mt-4">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="listing__title text-white fw-300">{{$category->name}} Movies</h1>
                </div>
            </div><!-- end of row -->

            <div class="movies row">
                @foreach($category->movies as $k => $movie)
                    <div class="movie col-3 mb-4">
                        <img src="{{$movie->image_url}}" class="img-fluid" alt="">

                        <div class="movie__details text-white">

                            <div class="d-flex justify-content-between">
                                <p class="mb-0 movie__name">{{$movie->name}}</p>
                                <p class="mb-0 movie__year align-self-center">{{$movie->year}}</p>
                            </div>

                            <div class="d-flex movie__rating">
                                <div class="mr-2">
                                    @for ($i = 0; $i < $movie->rating; $i++)
                                        <span class="fas fa-star text-primary mr-1"></span>
                                    @endfor
                                </div>
                                <span>{{$movie->rating}}</span>
                            </div>

                            <div class="movie___views">
                                <p>Views: 300</p>
                            </div>

                            <div class="d-flex movie__cta justify-content-center align-items-center">
                                <a href="{{route('movies.show',$movie->id)}}" class="btn btn-primary text-capitalize flex-fill mr-2">
                                    <i class="fas fa-play"></i>
                                    watch now
                                </a>
                                @auth('web')
                                    <livewire:website.favorite-icon :movie="$movie" wire:key="{{$k}}"/>
                                @else
                                    <a href="{{route('login')}}" class="align-self-center text-white">
                                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                                    </a>
                                @endauth
                            </div>

                        </div><!-- end of movie details -->

                    </div><!-- end of col -->
                @endforeach
            </div><!-- end of row -->
        </div><!-- end of container -->
    </section><!-- end of listing section -->
@endsection
