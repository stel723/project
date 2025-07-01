<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/png">
    <button>Загрузить</button>
</form>
