<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ mix('css/home-form.css') }}" rel="stylesheet"> 
</head>
<body>

@include('includes.header')
@yield('content')

<hr>

<div class="container">
    <div class="row">
        <!-- Display Flash Messages -->
        <div class="col-md-12 mb-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <!-- Form Section -->
        <div class="col-md-12 mb-4">
            <!-- Button to show the form -->
            <button id="show-form-btn" class="btn btn-primary mb-3">Add Item</button>

            <!-- Form to add item -->
            <div id="item-form">
                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Item Name</span>
                        <input type="text" name="name" class="form-control" placeholder="Enter grocery item name" aria-label="Item Name" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Item Code</span>
                        <input type="text" name="code" class="form-control" placeholder="Enter grocery item code" aria-label="Item Code" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Quantity</span>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" aria-label="Quantity" aria-describedby="basic-addon2" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Price</span>
                        <input type="number" name="price" class="form-control" placeholder="Enter price" aria-label="Price" step="0.01" required>
                        <span class="input-group-text">.00</span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" aria-label="Upload Image" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Additional Notes</span>
                        <textarea name="notes" class="form-control" placeholder="Enter any notes about the item" aria-label="Additional Notes" required></textarea>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Item List Section -->
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Item List</h4>
                <!-- Search Form -->
                <form action="{{ route('home') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search by item name" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('item.show', $item->id) }}" class="btn btn-view btn-sm">View</a>
                                <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('show-form-btn').addEventListener('click', function() {
        var form = document.getElementById('item-form');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
            this.textContent = 'Hide Form'; // Change button text when showing form
        } else {
            form.style.display = 'none';
            this.textContent = 'Add Item'; // Change button text when hiding form
        }
    });
</script>
</body>
</html>
