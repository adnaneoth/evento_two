@extends('layouts/navigation')

@section('content')


    <!-- ======= shedule Section ======= -->

    <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="feedback" method="post" action="{{ route('addevent') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="nb_place">Place Number:</label>
                            <input type="text" class="form-control" id="nb_place" name="nb_place">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Send">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    <!--schedules-sec-->
    <section class="schedule-sec w-100 float-left padding-top padding-bottom">
        <div class="container">
            <div class="schedule-inner-sec text-center">
                <div class="generic-title">
                    <h2 class="wow bounceInUp" data-wow-duration="2s">MY Events </h2>
                    <p class="wow bounceInUp" data-wow-duration="2s">Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur <br>
                        sint occaecat cupidatat non proident.</p>
                </div>
                @can('Book_an_event')
                    <div class="container event-shedule ">
                        <button class="btn btn" style="background-color: #FF5722;"><a type="button" class="text-light"
                                data-toggle="modal" data-target="#feedbackModal">
                                Add Event
                            </a></button>
                    </div>
                @endcan

                <!-- ======= Schedule Section ======= -->
                <div class="container event-schedule">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div id="alert-2" class="alert alert-danger mt-2 lg:m-10 flex items-center p-4 mb-4 rounded-lg"
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
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Organizer</th>
                                        <th>Category</th>
                                        <th>price</th>
                                        <th>localisation</th>
                                        <th>place nombre</th>
                                        <th>statue</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->date }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->user->name }}</td>
                                            <td>{{ $event->categorie->name }}</td>
                                            <td>{{ $event->price }}</td>
                                            <td>{{ $event->location }}</td>
                                            <td>{{ $event->nb_place }}</td>
                                            <td>{{ $event->status }}</td>

                                            <td>
                                                @can('Book_an_event')
                                                    <form action="{{ route('destroy', $event->id) }}" method="post"
                                                        style="display: inline;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editEventModal{{ $event->id }}"><i
                                                            class="bi bi-pencil"></i></button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#detailsModal{{ $event->id }}"><i
                                                            class="bi bi-info-circle"></i></button>
                                                @endcan


                                                @can('Manage_users')
                                                    <form action="{{ route('accept', $event->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-primary d-block">accept</button>
                                                    </form>

                                                    <form action="{{ route('refuse', $event->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-danger d-block">refuse</button>
                                                    </form>
                                                @endcan
                                            </td>


                                        </tr>
                                        <!-- Update Modal -->
                                        <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editEventModalLabel{{ $event->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editEventModalLabel{{ $event->id }}">Edit Event</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('editevent', $event->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="title">Title:</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title" value="{{ $event->title }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description :</label>
                                                                <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="location">Location:</label>
                                                                <input type="text" class="form-control" id="location"
                                                                    name="location" value="{{ $event->location }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="date">Date:</label>
                                                                <input type="date" class="form-control" id="date"
                                                                    name="date" value="{{ $event->date }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nb_place">Nombre des places :</label>
                                                                <input type="number" class="form-control" id="nb_place"
                                                                    name="nb_place" value="{{ $event->nb_place }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="price">Nombre des places :</label>
                                                                <input type="number" class="form-control" id="price"
                                                                    name="price" value="{{ $event->price }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category_id">Category:</label>
                                                                <select class="form-control" id="category_id"
                                                                    name="category_id">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
