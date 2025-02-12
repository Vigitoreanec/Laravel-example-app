@extends('layouts.app')
@section('title', 'Пост')

@section('menu')
    @if ((Auth::user()))
        @include('admin.parts.menu')
    @else
        @include('parts.menu')    
    @endif
@endsection

@section('content')
    <div style="text-align: center;  
                                                                margin-top: 0;
                                                                margin-bottom: 0;">
        <h1>Пост</h1>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('parts.message')

                <div class="card">

                    <div class="card-header"> {{ $post->title }} </div>

                    <div class="card-body">
                        @if ($post->image)
                            <img class="w-25 me-2 float-start" src="{{ asset('storage/' . $post->image) }}" alt="img">
                        @endif
                        {{ $post->text }}


                    </div>
                    <button data-id="{{ $post->id }}" class="btn btn-primary w-25 likeButton ms-3 mb-2">
                        Likes: <span id="likeCount">{{ $post->likes }}</span>
                    </button>

                    <script>
                        let buttonLike = document.querySelectorAll('.likeButton');
                        buttonLike.forEach((elem) => {
                            elem.addEventListener('click', () => {
                                let id = elem.getAttribute('data-id');
                                console.log(id);
                                //отправить запрос fetch
                                axios.post('/posts/${id}/add/like')
                                    .then(response => {
                                        document.getElementById('likeCount').textContent = response.data.likes
                                    })
                                    .catch(error => {
                                        console.log('Error:')
                                    });

                            })
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>



@endsection