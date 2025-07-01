<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Пасьянс')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>Пасьянс</h1>
        <p>Добро пожаловать! Игра находится в разработке.</p>
    </header>
<script>
    const gameData = @json($cards);
</script>

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