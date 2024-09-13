<div class="d-flex justify-content-center align-items-center">
    @can('movie-publish')
        @if($movie->status==='unPublished'&& $movie->percent===100)
            <button class="btn btn-sm btn-primary me-3 px-1 py-1" onclick="document.getElementById('publish-form').submit()">
                Publish
            </button>
            <form action="{{route('dashboard.movie.publish', $movie->id)}}" method="post" id="publish-form">
                @csrf
                @method('PATCH')
            </form>
        @endif
    @endcan
    @can('movie-edit')
            <a class="btn btn-icon btn-active-light-primary w-15px h-15px me-4" href="{{route('dashboard.movies.edit',$movie->id)}}" >
                <i class="ki-duotone ki-message-edit fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                </i>
            </a>
    @endcan
    @can('movie-delete')
        <button class="btn btn-icon btn-active-light-primary w-15px h-15px me-2" onclick="deleteConfirm({{'del'.$movie->id}})">
            <i class="ki-duotone ki-trash-square fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>
        </button>
    @endcan
    <form action="{{ route('dashboard.movies.destroy', $movie->id) }}" method="post" id="{{'del'.$movie->id}}" hidden>
        @csrf
        @method('DELETE')
    </form>
</div>
