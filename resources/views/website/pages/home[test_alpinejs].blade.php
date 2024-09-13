@extends('website.layout.master')

@section('banner')
{{--    <nav>--}}
{{--        <a href="#">Liked Movies (<span x-text="likedMoviesCount"></span>)</a>--}}
{{--    </nav>--}}

{{--    <div x-data="{ likedMovies: @json($likedMovies) }">--}}
{{--        @foreach ($movies as $movie)--}}
{{--            <div x-data="{ isLiked: @json(in_array($movie->id, $likedMovies)) }">--}}
{{--                <img src="{{ $movie->poster }}" alt="{{ $movie->title }}">--}}
{{--                <button x-on:click="toggleLike({{ $movie->id }})" :class="{ 'text-red-500': isLiked }">--}}
{{--                    <i class="fa fa-heart"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
    <div class="movies owl-carousel owl-theme" x-data="movies()">

    @foreach($latest_movies as $movie)

            <div class="movie text-white d-flex justify-content-center align-items-center"
            >

                <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url('{{asset('storage/media/'.$movie->poster_path)}}') center/cover no-repeat;"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <h1 class="movie__name fw-300">{{$movie->name}}</h1>
                                <span class="movie__year align-self-center">{{$movie->year}}</span>
                            </div>
                            <div class="d-flex movie__rating my-1">
                                <div class="d-flex">
                                    @for ($i = 0; $i < $movie->rating; $i++)
                                        <span class="fas fa-star text-primary mr-1"></span>
                                    @endfor
                                </div>
                                <span class="align-self-center">{{$movie->rating}}</span>
                            </div>
                            <p class="movie__description my-2">
                                {{$movie->description}}
                            </p>
                            <div class="movie__cta my-4 d-flex  align-items-center">
                                <a href="{{route('movies.show',$movie->id)}}" class="btn btn-primary text-capitalize mr-1 mr-md-3"><span class="fas fa-play"></span> watch now</a>
                                @auth('web')
                                    <i class="far fa-heart fa-2x align-self-center movie__fav-button"
                                       style="cursor: pointer"
                                       x-on:click="toggleFav({{$movie->id}})" :class="{ 'text-danger fw-700': isFav }"
                                    >
                                    </i>
                                    <a href="#">Liked Movies (<span x-text="likedMoviesCount"></span>)</a>

                                @else
                                    <a href="{{route('login')}}" class="btn btn-outline-light text-capitalize">
                                        <span class="fas fa-heart"></span>
                                        add to favorite
                                    </a>
{{--                                    <a href="{{route('login')}}" class="align-self-center text-white">--}}
{{--                                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>--}}
{{--                                    </a>--}}
                                @endauth

                            </div>
                        </div><!-- end of col -->

                        <div class="col-6 mt-2 mx-auto col-md-4 col-lg-3  ml-md-auto mr-md-0">
                            <img src="{{$movie->image_url}}" class="img-fluid" alt="">
                        </div>
                    </div><!-- end of row -->

                </div><!-- end of container -->

            </div><!-- end of movie -->

        @endforeach

    </div><!-- end of movies -->
@endsection

@section('content')
    @foreach($categories as $category)
        <section class="listing py-2">

            <div class="container">

                <div class="row my-4">
                    <div class="col-12 d-flex justify-content-between">
                        <h3 class="listing__title text-white fw-300">{{$category->name}}</h3>
                        <a href="" class="align-self-center text-capitalize text-primary">see all</a>
                    </div>
                </div><!-- end of row -->

                <div class="movies owl-carousel owl-theme">
                    @foreach($category->movies as $k => $movie)
                        <div class="movie p-0">
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
    @endforeach
@endsection

@push('scripts')
    <script>
        function movies(){
            return {
                likedMoviesCount: {{Auth::user()?->fav_movies_count}},
                isFav: {{$movie->isFav}},

                toggleFav(movieId) {
                    console.log(movieId, this.isFav)
                    this.isFav = !this.isFav;
                    console.log(movieId, this.isFav)

                    if (this.isFav) {
                        // this.likedMovies.push(movieId);
                        this.likedMoviesCount++;
                    } else {
                        // this.likedMovies = this.likedMovies.filter(id => id !== movieId);
                        this.likedMoviesCount--;
                    }
                    // Send event to Livewire component
                    // Send event to Livewire component to toggle favorite status in the backend
                    $wire.find('my-component').wire.call('favMovie')
                        .then(result => {
                            console.log('Result:', result);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });

                    // this.$wire.call('favMovie', movieId)
                    //     .then(() => {
                    //         // Optionally handle success
                    //         console.log('success')
                    //     })
                    //     .catch(error => {
                    //         // Handle error (e.g., roll back the state if the request fails)
                    //         console.error('Error toggling favorite:', error);
                    //         this.isFav = !this.isFav; // Revert the change on failure
                    //         this.isFav ? this.likedMoviesCount-- : this.likedMoviesCount++;
                    //     });
                }
            }
        }
        {{--Alpine.data('likeMovie', () => ({--}}
        {{--    // likedMovies: [],--}}
        {{--    likedMoviesCount: {{Auth::user()?->fav_movies_count}},--}}

        {{--    toggleLike(movieId) {--}}
        {{--        console.log(movieId, this)--}}
        {{--        this.isLiked = !this.isLiked;--}}

        {{--        if (this.isLiked) {--}}
        {{--            // this.likedMovies.push(movieId);--}}
        {{--            this.likedMoviesCount++;--}}
        {{--        } else {--}}
        {{--            // this.likedMovies = this.likedMovies.filter(id => id !== movieId);--}}
        {{--            this.likedMoviesCount--;--}}
        {{--        }--}}

        {{--        // Send event to Livewire component--}}
        {{--        // window.livewire.emit('movieLiked', movieId);--}}
        {{--    }--}}
        {{--}));--}}
    </script>
    <script>
        $(document).ready(function () {

          $("#banner .movies").owlCarousel({
            loop: false,
            nav: false,
            items: 1,
            dots: false,
          });

          $(".listing .movies").owlCarousel({
            loop: false,
            nav: false,
            stagePadding: 50,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 3
              },
              900: {
                items: 3
              },
              1000: {
                items: 4
              }
            },
            dots: false,
            margin: 15,
          });

        });


    </script>
@endpush
