@extends('layouts/navigation')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div style="margin-top:10rem;">
        <form class="search-forms">
            <input type="search" value="" placeholder="Search" id="search_title" class="search-inputs" name="title_s">
            <button type="submit" class="search-buttons">
                <svg class="submit-buttons">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
                </svg>
            </button>
            
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <select id="category_filter" class="form-select">
                    <option value="">all categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!--schedules-sec-->
    <section class="schedule-sec w-100 float-left padding-top padding-bottom">
        <div class="container">
            <div class="schedule-inner-sec text-center">
                <div class="generic-title">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @can('Book_an_event')
                        <div class="container event-shedule ">
                            <button class="btn btn" style="background-color: #FF5722;"><a href="{{ route('myreservation') }}"
                                    class="text-light" data-target="#feedbackModal">
                                    MY RESERVATIONS
                                </a></button>
                        </div>
                    @endcan
                    <h2 class="wow bounceInUp" data-wow-duration="2s">Our Events</h2>
                    <p class="wow bounceInUp" data-wow-duration="2s">Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur <br>
                        sint occaecat cupidatat non proident.</p>
                </div>
                <div class="container ">
                    <div class="tab-content">
                        <div class="row">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="searchResults">
                                @foreach ($events as $event)
                                    <div class="card">
                                        <div>
                                            <img src='https://qtxasset.com/cdn-cgi/image/w=850,h=478,f=auto,fit=crop,g=0.5x0.5/https://qtxasset.com/quartz/qcloud4/media/image/livedesignonline/files/sm_ChristFellowship_1.jpg?VersionId=oQWcgrSPyQT0EOCFmZpSHHNK1ShpVZXm'
                                                class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                            <p class="card-text">{{ $event->description }}</p>
                                            <p class="card-text">Location: {{ $event->location }}</p>
                                            <p class="card-text">category: {{ $event->categorie->name }}</p>
                                            <span class="text-danger">{{ $event->price }}DH</span>
                                            <p class="card-text"><small class="text-muted">{{ $event->date }}</small></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#search_title").keyup(function() {
                        var input = $(this).val();
                        if (input == "") input = 'all';
                        $.ajax({
                            url: "/search",
                            method: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                input: input
                            },
                            success: function(data) {
                                $("#searchResults").html(data);
                            }
                        });
                    });
                })
            </script>


            <script>
                $(document).ready(function() {
                    $("#category_filter").change(function() {
                        var category_id = $(this).val();
                        if (category_id == "") category_id = 'all';
                        $.ajax({
                            url: "{{ route('events.filterByCategory') }}",
                            method: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                category_id: category_id
                            },
                            success: function(response) {
                                $("#searchResults").html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                });
            </script>


            <!-- jQuery and JS bundle w/ Popper.js -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
            </script>
            </body>

            </html>
        @endsection
