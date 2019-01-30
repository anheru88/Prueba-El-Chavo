@extends('layout')

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Sort by
                        <a href="{{ route('chavo.lists', ['sort' => 'name']) }}"
                           class="btn btn-primary">Name</a>
                        <a href="{{ route('chavo.lists', ['sort' => 'nickname']) }}"
                           class="btn btn-primary">NickName</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Nick Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($persons as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td><img class="img-fluid" src="{{ $person->image }}" alt="{{ $person->name }}"
                                     style="height: 100px"></td>
                            <td>{{ $person->name }}</td>
                            <td>
                                @if(isset($nicks))
                                    @if($person->nicks()->orderBy('name')->first() != null)
                                        <p class="card-text">{{ $person->nicks()->orderBy('name')->first()->name }}</p>
                                    @endif
                                @else
                                    <p class="card-text">{{ $person->nicks()->inRandomOrder()->first()->name }}</p>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-warning">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete"
                                            data-id="{{ $person->id }}">Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Nick Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </tfoot>
                </table>
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
    @include('partials.delete_script')
@endsection