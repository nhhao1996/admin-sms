@extends('admin::layouts.master')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list))
            @foreach($list as $item)
            <tr>
                <th scope="row">1</th>
                <td>{{$item['name']}}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{ $list->links()}}
@endsection
