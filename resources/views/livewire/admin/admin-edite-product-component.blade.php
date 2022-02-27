<div class="container" style="padding: 10px 0 ">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edite Product
                        </div>
                        <div class="">
                            <div class="col-md-6">
                                <a class="btn btn-primary pull-right" href="{{ route('admin.product') }}">All Product
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="panel-body">
            {{-- Flash Message  --}}
            @if (session()->has('message'))
            <div class="alert alert-success mt-5">
                {{ session('message') }}
            </div>
             @endif
             {{-- Flash Message  --}}


            <form enctype="multipart/form-data" wire:submit='updateProduct'>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Product Name </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-md" name="" id="Product"
                                placeholder="Product Name" wire:model="name" wire:keyup='genaretSlug()'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Product Slug </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-md" name="" id="Catagory"
                                placeholder=" Product Slug" wire:model="slug">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Sort Descriptins </label>
                        <div class="col-md-4">
                            <textarea placeholder="short_description" class="form-control input-md"
                                vwire:model="short_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Descriptins </label>
                        <div class="col-md-4">
                            <textarea placeholder="Descriptins" class="form-control input-md"
                                wire:model="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Reguler Price </label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Reguler Price" class="form-control input-md"
                                wire:model="reguler_price">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Sale Price </label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Sale Price " class="form-control input-md"
                                wire:model="sele_price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> SKU </label>
                        <div class="col-md-4">
                            <input type="text" placeholder=" SKU " class="form-control input-md" wire:model="SKU">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Stock </label>
                        <div class="col-md-4">
                            <select name="" id="" class=" form-control input-md" wire:model="stock_status">
                                <option value="instock"> InStock </option>
                                <option value="outStock"> OutOfStock </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Fetuart </label>
                        <div class="col-md-4">
                            <select name="" id="" class=" form-control input-md" wire:model="featuare">
                                <option value="0"> NO </option>
                                <option value="1"> Yes </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Queantity </label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Queantity " class="form-control input-md" wire:model="queantity">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Product Image </label>
                        <div class="col-md-4">

                         <input type="file" class="form-control input-md custom-file-input" wire:model="newimage">
                            @if ($newimage)

                            <img src="{{ $newimage->temporaryUrl() }}" width="120px" alt="">

                            @else

                            <img src="{{ asset('assets/images/products')}}/{{ $image }}" alt="">

                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label"> Catagory </label>
                        <div class="col-md-4">
                            <select name="" id="" class=" form-control input-md " wire:model="catagories_id">
                                <option value="instock"> Select Catagory </option>
                                @foreach ($catagory as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> </label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-info">Update Product </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
