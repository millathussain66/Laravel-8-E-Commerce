
<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="#" id="form-search-top" name="form-search-top">
            <input type="text" name="product_cat" value="{{ $product_cat }}" placeholder="Search here...">
            <input type="text" name="product_cat_id" value="{{ $product_cat_id }}" placeholder="Search here...">

            <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="product-cate" value="0" id="product-cate"> <a href="#" class="link-control">All Category</a>
                <ul class="list-cate">

                    <li class="level-0">{{ str_split($product_cat,12)[0] }}</li>

                    @foreach ($catagory as $catagorys)

                      <li class="level-1" data-id="{{ $catagorys->id }}">{{ $catagorys->name }}</li>

                    @endforeach





                </ul>
            </div>
        </form>
    </div>
</div>
