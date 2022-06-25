@extends('frontend.layout.main')
@section('assets')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('main-container')
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow-lg mb-4 border-left-primary border-right-primary" >
                    <div class="card-header py-3">
                        <h1 class="m-0 font-weight-bold text-primary text-center">Add Category</h1>
                    </div>
                    <div class="card-body">
                        <form class="user submit" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="name" class="form-control form-control-user" name="name"
                                    placeholder="Enter the Category Name " value = "{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger text-center" >
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control " name="icon"  accept="image/*"
                                    placeholder="Choose Icon" required>
                                    @error('icon')
                                        <div class="text-danger text-center" >
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <button class="btn btn-primary btn-user btn-block submit" value="submit" > Save Category</button>
                            <a href="{{ route('category.index') }}" class="btn btn-success btn-user btn-block"> Go Back</a>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>

        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        (function(){
            $('.submit').on('submit', function(){
                $('.submit').attr('disabled','true').css("cursor", "not-allowed");
            })
        })();
    </script>
@endsection
