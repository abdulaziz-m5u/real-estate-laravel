@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="btn btn-light shadow-sm">Back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gallery</h3>
               </div>
               <div class="card-body">
                <form action="{{ route('admin.properties.galleries.store', $property->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
             <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($property->galleries as $gallery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <a href="{{ Storage::url($gallery->photo)}}">
                                <img src="{{ Storage::url($gallery->photo)}}" width="200" alt="">
                              </a>
                            </td>  
                            
                            <td>
                                <a href="{{ route('admin.properties.galleries.edit',[$property->id,$gallery->id]) }}" class="btn btn-info">edit</a>
                                <form onclick="return confirm('are you sure');" class="d-inline-block" action="{{ route('admin.properties.galleries.destroy', [$property->id,$gallery->id])}}" method="post">
                                    @csrf 
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
              </div>
              </div>
            </div>
        </div>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Edit Property</h3>
               </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.properties.update', $property->id)}}">
                @csrf 
                @method('put')
                <div class="card-body">
                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name', $property->name)}}" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      @foreach($categories as $category)
                        <option  {{ $category->id === $property->category->id ? 'selected' : null }} value="{{ $category->id }}" {{old('category_id') ? 'selected' : null}}>
                          {{$category->name}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" value="{{old('location', $property->location)}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{old('price', $property->price)}}">
                  </div>
                  <div class="form-group">
                    <label for="bed">Bed</label>
                    <input type="number" name="bed" class="form-control" value="{{old('bed', $property->bed)}}">
                  </div>
                  <div class="form-group">
                    <label for="bath">Bath</label>
                    <input type="number" name="bath" class="form-control" value="{{old('bath', $property->bath)}}">
                  </div>
                  <div class="form-group">
                    <label for="dimension">Dimension</label>
                    <input type="number" name="dimension" class="form-control" value="{{old('dimension', $property->dimension)}}">
                  </div>
                  <div class="form-group">
                    <label for="year_build">Year build</label>
                    <input type="date" name="year_build" class="form-control" value="{{old('year_build', $property->year_build)}}">
                  </div>
                  <div class="form-group">
                    <label for="address">address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ old('address', $property->address) }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description', $property->description) }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection