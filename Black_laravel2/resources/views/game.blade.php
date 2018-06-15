
 @extends('layouts.index')
 @section('title', 'Black Jack')
    <body>
        <form method="get" action="{{ route('hit') }}">
            {{ csrf_field() }}
            <h1>Black Jack</h1>
            <div id="dealer">
                <h2>ディーラー(?)</h2>
                <img class="img" src="{{ asset('public/imags/'.$dealer['card'][0].'.gif') }}">
                <img class="img" src="{{ asset('public/imags/z1.gif')}}">
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
                <img class="img" src="{{ asset('public/imags/'.$card.'.gif') }}">
                @endforeach
            </div>
            <div id="login">
                <button class="btn btn-primary" type="submit" >ヒット</button>
                <button class="btn btn-primary" type="button" onclick="location.href='{{ route('stand') }}'">スタンド</button>
                <button class="btn btn-primary" type="button" onclick="location.href='{{ route('game') }}'">リスタート</button>
            </div>
            <div>
                <a id='main' href="{{ route('home') }}">HOME</a>
            </div>
        </form>
    </body>
</html>
