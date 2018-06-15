<?php
namespace App;

use Session;

class BlackJack 
{
    const J = 11;
    const Q = 12;
    const K = 13;
    const BJ = 21;
    
    public function setDealer($dealer):void
    {
        Session::put('dealer_num', $dealer['num']);
        Session::put('dealer_card', $dealer['card']);
    }
    
    public function setPlayer($player):void
    {
        Session::put('player_num', $player['num']);
        Session::put('player_card', $player['card']);
    }

    public function getDealer():array
    {
        $dealer['num'] = Session::get('dealer_num');
        $dealer['card'] = Session::get('dealer_card');
        return $dealer;
    }
    
    public function getPlayer():array
    {
        $player['num'] = Session::get('player_num');
        $player['card'] = Session::get('player_card');
        return $player;
    }
    
    /**
     * ランダムに1∼13数字を取得
     */
    public function getNum(): int
    {
        $this->num = rand(1,13);
        return $this->num;
    }

    //数字とマークを文字列にして返す
    public function getCard(int $num): string
    {
        $mark = ['c'=>0, 'd'=>0, 'h'=>0, 's'=>0];
        $this->mark = array_rand($mark);
        $this->card = $this->mark.$num;
        return $this->card;
    }
    
    /**
     * 11∼13のカードを10に変えて手札の合計を返す
     * @param int $cardArray 保存されているカードの配列
     */
    public function changeNumAll(array $cardArray): int
    {
        $allCard = 0;
        foreach ($cardArray as $card) {
            if($card >= self::J && $card <= self::K) {
                $card = 10;
            }
        $allCard += $card;
        }
        return $allCard;
    }
    
    public function burst(int $point)
    {
        if($point > self::BJ) {
            $msg = 'BURST';
        } else {
            $msg = $point;
        }
        return $msg;
    }
}
