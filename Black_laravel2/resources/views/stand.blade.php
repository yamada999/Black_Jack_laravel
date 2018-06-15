@extends('layouts.index')
@section('title', 'Black Jack')
    <body>
        <form method="get" action="{{ route('hit') }}">
            <h1>{{ $msg }}</h1>
            <div id="dealer">
                <h2>
                    ディーラー
                    @if($dealer['point'] === 21)
                        <img width="30" height="30" src="{{ asset('public/imags/21.jpg') }}">
                    @else
                        ({{ $dealer['point'] }})
                    @endif
                </h2>
                
                @foreach($dealer['card'] as $card)
                <img width="100" height="150" class="img" src="{{ asset('public/imags/'.$card.'.gif') }}">
                @endforeach
            </div>
            <div id="player">
                <h2>プレイヤー
                    @if($player['point'] === 21)
                        <img width="30" height="30" src="{{ asset('public/imags/21.jpg') }}">
                    @else
                        ({{ $player['point'] }})
                    @endif
                </h2>
                @foreach($player['card'] as $card)
                <img width="100" height="150" class="img" src="{{ asset('public/imags/'.$card.'.gif') }}">
                @endforeach
            </div>
            <div id="login">
                <button class="btn btn-primary" type="button" onclick="location.href='{{ route('game') }}'">リスタート</button>
            </div>
            <div>
                <a id='main' href="{{ route('game') }}">HOME</a>
            </div>
        </form>
    </body>
</html>