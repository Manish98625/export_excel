<form action="{{ route('import-excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit" class="btn btn-primary">Import Excel</button>
</form>