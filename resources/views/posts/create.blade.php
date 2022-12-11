@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{route('posts.store')}}">
    @csrf
    <div class="">
        <label for="title">Title:</label>
        <input type="text" name="title">
    </div>
    <div class="">
        <label for="content">Content:</label>
        <input type="text" name="content">
    </div>
    <button type="submit">Add post</button>
</form>
