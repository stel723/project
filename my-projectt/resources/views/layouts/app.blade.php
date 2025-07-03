<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Пасьянс')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Основные стили */
        body {
            font-family: Arial, sans-serif;
            background-color: #2a6e3f;
            color: white;
            margin: 0;
            padding: 20px;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        #game-area {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 15px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .card-area {
            height: 120px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        /* Расположение игровых зон */
        #stock {
            background-color: #1a4b8c;
            grid-column: 1;
            grid-row: 1;
        }
        
        #waste {
            grid-column: 2;
            grid-row: 1;
        }
        
        #foundation1 { grid-column: 4; grid-row: 1; }
        #foundation2 { grid-column: 5; grid-row: 1; }
        #foundation3 { grid-column: 6; grid-row: 1; }
        #foundation4 { grid-column: 7; grid-row: 1; }
        
        [id^="tableau"] {
            height: 200px;
            grid-row: 2;
        }
        
        /* Стили карт */
        .card {
            width: 80px;
            height: 120px;
            background: white;
            border-radius: 5px;
            position: absolute;
            color: black;
            padding: 8px;
            box-sizing: border-box;
        }
        
        .card.red { color: red; }
        .card.black { color: black; }
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