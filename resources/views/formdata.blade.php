<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Product</title>

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-responsive.css') }}">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</head>
    <body>
        <form method="POST" action="{{ route('index') }}">
            <div class="form">
                    @csrf
                    <div class="form-group">
                        <label class="form-check-label" for="product_name">Product name</label>
                        <input class="form-control input" type="text" id="product_name" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="form-check-label">Quantity</label>
                        <input class="form-control input" type="text" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-check-label">Price</label>
                        <input class="form-control input" type="text" id="price" name="price">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </div>
            </div>
        </form>
        <div class="container">
            <table class="table">
                <thead>
                    <tr class="table-header">
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity in Stock</th>
                        <th scope="col">Price per Item</th>
                        <th scope="col">Datetime Submitted</th>
                        <th scope="col">Total Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inp as $data)
                        <tr>
                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ date('l jS \of F Y h:i:s A', strtotime($data->datetime_submitted)) }}</td>
                            <td>{{ $data->total_value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
