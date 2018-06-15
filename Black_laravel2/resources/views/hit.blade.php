@extends('layouts.index')
@section('title', 'Black Jack')
    <body>
        <form method="get" action="{{ route('hit') }}">
            <h1>Black Jack</h1>
            <div id="dealer">
                <h2>ディーラー(?)</h2>
                <img width="100" height="150" class="img" src="{{ asset('public/imags/'.$dealer['card'][0].'.gif') }}">
                <img width="100" height="150" class="img" src="{{ asset('public/imags/z1.gif')}}">
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
                @if($hitBtn)
                <button class="btn btn-primary" type="submit" >ヒット</button>
                @endif
                <button class="btn btn-primary" type="button" onclick="location.href='{{ route('stand') }}'">スタンド</button>
                <button class="btn btn-primary" type="button" onclick="location.href='{{ route('game') }}'">リスタート</button>
            </div>
            <div>
                <a id='main' href="{{ route('geme') }}">HOME</a>
            </div>
        </form>
    </body>
</html>
