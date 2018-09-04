@extends('layouts.blog-post')

@section('content')

@if ($post)


                  <h2>
                      <a href="#">{{$post->title}}</a>
                  </h2>
                  <p class="lead">
                      by <a href="#">{{$post->user->name}}</a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                  <hr>
        <img class="img-responsive" src="{{$post->photo?$post->photo->file:'http://placehold.it/500x500'}}" alt="">
                  <hr>
                  <p>{!! $post->body !!}</p>


                  <hr>

                <h4 class="lead">(To leave a comment plz first login with google,facebook or any provided below)</h4>

   {{-- Discus Commenting System --}}
      <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://codehacking-96psduk1pl.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//codehacking-96psduk1pl.disqus.com/count.js" async></script>


@endif

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $(".reply-container #rb").click(function(){
        $(this).next().toggle();
    });
    $(".no-reply-container #rb").click(function(){
        $(this).next().toggle();
    });

});
</script>
@endsection
