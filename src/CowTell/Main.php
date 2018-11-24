<?php

namespace CowTell;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

	public function onEnable() {
		$this->getServer()->getPluginManager->registerEvents($this, $this);
	}

	public static $lastMessaged = [];
	public $plugin;

	public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
		if(empty($args[1]));
		$sender->sendMessage(TextFormat::RED . "-" . TextFormat::GOLD . "Usage: " . TextFormat::AQUA . "/tell <player> <message>");
		return false;
}
	if(($player = $this->plugin->getServer()->getPlayer($args[0])) == null){
		$sender->sendMessage(TextFormat::RED . "-" . TextFormat::AQUA . "Could Not Find Them Online");
		return false;
}
	if(!player->hasMessagesEnabled()){
		$sender->sendMessage(TextFormat::RED . "-" . TextFormat::RED . "That Player Has Direct Messages Disabled");
		return false;
}
	$sender->sendMessage(TextFormat::DARK_GRAY . "[" . TextFormat::GREEN . "me" . TextFormat::GRAY . " -> " . TextFormat::AQUA . "$player->getname()" . TextFormat::DARK_GRAY . "] " . TextFormat::GRAY . $this->getMessage($args));
	$player->sendMessage(TextFormat::DARK_GRAY . " [" . TextFormat::GREEN . $sender->getName() . TextFormat::GRAY . " -> " . TextFormat::AQUA . "me" . TextFormat::DARK_GRAY . "] " . TextFormat::GRAY . $this->getMessage($args));
	self::$lastMessaged[$sender->getName()] = $player->getName();
	self::$lastMessaged[$player->getName()] = $sender->getName();
	return true;
}
	public function getMessage(array $args): string{
	unset($args[]);
	return implode(" ", $args);
}
