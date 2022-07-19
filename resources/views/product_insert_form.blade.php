{{--resouse/views/product_insert_form.blade.php --}}
{{--resouse/viws/dashboard.blade.php--}}
@extends('master')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Inssert Product</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Insert Product</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
      <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Insert Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/product/insert_action" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                        <label>Product Type</label>
                        <select name="product_type_id" class="form-control">
                            @foreach ($productTypes as $productType)
                                <option value="{{$productType->id}}">{{$productType->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Barcode</label>
                      <input type="text" class="form-control" name="barcode" required>
                    </div>

                    <div class="form-group">
                        <label>NameTH</label>
                        <input type="text" class="form-control" name="name_th" required>
                    </div>
                    <div class="form-group">
                        <label>NameEN</label>
                        <input type="text" class="form-control" name="name_en">
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <input type="number" class="form-control" step="any" min="0" name="cost">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" step="any" min="0" name="price">
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                      <label for="exampleInputFile">Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>-->
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

            </div>
      </div><!-- /.container-fluid -->

@endsection
