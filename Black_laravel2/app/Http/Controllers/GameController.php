<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;

class GameController extends Controller
{
    public function start()
    {
        Session()->flush();
        $jack = new \App\BlackJack();
        //カードを2枚ずづ取得
        for($i=0; $i<2; $i++) {
            $dealer['num'][$i] = $jack->getNum();
            $dealer['card'][$i] = $jack->getCard($dealer['num'][$i]);
            $player['num'][$i] = $jack->getNum();
            $player['card'][$i] = $jack->getCard($player['num'][$i]);
        }

        //点数を取得
        $player['point'] = $jack->changeNumAll($player['num']);
        
        //カードをsessionで保存
        $jack->setDealer($dealer);
        $jack->setPlayer($player);
        
        return view('game', ['player'=>$player, 'dealer'=>$dealer]);
    }
    
    public function hit()
    {
        $jack = new \App\BlackJack();
        //sessionの値を取得
        $dealer = $jack->getDealer();
        $player = $jack->getPlayer();

        //カードを1枚取得
        $player['hit_num'] = $jack->getNum();
        $player['card'][] = $jack->getCard($player['hit_num']);
        $player['num'][] = $player['hit_num'];
        //点数取得
        $player['point'] = $jack->changeNumAll($player['num']);
        
        //バーストか判定
        $player['point'] = $jack->burst($player['point']);
        //バーストならヒットボタンは表示されない
        $hitBtn = true;
        if($player['point'] === 'BURST') {
            $hitBtn = false;
        }
        
        //sessionに値を保存
        $jack->setPlayer($player);
        return view('hit', ['player'=>$player, 'dealer'=>$dealer, 'hitBtn'=>$hitBtn]);
    }

    public function stand()
    {
        $jack = new \App\BlackJack();
        //sessionの値を取得
        $dealer = $jack->getDealer();
        $player = $jack->getPlayer();
        
        //点数取得
        $dealer['point'] = $jack->changeNumAll($dealer['num']);
        $player['point'] = $jack->changeNumAll($player['num']);
        
        //16以上になるまでディーラーはカードを取得する
        while($dealer['point'] <= 16) {
            $dealer['hit_num'] = $jack->getNum();
            $dealer['card'][] = $jack->getCard($dealer['hit_num']);
            $dealer['num'][] = $dealer['hit_num'];
            $dealer['point'] = $jack->changeNumAll($dealer['num']);
        }
        
        //バーストか判定
        $player['point'] = $jack->burst($player['point']);
        $dealer['point'] = $jack->burst($dealer['point']);
        
        //勝敗判定
        if($player['point'] <= $dealer['point'] || $dealer['point'] == '') {
            $msg = 'YOU LOSE';
        } else {
            $msg = 'YOU WIN';
        }
        return view('stand', ['player'=>$player, 'dealer'=>$dealer, 'msg'=>$msg]);
    }
}
