<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Laravel-2</title>
</head>
<body style="background:#000;">
<div class="container">
    <div style="text-align: center;font-size: 40px;font-weight: bold; color: red"><p>Edit information</p></div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                    <div class="container">
                        <form method="post" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Firstname</label>
                                            <input id="form_name" type="text" name="Firstname"
                                                   class="form-control  @error('Firstname') is-invalid @enderror"
                                                   placeholder="Please enter your Firstname *"
                                                   data-error="Firstname is required."
                                                   value="{{old('Firstname', $post->Firstname)}}">


                                            @error('Firstname')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Lastname</label>
                                            <input id="form_lastname" type="text" name="Lastname"
                                                   class="form-control @error('Lastname') is-invalid @enderror"
                                                   placeholder="Please enter your Lastname *"
                                                   data-error="Lastname is required."
                                                   value="{{old('Lastname', $post->Lastname)}}">

                                            @error('Lastname')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Image </label>
                                            <div class="avatar">
                                                <img style="width: 50px; height: 50px; border-radius: 50%;"
                                                     src="{{asset('storage/images/'.$post->image)}}" alt="">
                                            </div>
                                            <input id="form_message" type="file" name="image"
                                                   class="form-control @error('image') is-invalid @enderror"
                                                   placeholder="Please enter your image *"
                                                   data-error="Image is required.">
                                            @error('image')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Description *</label>
                                                <textarea id="form_message" name="description"
                                                          class="form-control @error('description') is-invalid @enderror"
                                                          placeholder="Write  description here." rows="4"
                                                          data-error="Please, leave us a description.">
                                                    {{old('description',$post->description)}}
                                                </textarea
                                                >
                                                @error('description')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""></label><select name="category_id" id="" class="form-control mt-1">

                                                    <option hidden>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option {{$post->category->id === $category->id ? 'selectd' : ''}} value="{{$category->id}}" >{{$category->name}}</option>


                                                    @endforeach

                                                </select>
                                                @error('description')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="col-md-12 m-1">

                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"
                                                   value="Edit_post">

                                        </div>

                                    </div>

                                </div>
                                </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
</div>


</body>
</html>
