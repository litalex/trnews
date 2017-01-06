@extends('layouts.admin')

<div class="container">
    <div class="row">
        @section('left_block')
            <div class="col-md-2">
                @if (count($menu) > 0)
                    <ul class="nav nav-stacked">
                        @foreach ($menu as $item)
                                <li><a href="{{ $item['href'] }}">{{ $item['title'] }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endsection

        @section('content')
            <div class="col-md-10">
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <div>
                            <h4><a href="{{ $item->view_route }}">{{ $item->title }}</a>
                                <small>{{ $item->updated_at }}</small>
                                <div>
                                    @if (count($item->tags) > 0)
                                    <small class="glyphicon glyphicon-tags">
                                        @foreach ($item->tags as $tag)
                                            <a href="{{ $tag->view_route }}">{{ $tag->title }}</a>
                                        @endforeach
                                    </small>
                                    @endif
                                </div>
                            </h4>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>
        @endsection
    </div>
</div>