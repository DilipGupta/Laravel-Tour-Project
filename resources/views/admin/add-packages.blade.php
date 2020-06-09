@extends('admin/layout')

@section('title', ' | Add Package')

@section('content')

<div class="card-body">
   

        <h4 class="mt-0 header-title"> Add Package</h4>
        <p class="text-muted m-b-30 font-14"> Fill all information below </p>
       
        <form class="sh-grid m-b-30" method="POST" action="{{ route('package.store') }}"  enctype="multipart/form-data">
           @csrf
        <div class="row">
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Select Category</label>
                        <select class="form-control m-b" name="category" required>
                            <option value="">Select Packages Category</option>
                            @foreach ($package_category as $packageCategory)
                            <option value="{{ $packageCategory->id }}">{{ $packageCategory->title }}</option>
                            @endforeach
                        </select>
            </div>
            </div>
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Packages Name</label>
                    <input name="package_name" class="form-control" type="text" required>
            </div>
            </div>
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Location</label>
                    <input name="location" class="form-control" type="text" required>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Duration</label>
                    <input name="duration" class="form-control" type="text" required>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Price</label>
                    <input name="price" class="form-control" type="text" required>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Offer</label>
                    <input name="offer" class="form-control" type="text" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="1" required>{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Inclusion</label>
                    <textarea class="form-control" name="inclusion" id="inclusion" rows="1" required>{{ old('inclusion') }}</textarea>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Exclusion</label>
                    <textarea class="form-control" name="exclusion" id="exclusion" rows="1" required>{{ old('exclusion') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label class="control-label">Others</label>
                    <textarea class="form-control" name="others" id="others" rows="1" required>{{ old('others') }}</textarea>
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label>Image</label> <br>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="packageImage" required>
                    <label class="custom-file-label btn-purple" for="customFile">Choose file</label>
                    </div>
                    <img src="/assets/images/products-list.jpg"  name="image" alt="product img"  class="img-fluid" style="width: 80px; height: 70px;">
                    <br> 
                </div>
            </div>

            <div class="col-sm-4 bord-grid">
                <div class="form-group">
                    <label for="price">Status</label>
                    <select class="form-control" name="status" required>
                        <option>Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div> 
            </div>
        </div>
                                          
        <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
        
        @if($errors->any())
        <div class="notificaiton is-danger">
           <ul>
           
           @foreach($errors->all() as $error)
           
           <li>{{ $error }}</li>
           
           
           @endforeach
           
           </ul>
       </div>
       
       @endif
       
        </form>
       
       
       
        </div>

@endsection('content')