@php
    $options = ["active" => "Active", "inactive" => "Disable"];
@endphp
<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <x-dash.form.thumbnail value="{{$user->image_url ?? ''}}"/>
    <x-dash.form.select-status value="{{$user->status ?? ''}}" :options="$options"/>
</div>
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Basic Info</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="mb-5 fv-row">
                <x-dash.form.input label="Name" name="name" value="{{$user->name ?? ''}}" placeholder="Enter User Name" required/>
            </div>
            <div class="mb-5 fv-row">
                <x-dash.form.input label="Username" name="username" value="{{$user->username ?? ''}}" placeholder="Enter User Username" required/>
            </div>
            <div class="mb-5 fv-row">
                <x-dash.form.input label="Phone Number" name="phone_number" value="{{$user->phone_number ?? ''}}" placeholder="Enter User Phone Number" required/>
            </div>
            <div class="mb-5 fv-row">
                <x-dash.form.input label="Email" name="email" value="{{$user->email ?? ''}}" placeholder="Enter User Email" required/>
            </div>

            @if(!Route::is('*.edit'))
                <div class="mb-5 row">
                    <div class="col-6">
                        <x-dash.form.input type="password" label="Password" name="password"  placeholder="Enter User Password" required/>
                    </div>
                    <div class="col-6">
                        <x-dash.form.input type="password" label="Confirm Password" name="password_confirmation" placeholder="Enter User Password" required/>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('dashboard.users.index') }}" class="btn btn-light me-5">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>
