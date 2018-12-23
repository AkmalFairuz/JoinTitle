<?php

namespace AkmalFairuz\JoinTitle;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{

     public function onEnable()
     {
           Server::getInstance()->getPluginManager()->registerEvents($this, $this);
           // **COPYRIGHT** JANGAN DIGANTI YA BRO :)
           $this->getLogger()->info("§aPlugin JoinTitle for Steadfast2 by AkmalFairuz");
           $this->getLogger()->info("§bGithub: https://github.com/AkmalFairuz/");
           // **COPYRIGHT** JANGAN DIGANTI YA BRO :)
     }
     
     public function onDisable()
     {
           // **COPYRIGHT** JANGAN DIGANTI YA BRO :)
           $this->getLogger()->info("§aPlugin JoinTitle for Steadfast2 by Akmal Fairuz §cdisabled");
           $this->getLogger()->info("§bGithub: https://github.com/AkmalFairuz/");
           // **COPYRIGHT** JANGAN DIGANTI YA BRO :)
     }
     
     public function onJoin(PlayerJoinEvent $event) {
           $player = $event->getPlayer();
           $event->setJoinMessage("§e".$player->getName()." joined the game");
           $title = $this->cfg->get("title");
           $subtitle = $this->cfg->get("subtitle");
           $time = $this->cfg->get("time");
           Server::getInstance()->getScheduler()->scheduleDelayedTask(new Title($player, $title, $subtitle, $time), 60);
     }
     
     public function config(){
     	   @mkdir($this->getDataFolder());
           $this->saveResource("config.yml");
           $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
     }
     
}
