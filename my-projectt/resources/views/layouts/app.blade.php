<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Пасьянс')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #2e7d32; 
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 36px;
        }
        #game-area {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-area {
            width: 150px;
            height: 250px;
            border: 2px dashed #fff;
            margin: 10px;
            border-radius: 8px;
            background-color: rgba(255,255,255,0.1);
            position: relative;
        }

    </style>
</head>
<body>
    <header>
        <h1>Пасьянс</h1>
        <p>Добро пожаловать! Игра находится в разработке.</p>
    </header>


    <div id="game-area">

        <div class="card-area" id="stock">Колода</div>
        <div class="card-area" id="waste">Мусор</div>


        @for ($i = 1; $i <= 4; $i++)
            <div class="card-area" id="foundation{{ $i }}">Фундамент {{ $i }}</div>
        @endfor


        @for ($i = 1; $i <=7; $i++)
            <div class="card-area" id="tableau{{ $i }}">Столбец {{ $i }}</div>
        @endfor
    </div>

    <script src="{{ asset('js/app.js') }}"></script>


    @stack('scripts')
</body>
</html>