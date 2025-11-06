@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-plus me-2"></i>
                            Create Permission
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label>Permission Name</label>
                                <select class="form-control" name="name">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission }}">{{ $permission }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>GroupBy</label>
                                <select class="form-control" name="groupby">
                                    @foreach ($groupby as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-info">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
