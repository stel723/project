<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button>Загрузить</button>
</form>

@isset($url)
    <img src="{{ $url }}" width="200">
@endisset