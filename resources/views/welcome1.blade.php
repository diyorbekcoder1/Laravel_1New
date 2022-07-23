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
<body style="background:wheat;">

<div class="container">

    <div class="row">

        <div class="card-header">
            <a class="btn btn-primary" href="{{route('categories.create')}}">Create</a>

        </div>

        <div class="col-12">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>

                    <th scope="col">Image</th>

                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($rains))
                    @foreach($rains as $key => $post)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$post->name}}</td>
                            <td>{{$post->title}}</td>

                            <td style="width: 50px; height: 50px; border-radius: 50%;"><img
                                    style="width: 50px; height: 50px; border-radius: 50%;"
                                    src="{{ asset('storage/images/'.$post->image) }}"
                                    alt="">
                            </td>


                            <td>
                                <a href="{{route('categories.show', $post)}}" class="btn btn-warning">Show</a>
                                <a href="{{route('categories.edit', $post)}}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" action="{{route('categories.destroy',$post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>


                            </td>

                        </tr>

                    @endforeach

                </tbody>

                @endif
            </table>


        </div>


    </div>


</div>


</body>
</html>
