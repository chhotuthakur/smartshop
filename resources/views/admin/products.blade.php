@extends('admin.layouts.base')
@section('page-content')

<!-- Default box -->

<div class="card">
    
    <div class="card-header">
      <h3 class="card-title">Products</h3>
      

      <div class="card-tools">
        <a type="button" class="btn btn-primary" style="margin-right: 10px;" href="{{ route('admin.products.create') }}">Add Product</a>

        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
        {{-- @dd($items) --}}
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 20%">Product Name</th>
                    <th style="width: 30%">Price</th>
                    <th>Rating</th>
                    <th style="width: 8%" class="text-center">Category</th>
                    <th>Sub Category</th>
                    <th style="width: 20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a>{{ $product->name }}</a>
                        <br/>
                        <small>Created {{ $product->created_at->format('d.m.Y') }}</small>
                    </td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->rating }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->sub_category }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.products.show', $product->id) }}">
                            <i class="fas fa-folder"></i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.products.edit', $product->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->




 
@stop
