@extends('layouts/navigation')

@section('content');
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Google fonts(Open sans and poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- external css -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
 <!--schedules-sec-->
 <section class="schedule-sec w-100 float-left padding-top padding-bottom">
    <div class="container">
       <div class="schedule-inner-sec text-center">
          <div class="generic-title">
             <h2 class="wow bounceInUp" data-wow-duration="2s">Our Events</h2>
             <p class="wow bounceInUp" data-wow-duration="2s">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur <br>
                sint occaecat cupidatat non proident.</p>
          </div>
    <div class="container ">
            <div class="tab-content">
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($events as $event)
                        <div class="card">
                                <img src='https://qtxasset.com/cdn-cgi/image/w=850,h=478,f=auto,fit=crop,g=0.5x0.5/https://qtxasset.com/quartz/qcloud4/media/image/livedesignonline/files/sm_ChristFellowship_1.jpg?VersionId=oQWcgrSPyQT0EOCFmZpSHHNK1ShpVZXm' class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$event->title}}</h5>
                                <p class="card-text">{{$event->description}}</p>
                                <p class="card-text">Location: {{$event->location}}</p>
                                <p class="card-text">category: {{$event->categorie->name}}</p>
                                <span class="text-danger">{{$event->price}}DH</span>
                                <p class="card-text"><small class="text-muted">{{$event->date}}</small></p>
                                @can('Book_an_event')
                                <a href="#" class="btn btn-primary">Buy Ticket</a>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        </div>
    </div>





    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
@endsection
