@foreach($roles as $role)
    <div class="badge badge-light-dark fw-bold">{{ucwords($role->name)}}</div>
@endforeach
