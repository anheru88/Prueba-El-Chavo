@extends('layout')

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Edit: {{ $person->name }}</h3>
                </div>
                <div class="col">
                    <button class="btn-primary btn" id="add_nickname">Add new Nickname</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter the title">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter the name">
                        </div>
                        <div class="form-group">
                            <label for="nickname[0]">NickName 1</label>
                            <input type="text" class="form-control" id="nickname" placeholder="Enter Nickname 1">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image">
                        </div>
                        <div class="form-group">
                            <label for="apartment">Apartment</label>
                            <input type="text" class="form-control" id="apartment" placeholder="Apartment">
                        </div>
                        <div class="form-group">
                            <label for="descriptio">Description</label>
                            <textarea class="form-control" id="descriptio" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection