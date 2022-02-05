<?php

namespace LittleAraaCute\OnlyProxyJoin;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerPreLoginEvent;

class Main extends PluginBase implements Listener {
	
	public function onEnable(): void {
		$this->getLogger()->info("Plugin Enabled by LittleAraaCute");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("config.yml");
        $this->getConfig = new Config($this->getDataFolder() . "config.yml", Config::YAML);
	}
	
	public function onPreLogin(PlayerPreLoginEvent $event){
		if($event->getIp() == $this->getConfig()->get("proxy-ip")){
			$event->setKickReason(0, $this->getConfig()->get("kick-message"));
		}
	}
}