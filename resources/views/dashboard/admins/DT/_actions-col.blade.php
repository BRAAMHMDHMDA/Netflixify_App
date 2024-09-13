<div class="text-end">
    @can('admin-edit')
        <a class="btn btn-icon btn-active-light-primary w-15px h-15px me-2" href="{{route('dashboard.admins.edit',$admin->id)}}" >
            <i class="ki-duotone ki-message-edit fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>
        </a>
    @endcan
    @can('admin-delete')
       <button class="btn btn-icon btn-active-light-primary w-15px h-15px me-2" onclick="deleteConfirm({{'del'.$admin->id}})">
           <i class="ki-duotone ki-trash-square fs-2x">
               <span class="path1"></span>
               <span class="path2"></span>
               <span class="path3"></span>
               <span class="path4"></span>
           </i>
       </button>
    @endcan
    <form action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="post" id="{{'del'.$admin->id}}" hidden>
        @csrf
        @method('DELETE')
    </form>
</div>
