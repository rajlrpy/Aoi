@extends('frontend.layout.main')

@section('assets')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src = '{{ url('frontend/js/customtoastr.js') }}'></script>
    @if(Session::has('message'))
        {!! displayAlert() !!}
    @endif
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
                            <a href="{{route('products.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right" >
                                <span class="icon text-white-100">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                 <span class="text">Add Products</span>
                            </a>
                        </div>

                        <div class="card-body text-center">
                            <livewire:product-table/>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
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
