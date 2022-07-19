{{--resouse/viws/dashboard.blade.php--}}
@extends('master')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">All Products</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">All Products</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="/product/insert" type="button" class="btn btn-primary">ปุ่มหนึ่งปุ่ม</a>
            </div>
            <div class="col-md-12" style="margin-top: 20px">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Photo</th>
                                <th>ProducttypeID</th>
                                <th>Name Thai</th>
                                <th>Name English</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Tool</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_data as $product)
                            <tr>
                                <td>{{ $product -> barcode}}</td>
                                <td>
                                    @if ($product -> photo != '')
                                        <img src="{{$product -> PhotoFullPath}}" style="height:50px"/>
                                    @endif
                                </td>
                                <td>{{ $product -> ProductType -> name}}</td>
                                <td>{{ $product -> name_th}}</td>
                                <td>{{ $product -> name_en}}</td>
                                <td>{{ $product -> cost}}</td>
                                <td>{{ $product -> price}}</td>
                                <td>
                                    <a href="/product/update{{$product->id}}" class="btn btn-warning">
                                       Update
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default-{{$product->id}}">
                                        Delete
                                     </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-default-{{ $product->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete Product Confirm?</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <a href="/product/delete{{$product->id}}" class="btn btn-danger btn-s">Delete</a>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Count</th>
                                <th>{{$product_data->sum('cost')}}</th>
                                <th>{{$product_data->sum('price')}}</th>
                                <th>{{$product_data->count()}} records.</th>
                            </tr>
                        </tfoot>
                      </table>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>

            <!-- /.card -->

        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->
@endsection
@section('script')
      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
@endsection
