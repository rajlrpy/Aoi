@extends('frontend.layout.main')

@section('assets')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> 
@endsection


@section('main-container')
            <div class="container">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow-lg mb-4 border-left-primary border-right-primary" >
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-primary text-center">Manage Your Products</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>

                    </div>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow-lg mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('admin.exportProduct')}}" class="btn btn-success btn-icon-split btn-sm" >
                                <span class="icon text-white-100">
                                    <i class="far fa-file-excel"></i>
                                </span>
                                 <span class="text">Export .xls</span>
                            </a>
                            <a href="{{route('products.create')}}" class="btn btn-secondary btn-icon-split btn-sm" >
                                <span class="icon text-white-100">
                                    <i class="far fa-file-pdf"></i>
                                </span>
                                 <span class="text">Export CSV</span>
                            </a>
                            <a href="{{route('products.create')}}" class="btn btn-danger btn-icon-split btn-sm" >
                                <span class="icon text-white-100">
                                    <i class="far fa-file-pdf"></i>
                                </span>
                                 <span class="text">Export PDF</span>
                            </a>
                            <a href="{{route('products.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right" >
                                <span class="icon text-white-100">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                 <span class="text">Add Products</span>
                            </a>
                        </div>
                        <div class="card-body table-responsive text-center">
                            {{-- <livewire:product-table/> --}}
                            <table class="table table-striped data-table" id = "products" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> 
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
  
  

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src = '{{ url('frontend/js/customtoastr.js') }}'></script>
    @if(Session::has('message'))
        {!! displayAlert() !!}
    @endif
   
    <script>
        $(function () {
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('products.index') }}", 
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'category.name', name: 'category.name'},
                  {data: 'created_at', name:'created_at'},
                  {data:  'updated_at', name:'updated_at'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
       
            });
        });
    
        
        </script>

@endsection 
       




















































@section('scripts')
        <!-- Page level plugins -->
        <script src="{{ url('frontend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('frontend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ url('frontend/js/demo/datatables-demo.js') }}"></script>
        <script>
            $('#alert').show('fast').delay(5000).hide('slow', function(){$('#alert').remove()});
        </script>
@endsection
