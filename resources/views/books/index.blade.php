@extends('layouts/app')

@section('main-content')

    <section class="container">
        <div class="row">

            <div class="col-12 ">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>Books</h2>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('books.create') }}" class="btn btn-warning"><i class="fa-solid fa-plus"></i>&nbsp;Create new
                                    book</a>                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>

                                    <th scope="col">ISBN</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Pages</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Soldout</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <th>{{ $book->ISBN }}</th>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->pages }}</td>
                                        <td class="text-end">{{ $book->price }}</td>
                                        <td>{{ $book->year }}</td>
                                        <td>
                                            <button type="submit" title="{{$book->soldout ? 'stock' : 'soldout' }}" class="btn btn-outline" ><i class="fa-2x fa-solid fas fa-fw {{$book->soldout ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i></button>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-success" title="show"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <h2>
                                        No items
                                    </h2>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-end">
                        <b>{{count($books)}}</b> item/s
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

