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

                    {{-- @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif --}}

                    {{-- Session Message --}}
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Catagories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addCatagory') }}" class="btn btn-success pull-right">Add
                                    Catagory</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#-- ID </th>
                                        <th scope="col">Catagory Name </th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catagory as $item)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>
                                             <a class="btn btn-success" href="{{ route('admin.editeCatagory',['catagory_slug'=>$item->slug]) }}">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $catagory->links() }}


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
