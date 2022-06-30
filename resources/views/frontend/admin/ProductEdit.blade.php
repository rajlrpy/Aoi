@extends('frontend.layout.main')


@section('main-container')
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow-lg mb-4 border-left-primary border-right-primary" >
                    <div class="card-header py-3">
                        <h1 class="m-0 font-weight-bold text-primary text-center">Update Products</h1>
                    </div>
                    <div class="card-body">
                        <form class="user submit" action="{{ route('products.update', $product )}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <select class="selectpicker" name='category_id' data-size="3" data-live-search="true" title="Select Category"  required>
                                    <option value="{{ $product->category->id }}" selected > {{ $product->category->name }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                        <div class="text-danger text-center" >
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="name" class="form-control form-control-user" name="name"
                                    placeholder="Enter the Product Name " value = "{{ $product->name }}" required>
                                    @error('name')
                                        <div class="text-danger text-center" >
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <button class="btn btn-primary btn-user btn-block submit"  value="submit" > Update Product</button>
                            <a href="{{ route('products.index') }}" class="btn btn-success btn-user btn-block" value="submit" > Go Back</a>
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
