<?php

declare(strict_types=1);

namespace Blast1611\JLMessages;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{ 

    protected function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("JLMessages Enabled");
    }

    public function onJoin(PlayerJoinEvent $event){
        $name = $event->getPlayer()->getName();
        $player = $event->getPlayer();

        $message = str_replace('{name}', $name, $this->getConfig()->get("join"));
        $event->setJoinMessage($message);
    }

    public function onLeave(PlayerQuitEvent $event){
        $name = $event->getPlayer()->getName();
        $player = $event->getPlayer();

        $message = str_replace('{name}', $name, $this->getConfig()->get("leave"));
        $event->setQuitMessage($message);
    }
}
