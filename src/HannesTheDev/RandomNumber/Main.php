<?php

namespace HannesTheDev\RandomNumber;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase
{
    public $min;
    public $max;


    public function onLoad()
    {
        $this->saveDefaultConfig();
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->min = $config->get("min");
        $this->max = $config->get("max");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool
    {
        switch ($cmd->getName()) {
            case "randomnumber":
                if ($sender->hasPermission("randomnumber.randomnumber.cmd")) {
                    if (!empty($this->things)) {
                        $random = rand($this->min, $this->max);
                        $sender->sendMessage("§3Your random number is: §e" . $random);
                    }
                }
                break;
        }
        return true;
    }
}
