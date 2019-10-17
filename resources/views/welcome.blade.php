<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style type="text/css">
        body{
            margin: 0;
        }
        .container{
            padding: 30px 10%;
            text-align: center;
        }
        input{
            padding: 10px;
            width: 250px;
            border-radius: 5px;
            border: 2px solid #eee;
            margin-bottom: 10px;
        }
        button{
            padding: 10px 20px;
            background: #eee;
            color: #333;
            border: none;
            border-radius: 5px;
        }
        button:hover, button:focus{
            background: #c27b25;
            color: #fff;
            cursor: pointer;
        }
        #notice{
            margin-top: 30px;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Type word(s) below to begin search</h3>
        <form method="post" accept="{{ route('search.word') }}" id="form">
            <input type="text" name="search" id="search" autocomplete="off"><br>
            <button type="submit">Search</button>
        </form>
        <div id="notice"></div>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript">
        $("#notice").hide();
        $(document).ready(function(){
            $("#form").submit(function(){
                $("#notice").html("Processing...");
                $("#notice").show(300);
                $.ajax({
                    url : '{{ route("search.word") }}',
                    data : {
                        word : $("#search").val(),
                        _token : '{{ csrf_token() }}'
                    },
                    method : 'POST',
                    success : function(data){
                        $("#notice").html(data);
                    }
                })
                return false;
            })
        });
    </script>
</body>
</html>
