<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css"> 
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .time{
            font-size:10px;
            margin:0 8px;
        }
        .name{
            display:inline-block;
            font-weight:bold;
        }
        .comment-container{
            background-color:#ddd;
            padding:15px;
        }
        .body{
            margin:0 35px;
            
            display:block;
        }
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
        .replies{
            padding:0px 45px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-code"></i>
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="height:30px;width:32px;border-radius:100%;position:absolute;top:10px;left:-33px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">  
                                <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
                                 <li><a href="{{ url('/prof') }}"><i class="fa fa fa-user-circle"></i> My Profile</a>
                                 </li>
                                 <li><a href="{{ url('/myArticles') }}"><i class="fa fa fa-book"></i> My Articles</a>
                                 </li>
                                 <li>
                                     <a href="/settings/{{ Auth::user()->id }}/edit"><i class="fa fa-cog"></i> Settings</a>
                                 </li>                                 
                                <hr>
                                <li><a href="/articles/create"><i class="fa fa-plus-circle"></i> Create New Article</a></li>
                                <li><a href="/articles"><i class="fa fa-feed"></i> Feed</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off"></i> 
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
    <!-- Scripts -->    
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                 });
            function readURL(input){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#inputImage').change(function(){
                readURL(this);
            });
            $('.delete-forms').each(function(index,delete_form){

                $(delete_form).on('submit',function(event){
                    event.preventDefault();
                    var form_fields = $(delete_form).children();
                    var id = form_fields[3].value;
                    $.post('delete',{'id':id,'_token':$('input[name=_token]').val() },function(data){
                        location.reload();
                        // console.log($($($(delete_form).parent()[0]).children()[2]));
                        });
                });
            });
            $('.comment-forms').each(function(index, comment_form) {
                // header for csrf token

                // when this form is submitted
                $(comment_form).on('submit', function(submitEvent) {
                    // don't load the page
                    submitEvent.preventDefault();
                    // the form fields
                    var form_fields = $($(comment_form).children()[1]).children();//input[0], form-group[1]
                    // the comment container of this form
                    var comment_container = $($($(comment_form).parent()[0]).children()[2]); //parent[0] = div.comment-container
                    // article id where the comment would be inserted
                    var commentable_id = form_fields[0].value;
                    // the user id of commenter
                    var user_id = form_fields[1].value;
                    // comment body
                    var body = form_fields[2].value;

                    $.post('comments', {
                        'commentable_id': commentable_id,
                        'user_id': user_id,
                        'body': body
                    }).then(function(data) {
                            $('input[type="text"],textarea').val('');
                            location.reload();
                            // console.log($($($(comment_form).parent()[0]).children()[2]));

                    });
                });
            });
        });  
    </script>
x

</html>