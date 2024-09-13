<form id="movie_form" class="form d-flex flex-column flex-lg-row"
      wire:submit.prevent="submit"
      method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-4" >
            <div>
                <div  class="card-header">
                    <div class="card-title">
                        <h2>Basic Info</h2>
                    </div>
                </div>
                <div class="card-body pt-0 mt-10">
                    <div class="mb-10 row">
                        <div class="col">
                            <x-dash.form.input label="Name" name="name" wire:model="name"  placeholder="Enter Movie Name" required/>
                        </div>
                        <div class="col">
                            <x-dash.form.input type="number" label="Year" name="year" wire:model="year" placeholder="Enter Movie Year" required/>
                        </div>
                    </div>
                    <div class="mb-10 row">
                        <div class="col">
                            <x-dash.form.input type="number" label="Rating" name="rating" wire:model="rating" placeholder="Enter Movie Rating" min="0" max="5" required/>
                        </div>
                        <div class="col">
                            <x-dash.form.select2 label="Category" name="category_id" :options="$categories" placeholder="Enter Movie Category" required/>
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <div class="col">
                            <x-dash.form.input type="file" label="Image" wire:model="image"/>
                        </div>
                        <div class="col">
                            <x-dash.form.input type="file" label="Poster" wire:model="poster"/>
                        </div>
                    </div>
                    <div class="mb-10 row">
                        <div class="col">
                            @if (is_null($image) && !is_null($old_image))
                                <span class="fw-bold me-3">Image Preview :</span>
                                <img src="{{$old_image}}"  width="30%">
                            @else
                                <span class="fw-bold me-3">Image Preview :</span>
                                <img src="{{$image?->temporaryUrl()}}"  width="30%">
                            @endif
                        </div>
                        <div class="col">
                            @if (is_null($poster) && !is_null($old_poster))
                                <span class="fw-bold me-3">Poster Preview :</span>
                                <img src="{{$old_poster}}"  width="30%">
                            @else
                                <span class="fw-bold me-3">poster Preview :</span>
                                <img src="{{$poster?->temporaryUrl()}}"  width="30%">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="required form-label" for="description">
                                Description
                            </label>
                            <textarea class="form-control" wire:model="description" name="description"  placeholder="Enter Movie Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end me-10" >
                    <a href="{{ route('dashboard.movies.index') }}" class="btn btn-light me-5">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

