@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-plus me-2"></i>
                            Edit Permission
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('permissions.update', $permissionId->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label>GroupBy</label>
                                <select class="form-control" name="name">
                                    @foreach ($permissions as $permission)
                                        <option {{ $permissionId->name == $permission ? 'selected' : '' }}
                                            value="{{ $permission }}">{{ $permission }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group  mb-3">
                                <label>GroupBy</label>
                                <select class="form-control" name="groupby">
                                    @foreach ($groupby as $item)
                                        <option {{ $permissionId->groupby == $item ? 'selected' : '' }}
                                            value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-info">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
