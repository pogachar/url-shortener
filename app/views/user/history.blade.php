@extends('layouts.default')

@section('content')
    <h2>My URL's</h2>

    @if($links->count())
        <table>
            <thead>
                <tr>
                    <th>Host</th>
                    <th>Short URL</th>
                </tr>
            </thead>
            @foreach($links as $link)
                <tr>
                    <td>
                        {{ $link->present()->host($link) }}
                        <span style="visibility: hidden; display: none;">{{ $link->url }}</span>
                    </td>
                    <td>{{ $link->present()->shortUrl($link) }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>You have no URL's</p>
    @endif
@stop