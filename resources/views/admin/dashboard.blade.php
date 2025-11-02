@extends('admin.layouts')

@section('content')

            <!-- Content Area -->
            <div class="content-area">
                <!-- Overview Tab -->
                @include('admin.overview')

                <!-- Bookings Tab -->
                @include('admin.booking')

                <!-- Plots Tab -->
                 @include('admin.plot')

                <!-- customer Tab -->
                  @include('admin.customer')

                <!-- reports Tab -->
                 @include('admin.reports')

               <!-- setting Tab -->
                @include('admin.setting')

            </div>


@endsection