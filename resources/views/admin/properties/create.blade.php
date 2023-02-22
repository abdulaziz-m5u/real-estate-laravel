@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
         @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.properties.index')}}" class="btn btn-light shadow-sm">Back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.properties.store')}}" enctype="multipart/form-data">
                @csrf 
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{old('category_id') ? 'selected' : null}}>
                          {{$category->name}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" value="{{old('location')}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{old('price')}}">
                  </div>
                  <div class="form-group">
                    <label for="bed">Bed</label>
                    <input type="number" name="bed" class="form-control" value="{{old('bed')}}">
                  </div>
                  <div class="form-group">
                    <label for="bath">Bath</label>
                    <input type="number" name="bath" class="form-control" value="{{old('bath')}}">
                  </div>
                  <div class="form-group">
                    <label for="dimension">Dimension</label>
                    <input type="number" name="dimension" class="form-control" value="{{old('dimension')}}">
                  </div>
                  <div class="form-group">
                    <label for="year_build">Year build</label>
                    <input type="date" name="year_build" class="form-control" value="{{old('year_build')}}">
                  </div>
                  <div class="form-group">
                    <label for="address">address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ old('address') }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description') }}</textarea>
                  </div>
                </div>

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