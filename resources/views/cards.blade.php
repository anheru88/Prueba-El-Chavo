@extends('layout')

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
                                <p class="card-text">{{ isset($person->nicks[0]->name) ? $person->nicks[0]->name : "" }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-warning"
                                           href="{{ route('chavo.edit', $person->id) }}">Edit</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"
                                                data-id="{{ $person->id }}">Delete
                                        </button>
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

@section('scripts')
    <script src="{{ asset('js/delete_script.js') }}"></script>
@endsection