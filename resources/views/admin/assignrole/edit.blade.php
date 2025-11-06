@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-plus me-2"></i>
                            Assign User Role
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div>
                                <label for="roles" class="form-label mt-3">Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}
                                            value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#roles').select2({
                placeholder: "Select roles",
                allowClear: true
            });
        });
    </script>
@endsection
