<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>জলজোছনা - অ্যাডমিন ড্যাশবোর্ড</title>
    <!-- Chart.js Library for Data Visualization -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">


</head>

<body>
    <div class="dashboard">

        @include('admin.sidebar')

        <main class="main-content">

            @include('admin.header')

            <div class="content-area">

                @yield('content')

            </div>

        </main>
        <div>
            {{-- <script src="{{ asset('assets/admin/program.js') }}"></script> --}}
</body>

</html>
