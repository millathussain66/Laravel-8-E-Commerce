<div>
    <style>
        nav .hidden {
            display: block !important;
        }

    </style>

    <div class="container" style="padding: 10px 0 ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    {{-- Session Message --}}
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    {{-- Session Message --}}
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Product Here ;
                            </div>
                            <div class="col-md-6">
                                <a href="" class="btn btn-success pull-right"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#-- ID </th>
                                        <th scope="col"> Image  </th>
                                        <th scope="col">Name </th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Price </th>
                                        <th scope="col">Catagroy</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $products)
                                    <tr>
                                        <td>{{ $products->id}}</td>
                                        <td><img src="{{ asset('assets/images/products')}}/{{ $products->images }} " alt=""></td>
                                        <td>{{ $products->name }}</td>
                                        <td>{{ $products->stock_status }}</td>
                                        <td>{{ $products->reguler_price }}</td>
                                        <td>{{ $products->catagroy->name }}</td>
                                        <td>{{ $products->created_at }}</td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
