<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!--load all Font Awesome styles -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    @yield('css')
    
    <!-- Styles -->
    
</head>

<body style="background-image:url({{url('image/v996-009.png')}})">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="width:150px;" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('image/logo_gabung.png') }}" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-left {{ Route::currentRouteNamed('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-left {{ Request::is('/pesanan') ? 'active' : '' }}" href="">PesananKu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-left {{ Request::is('/dompet') ? 'active' : '' }}" href="">DompetKu</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('user.login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">{{ __('Masuk') }}</a>
                                </li>
                            @endif

                            @if (Route::has('user.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user"></i>Halo, {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Data Diri</a>
                                    <a class="dropdown-item" href="">Jadi pemilik mobil</a>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    
    @yield('content')    
    
    <div id="footer" class="mt-2">
        <div class="row col-12 pt-4">
            <p class="mx-auto">All Right Reserved &copy; 2021. RentalKu Team.</p>
        </div>
    </div>

    <div id="chat" class="hidden">
        <div class="chat-bar px-3 py-2">
            <p class="mb-0 mt-0">Obrolan</p>
        </div>
        <div class="chat-room px-1 py-1">
            
        </div>
    </div>
    <div class="chat-button px-3 py-2">
            <p class="text-center mb-0 mt-0"> <i class="fa-solid fa-message"></i> Mulai Obrolan <span class="notification rounded-circle px-1 hidden">0</span></p>
    </div>
    <div class="single-chat hidden">
        <div class="single-chat-bar px-3 py-2">
            <p class="mb-0 mt-0 name-chat"><i class="fa-solid fa-arrow-left color-base back-btn"></i></p>
        </div>
            <div class="single-chat-room p-1">
                
            </div>
            <div class="input-outer">
                    <div class="input-message">
                        <form id="send-message">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="chat_room_id" value="0">
                        <textarea form="send-message" id="" cols="30" rows="10" class="input-pesan d-block w-100 m-0" name="message" placeholder="Masukkan pesan"></textarea>
                        <button class="send-button"><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
            </div>
    </div>
    
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        function new_message(){
            val = parseInt($('.notification').text());
            val++;
            $('.notification').text(val);
            $('.notification').removeClass('hidden');
            if(1 == 1){ //jika room open
                $(".single-chat-room").append(
                    `<div class="message my-1 col-12 message-own">
                        new
                    </div>`
                );
                $('.single-chat-room').scrollTop(100000000);
            }
        }
        function show_room(){
            $('.notification').addClass('hidden');
            $('.notification').text(0);
            id = '{{ Auth::user()->id }}';
            link = '/api/message/room/'+id;
            link = '{{URL::to('')}}'+link;
            $.get(link,  // url
                function (data, textStatus, jqXHR) {  // success callback
                    if(data.length > 0){
                        $.each(data, function(index, element) {
                            data_user=[];
                            id = '{{ Auth::user()->id }}';
                            if(data[index]['user']['id'] == id){
                                //jika true foto dari user to id
                                data_user = data[index]['user_to'];
                            }else{
                                //jika true foto dari user
                                data_user = data[index]['user'];
                            }
                            $( ".chat-room" ).html(
                                `<div class="pesan row p-1" onclick="show_message('${data[index]['id']}','${data_user['name']}')">
                                    <div class="col-4 mx-0">
                                        <img src="{{ asset('') }}${data_user['image_link']}" alt="" srcset="" class="img-user-chat img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8 p-0">
                                        <label for="" class="small"><b>${data_user['name']}</b></label>
                                        <p class="small mb-0">${data[index]['message'][0]['message']}</p>
                                    </div>
                                </div>`
                            );
                        });
                        $('#chat').removeClass('hidden');
                        $('.chat-button').addClass('hidden');
                    }else{
                        $(".chat-room").html(
                            `<div class="image-chat-box mx-auto pt-5">
                                <img src="{{ asset('image/chat.png') }}" alt="" class="img-fluid" srcset=""> 
                            </div>
                            <h6 class="text-center"><b>Belum ada obrolan nih</b></h6>
                            <p class="small text-center">Mulai ngobrol dengan Kawan RentalKu, yuk!</p>`
                        );
                        $('#chat').removeClass('hidden');
                        $('.chat-button').addClass('hidden');

                    }
            });
        }
        function show_message(chat_room_id,name){
            link = '/api/message/room/message/'+chat_room_id;
            link = '{{URL::to('')}}'+link;
            $.get(link,  // url
                function (data, textStatus, jqXHR) {
                    $('input[name="chat_room_id"]').val(chat_room_id);
                    if(data.length > 0){
                        $.each(data, function(index, element) {
                            $(".name-chat").html(
                                `<p class="mb-0 mt-0 name-chat"><i class="fa-solid fa-arrow-left color-base back-btn"></i> ${name}</p>`
                            );
                            id = '{{ Auth::user()->id }}';
                            if(data[index]['user_id'] == id){
                                $(".single-chat-room").append(
                                    `<div class="message my-1 col-12 message-own">
                                        ${data[index]['message']}
                                    </div>`
                                );
                            }else{
                                $(".single-chat-room").append(
                                    `<div class="message my-1 col-12">
                                        ${data[index]['message']}
                                    </div>`
                                );
                            }
                            $('.single-chat-room').scrollTop(100000000);
                        });
                    }
                }
            );
            $('.single-chat').removeClass('hidden');

        }
        $(document).ready(
            function(){
                $('.chat-button').click(function(){
                    show_room();
                });
                $('.chat-bar').click(function(){
                    $('#chat').addClass('hidden');
                    $('.chat-button').removeClass('hidden');
                });
                $('.name-chat').click(function(){ //hidden message
                    show_room();
                    $('input[name="chat_room_id"]').val(0);
                    $('.single-chat').addClass('hidden');
                });
                $('.send-button').on('click',function(e){
                    e.preventDefault();
                    $("#send-message" ).submit();
                });
                $('#send-message').on('submit',function(e){
                    e.preventDefault();
                    data=$('#send-message').serializeArray();
                    $.ajax({
                        url:"{{ route('message.send') }}",
                        method:"POST", //First change type to method here
                        data:data,
                        success:function(response) {
                        },
                        error:function(){
                            console.log("error");
                        }
                    });
                });
            }
        );
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('d442ceb3f03945cb3bea', {
        cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('form-submitted', function(data) {
            val = parseInt($('.notification').text());
            val++;
            $('.notification').text(val);
            $('.notification').removeClass('hidden');
            user_id= '{{ Auth::user()->id }}';
            chat_room_id = $('input[name="chat_room_id"]').val();
            if(chat_room_id == data['chat_room_id']){ //jika room open
                if(user_id == data['user_id']){
                    $(".single-chat-room").append(
                        `<div class="message my-1 col-12 message-own">
                        ${data['message']}
                        </div>`
                    );
                    $("textarea.input-pesan").val("");
                    $('.single-chat-room').scrollTop(100000000);
                }else{
                    $(".single-chat-room").append(
                        `<div class="message my-1 col-12">
                        ${data['message']}
                        </div>`
                    );
                    $('.single-chat-room').scrollTop(100000000);
                }
                
            }
        });
    </script>
    @yield('js')  
</body>
</html>