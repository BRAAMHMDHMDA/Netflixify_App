<div>
    @if($isFavorite)
        <i class="far fa-heart fa-2x align-self-center movie__fav-button text-danger fw-700 movie-{{$movie->id}}"
           style="cursor: pointer"
           wire:click="toggleFavorite"
        >
        </i>
    @else
        <i class="far fa-heart fa-2x align-self-center movie__fav-button movie-{{$movie->id}}"
           style="cursor: pointer"
           wire:click="toggleFavorite"
        ></i>
    @endif
</div>


