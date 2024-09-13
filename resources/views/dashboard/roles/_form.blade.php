<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Create New Role</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="mb-10 fv-row">
                <x-dash.form.input label="Role Name" name="name" value="{{$role->name ?? ''}}" placeholder="Enter Role Name" required/>
            </div>
            <div class="mb-10 fv-row">
                <x-dash.form.multi-select2 label="Permissions"
                                           name="permissions"
                                           :options="$permissions"
                                           :value="$role->permissions??[]"
                                           placeholder="Select Permissions For This Role"
                                           class="form-select-lg"
                                           required
                />
{{--                <label class="required form-label fs-4" for="permissions">--}}
{{--                    Permissions--}}
{{--                </label>--}}
{{--                <select class="form-select form-select-lg form-select"--}}
{{--                        id="permissions" name="permissions[]"--}}
{{--                        data-control="select2" data-placeholder="Select Permissions For This Role"--}}
{{--                        data-allow-clear="true" multiple="multiple"--}}
{{--                >--}}
{{--                    @foreach($permissions as $permission)--}}
{{--                        <option--}}
{{--                                value="{{$permission->id}}"--}}
{{--                                @selected(in_array($permission->id, $role->permissions ?? []))--}}
{{--                        >--}}
{{--                            {{__("$permission->name")}}--}}
{{--                        </option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('dashboard.roles.index') }}" class="btn btn-light me-5">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>
