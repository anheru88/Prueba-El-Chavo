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
                <div class="col">
                    <p>Sort by
                        <a href="{{ route('chavo.cards', ['sort' => 'name']) }}"
                           class="btn btn-primary">Name</a>
                        <a href="{{ route('chavo.cards', ['sort' => 'nickname']) }}"
                           class="btn btn-primary">NickName</a>
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($persons as $person)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="{{ $person->image }}" alt="{{ $person->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $person->name }}</h5>
                                @if(isset($nicks))
                                    @if($person->nicks()->orderBy('name')->first() != null)
                                        <p class="card-text">{{ $person->nicks()->orderBy('name')->first()->name }}</p>
                                    @endif
                                @else
                                    <p class="card-text">{{ $person->nicks()->inRandomOrder()->first()->name }}</p>
                                @endif
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-warning">Edit</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($persons->links() != null)
                <div class="row justify-content-end">
                    <div class="col-4">
                        @if(isset($sort))
                            {{ $persons->appends(['sort' => $sort])->links() }}
                        @else
                            {{ $persons->links() }}
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection