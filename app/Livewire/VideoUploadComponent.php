<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class VideoUploadComponent extends Component
{
//    use WithFileUploads;
//
//    public $video;
//    public $videoPath;
//    public $uploadProgress = 0;
//
//    protected $rules = [
//        'video' => 'nullable', // Max 100MB
//    ];
//
//    public function updatedVideo()
//    {
//        $this->validate();
//    }
//
//    public function uploadVideo()
//    {
//        $this->validate();
//
//        // Store the video in the public/videos directory
//        $this->videoPath = $this->video->store('videos', 'public');
//
//        // Reset video input
//        $this->reset('video');
//
//        // Dispatch browser event to reset the progress bar
//        $this->dispatchBrowserEvent('reset-progress');
//    }
    use WithFileUploads;

    public $video,$videoPath;

    public function submit(): void
    {

//        $this->photo->storeAs('/', $name, disk: 'avatars');
        $this->videoPath = $this->video->store('videos', 'media');
        $this->reset('video');
        session()->flash('message', 'Video uploaded successfully!');

    }


    public function render()
    {
        return view('video-upload-component');
    }
}
