@extends('layouts.master')
@section('content')


  <div class="container">
            <div class=" justify-content-center">
                    <br>
                    <hr>
                    <h1>Add new Product</h1>
                    <hr>
                    <br>
                <div  class="col-sm-12 col-xl-6">

                    <form method="POST"  action="{{ route('products.add') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="inputClassProd" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
                             @if (Session::has('errors'))
                            <p style="color:red;">  {{session('errors')->first('nameExist')}} </p>
                            @endif
                        </div>

                         <div class="form-group">
                            <label for="name">Category:</label>
                            <select name="category" class="inputClassProd" >
                            <option></option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ (collect(old('category'))->contains($category->id)) ? 'selected':'' }} >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category')) <p style="color:red;">{{ $errors->first('category') }}</p> @endif
                        </div>


                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" id="description" name="description" rows="4" cols="50">{{old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" step="0.01" min="0" class="inputClassProd" id="price" name="price" value="{{ old('price') }}">
                            @if ($errors->has('price')) <p style="color:red;">{{ $errors->first('price') }}</p> @endif
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock:</label>
                            <input type="number" step="1" min="0" class="inputClassProd" id="stock" name="stock" value="{{ old('stock') }}">
                            @if ($errors->has('stock')) <p style="color:red;">{{ $errors->first('stock') }}</p> @endif
                        </div>

                        <div class="form-group">
                            <label for="file">Upload picture:</label>
                            <input type="file" class="inputClassProd" id="file" name="image" value="{{ old('image') }}">
                            @if ($errors->has('image')) <p style="color:red;">{{ $errors->first('image') }}</p> @endif
                        </div>


                        <div class="form__row form__row--buttons">
                            <div class="form__group">
                                <button class="button button4">Save</button>
                            </div>

                            <!-- /form__group -->
                        </div>

                    </form>
                </div>
            </div>
    </div>
@endsection
