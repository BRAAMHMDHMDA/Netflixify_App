<div class="text-end">
    @can('user-edit')
        <a class="btn btn-icon btn-active-light-primary w-15px h-15px me-2" href="{{route('dashboard.users.edit',$user->id)}}" >
            <i class="ki-duotone ki-message-edit fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>
        </a>
    @endcan
    @can('user-delete')
        <button class="btn btn-icon btn-active-light-primary w-15px h-15px me-2" onclick="deleteConfirm({{'del'.$user->id}})">
            <i class="ki-duotone ki-trash-square fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>
        </button>
    @endcan
    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" id="{{'del'.$user->id}}" hidden>
        @csrf
        @method('DELETE')
    </form>
</div>
