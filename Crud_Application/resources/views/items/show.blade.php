<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Item Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/show-form.css') }}" rel="stylesheet"> <!-- Link to the new CSS file -->
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Item Details</h1>
                <div class="card">
                    @if($item->image)
                        <img src="{{ asset('storage/images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="No image available">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text"><strong>Code:</strong> {{ $item->code }}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{ $item->quantity }}</p>
                        <p class="card-text"><strong>Price:</strong> Rs {{ number_format($item->price, 2) }}</p>
                        <p class="card-text"><strong>Notes:</strong> {{ $item->notes ?: 'No notes available' }}</p>
                        <div class="text-center">
                            <a href="{{ route('home') }}" class="btn btn-back">Back to List</a>
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-update">Update Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
