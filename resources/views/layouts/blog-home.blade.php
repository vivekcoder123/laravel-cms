<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style media="screen">
      .img-responsive {
        margin: 0 auto;
      }
    </style>

</head>

<body>

<!-- Navigation -->
@yield('home-post-navigation')

<!-- Page Content -->
<div class="container" style="margin-top:40px;">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <h2 class="page-header">
                CodeHacking
                <small>Learn Awesome Things ..</small>
            </h2>

          @foreach ($posts as $post)

            <h2>
                <a href="{{route('home.post',$post->slug)}}">{{ucwords($post->title)}}</a>
            </h2>
            <p class="lead">
                by <a href="#">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

            <a href="{{route('home.post',$post->slug)}}"><img class="img-responsive" style="height:400px;width:800px;" src="{{$post->photo?$post->photo->file:"http://placehold.it/500x500"}}" alt=""></a>

            <p style="padding-top:2%;">{!! str_limit($post->body,200) !!}</p>
            <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
             <div style="padding:2%;"></div>
          @endforeach

            <!-- Pager -->
          <div class="text-center">
            {{$posts->render()}}
          </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        {{-- <div class="col-md-4">



            <!-- Blog Categories Well -->
            <div class="well">
              <h4 class="text-center">Blog Categories</h4>
              <div class="row">
                  <div class="col-sm-12">
                      <ul class="list-unstyled text-center">
                          @foreach ($categories as $category)
                          <li class="col-sm-6">
                            <a href="#">{{$category->name}}</a>
                          </li>
                          @endforeach
                      </ul>
                  </div>
              </div>

                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div> --}}

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
