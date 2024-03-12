 
@foreach ($events as $event)
<div class="card" >

<div>
    <img src='https://qtxasset.com/cdn-cgi/image/w=850,h=478,f=auto,fit=crop,g=0.5x0.5/https://qtxasset.com/quartz/qcloud4/media/image/livedesignonline/files/sm_ChristFellowship_1.jpg?VersionId=oQWcgrSPyQT0EOCFmZpSHHNK1ShpVZXm' class="card-img-top" alt="...">
</div>
<div class="card-body">
    <h5 class="card-title">{{$event->title}}</h5>
    <p class="card-text">{{$event->description}}</p>
    <p class="card-text">Location: {{$event->location}}</p>
    <p class="card-text">category: {{$event->categorie->name}}</p>
    <span class="text-danger">{{$event->price}}DH</span>
    <p class="card-text"><small class="text-muted">{{$event->date}}</small></p>
    <a href="{{ route('buy', [$event->id, $event->autoAccept]) }}"
        class="btn btn-primary">Buy Ticket</a>
   
</div>
</div>
@endforeach