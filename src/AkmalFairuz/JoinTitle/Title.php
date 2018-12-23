<?php

namespace AkmalFairuz\JoinTitle;

use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class Title extends Task{

     public function __construct(Player $player, string $title, string $subtitle, int $time) {
           $this->player = $player;
           $this->title = $title;
           $this->subtitle = $subtitle;
           $this->time = $time;
     }
     
     public function onRun($currentTick) {
           if($this->player != null){
                $this->player->setTitle($this->title, $this->subtitle, $this->time);
           }
     }
     
     
}