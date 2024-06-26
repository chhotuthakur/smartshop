@extends('admin.layouts.base')
@section('page-content')
    <script>
        window.onload = function() {
            @if (session('success'))
                alert('{{ session('success') }}');
            @elseif (session('error'))
                alert('{{ session('error') }}');
            @endif
        };
    </script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                        {{-- main content --}}
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Product Name</label>
                                    <input type="text" id="inputName" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputImage">Product Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="product_image" class="custom-file-input" id="inputImage" required>
                                        <label class="custom-file-label" for="inputImage">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPrice">Price</label>
                                    <input type="number" id="inputPrice" name="price" class="form-control" required step="0.01">
                                </div>
                                <div class="form-group">
                                    <label for="inputRating">Rating (from 1 to 5)</label>
                                    <input type="number" id="inputRating" name="rating" class="form-control" required step="0.1">
                                </div>
                                <div class="form-group">
                                    <label for="inputSize">Size</label>
                                    <input type="text" id="inputSize" name="size" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputColor">Color</label>
                                    <input type="text" id="inputColor" name="color" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputShortDescription">Short Description</label>
                                    <textarea id="inputShortDescription" name="short_description" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Long Description</label>
                                    <textarea id="inputDescription" name="long_description" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDetails">Details</label>
                                    <textarea id="inputDetails" name="details" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputCategory">Category</label>
                                    <input type="text" id="inputCategory" name="category" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputSubCategory">Sub Category</label>
                                    <input type="text" id="inputSubCategory" name="sub_category" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success float-right">Create new Product</button>
                            </div>
                        </form>
                        
                        

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
@stop
