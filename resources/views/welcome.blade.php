<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="">
        <style>
        *{
            font-family: 'Raleway';
        }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100%;
                margin: 0;
            }
            .parallax_1, .parallax_2,.parallax_3,.parallax_4,.parallax_5{
                opacity:0.65;
                position:relative;
                background-repeat:no-repeat;
                background-attachment:fixed;
                background-size:cover;
                background-position:center;
            }
            .parallax_1{
                text-align:center; 
                height:100%;
                background-color:#ddd;
            }
            .parallax_2{
                background-image:url('http://wallpapercave.com/wp/6BCUfXk.jpg');
                min-height:400px;
            }
            .parallax_3{
                background-image:url('http://presslayer.com/wp-content/uploads/2016/04/SEO-NEW-YORK-0-1.jpg');
                min-height:400px;
            }
            .parallax_4{
                background-image:url('http://www.bhmpics.com/thumbs/security_codes-t3.jpg');
                min-height:400px;
            } 
            .parallax_5{
                background-image:url('http://www.wikihow.com/images/4/49/Learn-a-Programming-Language-Step-24.jpg');
                min-height:400px;
            }                       
            .caption{
                left:0;
                top:40%;
                position:absolute;
                width:100%;
                text-align:center;
                text-transform:uppercase;
            }
            .border{
                font-size:5em;
                letter-spacing:15px;
            }
            .top-right{
                position:absolute;
                top:18px;
                right:25px;
            }
            .links a, .accounts a{
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight:600;
                letter-spacing:.1rem;
                text-decoration: none;
                text-transform: uppercase;
                cursor:pointer;
                position:relative;

            }
            .some-content{
                background-color:#2980b9;
                color:#fff;
                overflow:hidden;
            }
            .icon{
                font-size:4em;
            }
            .column{
                padding:15px;
                text-align:center;
                width:250px;
                float:left;
            }
            .clearfix{
                display:block;
                height:0;
                clear:both;
                content:'';
                visibility:hidden;
            }
            .some-caption{
                font-size:3em;
                font-weight:400;
                color:#ddd;
                display:block;
            }
            .small{
                color:#fff;
                font-weight:400;
            }
            .footer .accounts{
                text-align:center;
            }
            .accounts a{
                font-size:1em;
            }

            .boring-stuff li{
                position:relative;
                padding:8px 15px;
                list-style-type:none;
            }
            .boring-stuff{
                padding:15px 3em;
                float:left;
            }
            @media screen and (max-width:568px){
                .borting-stuff li a{
                    width:100%;
                    text-align:center;
                }
                .column{
                    width:90%;
                }
            }
        </style>
    </head>
    <body>
    <div class="parallax_1">
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
        <div class="caption">
            <span class="border">
               <i class="fa fa-code appname"></i>{{ config('app.name') }}
            </span>
        </div>
    </div>
    <div class="some-content">
        <div class="column">
            <span class="icon"><i class="fa fa-connectdevelop "></i></span>
            <p>
                Magna sit labore quis velit in aute exercitation id laborum nisi pariatur amet dolore consequat duis.
            </p>    
        </div>
        <div class="column">
            <span class="icon"><i class="fa fa-comments-o"></i></span>
            <p>
                Consectetur tempor ex dolor aliquip duis culpa eiusmod consequat sit eiusmod eiusmod pariatur occaecat.
            </p>
        </div>
        <div class="column">
            <span class="icon"><i class="fa fa-code"></i></span>
            <p>
                Excepteur ex culpa nostrud in consequat sunt aliquip magna.
            </p>
        </div>
        <div class="column">
            <span class="icon"><i class="fa fa-shield"></i></span>
            <p>
                Excepteur ex culpa nostrud in consequat sunt aliquip magna.
            </p>
        </div>        
    </div>
    <div class="parallax_2">
        <div class="caption">
            <span class="some-caption"><i class="fa fa-connectdevelop"></i> Connect</span>
            <span class="small">Don't mind the background</span>
        </div>
    </div>
    <div class="parallax_3">
        <div class="caption">
            <span class="some-caption"><i class="fa fa-comments-o"></i> Chat</span>
            <span class="small">Don't mind the background</span>
        </div>
    </div>
    <div class="parallax_4">
        <div class="caption">
            <span class="some-caption"><i class="fa fa-shield"></i> Secured</span>
            <span class="small">Don't mind the background</span>
        </div>
    </div>
        <div class="parallax_5">
        <div class="caption">
            <span class="some-caption"><i class="fa fa-code"></i> Develop</span>
            <span class="small">Don't mind the background</span>
        </div>
    </div>
    <div class="footer">
        <div class="accounts">
            <h3>Connect with us</h3>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
        </div>
        <div class="boring-stuff links">
            <li><a href="#">Boring</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Developers</a></li>
            <li><a href="#">About us</a></li>
        </div>
        <div class="boring-stuff links">
            <li><a href="#">Boring</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Developers</a></li>
            <li><a href="#">About us</a></li>
        </div>
        <div class="boring-stuff links">
            <li><a href="#">Boring</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Developers</a></li>
            <li><a href="#">About us</a></li>
        </div>
        <div class="boring-stuff links">
            <li><a href="#">Boring</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Developers</a></li>
            <li><a href="#">About us</a></li>
        </div>
    </div>    
    </body>
</html>
