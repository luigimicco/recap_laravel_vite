@extends('layouts/app')

@section('main-content')
    <div id="books" class="">
        <books-table></books-table>
    </div>
@endsection

@push('js')
    @vite('resources/js/pages/Books/books.js')
@endpush