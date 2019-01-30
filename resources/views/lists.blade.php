@extends('layout')

@section('style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row">

                @for ($i = 0; $i < 10; $i++)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="https://lorempixel.com/640/480/?47162{{ $i }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Name</h5>
                                <p class="card-text">Nick Name</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-warning">Edit</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
    </div>
@endsection