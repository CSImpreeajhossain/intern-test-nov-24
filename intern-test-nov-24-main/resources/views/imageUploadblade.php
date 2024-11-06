<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
</head>
<body>
    <h1>Upload an Image</h1>
    
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('images.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload Image</button>
    </form>

    <h2>Uploaded Images</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ asset($image->filepath) }}" width="100"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
