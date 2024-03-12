@extends('layouts/navigation')

@section('content')
    <!-- ======= shedule Section ======= -->


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
                    <h2 class="wow bounceInUp" data-wow-duration="2s">USERS </h2>
                </div>

                <!-- ======= Schedule Section ======= -->
                <div class="container event-schedule">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div id="alert-2"
                                    class="alert alert-danger mt-2 lg:m-10 flex items-center p-4 mb-4 rounded-lg"
                                    role="alert">

                                    <span class="sr-only">error</span>
                                    <div class="ms-3 text-sm font-medium">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>

                                </div>
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>user</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>

                                            <td>

                                                @if ($user->hasrole ('admin'))
                                                    <p>admin</p>     
                                                @elseif ($user->hasrole ('organizer'))
                                                <form action="{{ route('start', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-primary d-block">start</button>
                                                </form>
                                                @else
                                                <form action="{{ route('stop', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-danger d-block">stop</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- ======= Contact Us Section ======= -->
    </div>
    </div>
@endsection
