<div>
    @if ($videoPath)
        <div>
            <h3>Uploaded Video:</h3>
            <video width="320" height="240" controls>
                <source src="{{ Storage::url($videoPath) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif

        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = true"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <!-- File Input -->
                <input type="file" name="video" wire:model="video" accept="video/*">

                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress">
                    </progress>
                    <span x-text="progress + '%'"></span>

                </div>
                <hr />
                @if($video)
                    <video width="320" height="240" controls>
                        <source src="{{$video?->temporaryUrl()}}" >
                    </video>
                @endif

{{--                <video src="{{$video?->temporaryUrl()}}" style="max-width: 100%;height: 200px">--}}
{{--                </video>--}}
                <button type="submit">upload</button>

            </div>

            <!-- ... -->
        </form>
{{--    <form wire:submit.prevent="uploadVideo" enctype="multipart/form-data">--}}
{{--        <div>--}}
{{--            <input type="file" wire:model="video" accept="video/*">--}}
{{--            @error('video') <span class="error">{{ $message }}</span> @enderror--}}
{{--        </div>--}}

{{--        <!-- Upload Progress Bar -->--}}
{{--        <div wire:loading wire:target="video">--}}
{{--            <progress max="100" value="0" id="progress-bar"></progress>--}}
{{--        </div>--}}

{{--        <button type="submit" wire:loading.attr="disabled">--}}
{{--            Upload Video--}}
{{--        </button>--}}
{{--    </form>--}}

{{--    <script>--}}
{{--        document.addEventListener('livewire:load', function () {--}}
{{--            Livewire.on('reset-progress', function () {--}}
{{--                document.getElementById('progress-bar').value = 0;--}}
{{--            });--}}
{{--        });--}}

{{--        Livewire.hook('element.updated', (el, component) => {--}}
{{--            if (el.hasAttribute('wire:loading')) {--}}
{{--                const progressBar = document.getElementById('progress-bar');--}}
{{--                progressBar.value = component.serverMemo.progress.uploads[0].progress;--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
</div>
