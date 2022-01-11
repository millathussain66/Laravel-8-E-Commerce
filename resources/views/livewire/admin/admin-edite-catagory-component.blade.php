<div class="container" style="padding: 10px 0 ">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edite Catagories
                        </div>
                        <div class="">
                            <div class="col-md-6">
                                <a class="btn btn-primary pull-right" href="{{ route('admin.catagoris') }}">All Catagory </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="panel-body">

            @if (session()->has('message'))
            <div class="alert alert-success mt-5">
                {{ session('message') }}
            </div>
        @endif
            <form wire:submit.prevent="updateCatagory()">

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">  Catagory Name </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-md" name="" id="Catagory" placeholder="Catagory Name" wire:model="name" wire:keyup='genarateslug'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">  Catagory Slug </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-md" name="" id="Catagory" placeholder="Catagory Name" wire:model="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">  Catagory Name </label>
                        <div class="col-md-4">
                          <input type="submit" class="form-control input-md"  value="Update">
                        </div>
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>
