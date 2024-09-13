<form id="movie_form" enctype="multipart/form-data" wire:submit.prevent="submit">
    @csrf
    <div class="form d-flex flex-column flex-lg-row"
         x-data="{ uploadingVideo: false, videoProgress: 0, processingVideo:false }"
         x-on:livewire-upload-start="if ($event.detail.property==='video') { uploadingVideo = true; }"
         x-on:livewire-upload-finish="if ($event.detail.property==='video') { uploadingVideo = true;processingVideo=true }"
         x-on:livewire-upload-error="if ($event.detail.property==='video') { uploadingVideo = false; }"
         x-on:livewire-upload-progress="videoProgress = $event.detail.progress"
    >
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <div class="card card-flush py-4" >
                <div x-show="!uploadingVideo"
                >
                    <div class="d-flex justify-content-center align-items-center flex-column gap-2 cursor-pointer m-10"
                         style="height: 25vh;border: 3px solid #eee;border-radius: 5px"
                         onclick="document.getElementById('movie_input').click()"
                    >
                        <i class="fa fa-video-camera fs-2x"></i>
                        <p class="fw-semibold">Click to Upload</p>
                    </div>
                </div>
                <div x-show="uploadingVideo">
                    <!-- File Input -->
                    <input type="file" name="video" id="movie_input" wire:model="video" accept="video/*" required hidden>
                    <!-- Progress Bar -->
                    <div  class="row mt-10">
                        <div class="col px-12">
                            <div class="progress" style="height: 30px;" x-show="!processingVideo">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                     role="progressbar"  x-bind:aria-valuenow="videoProgress"
                                     aria-valuemin="0" aria-valuemax="100"
                                     x-bind:style="'width: ' +videoProgress+ '%'">
                                    <span class="fs-2" x-text="videoProgress + '%'"></span>
                                </div>
                            </div>
                            <div class="progress" style="height: 30px;" x-show="processingVideo">
                                <div class="progress-bar bg-success"
                                     role="progressbar"  x-bind:aria-valuenow="videoProgress"
                                     aria-valuemin="0" aria-valuemax="100"
                                     x-bind:style="'width: ' +videoProgress+ '%'">
                                    <span class="fs-2" x-text="videoProgress + '%'"></span>
                                </div>
                            </div>
                            @if($video)
                                <p class="text-success">Movie Uploaded Successfully</p>
                                <video width="50%" height="240" controls class="mt-6">
                                    <source src="{{$video?->temporaryUrl()}}" >
                                </video>
                            @endif
                        </div>
                    </div>
                    <div  class="card-header">
                        <div class="card-title">
                            <h2>Basic Info</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 mt-10">
                        <div class="mb-10 row">
                            <div class="col">
                                <x-dash.form.input label="Name" name="name" wire:model="name" value="{{$movie->name ?? ''}}" placeholder="Enter Movie Name" required/>
                            </div>
                            <div class="col">
                                <x-dash.form.input type="number" label="Year" name="year" wire:model="year" value="{{$movie->year ?? ''}}" placeholder="Enter Movie Year" required/>
                            </div>
                        </div>
                        <div class="mb-10 row">
                            <div class="col">
                                <x-dash.form.input type="number" label="Rating" name="rating" wire:model="rating" value="{{$movie->rating ?? ''}}" placeholder="Enter Movie Rating" min="0" max="5" required/>
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
                                @if($image?->temporaryUrl())
                                    <span class="fw-bold me-3">Image Preview :</span>
                                    <img src="{{$image?->temporaryUrl()}}" alt="" width="30%"/>
                                @endif
                            </div>
                            <div class="col">
                                @if($poster?->temporaryUrl())
                                    <span class="fw-bold me-3">Poster Preview :</span>
                                    <img src="{{$poster?->temporaryUrl()}}" alt="" width="30%"/>
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
    </div>
</form>
