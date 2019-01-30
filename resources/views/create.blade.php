@extends('layout')

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Create Person</h3>
                </div>
                <div class="col">
                    <button class="btn-primary btn" id="add_nickname">Add new Nickname</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {!! Form::open(array('route'=>'chavo.store','files'=>true)) !!}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter the title">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter the name">
                        </div>
                        <div id="nicks" data-elements="1">
                            <div class="form-group">
                                <label for="nickname[0]">NickName 1</label>
                                <input type="text" class="form-control" name="nickname[0]" placeholder="Enter Nickname 1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="apartment">Apartment</label>
                            <input type="text" class="form-control" name="apartment" placeholder="Apartment">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#add_nickname').on('click', function () {
                elements = $('#nicks').data("elements");
                elements++;
                $('#nicks').append('<div class="form-group">\n' +
                    '                                <label for="nickname[' + (elements - 1) + ']">NickName ' + elements + '</label>\n' +
                    '                                <input type="text" class="form-control" name="nickname[' + (elements - 1) + ']" placeholder="Enter Nickname ' + elements + '">\n' +
                    '                            </div>');

                $('#nicks').data("elements", elements);
            })
        });
    </script>
@endsection