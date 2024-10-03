<?php

/**
 *    ooooo      ooo            .oooooo..o oooo         o8o                .oooooo.   oooo
 *    `888b.     `8'           d8P'    `Y8 `888         `"'               d8P'  `Y8b  `888
 *     8 `88b.    8   .ooooo.  Y88bo.       888  oooo  oooo  ooo. .oo.   888           888 .oo.    .oooo.   ooo. .oo.    .oooooooo  .ooooo.
 *     8   `88b.  8  d88' `88b  `"Y8888o.   888 .8P'   `888  `888P"Y88b  888           888P"Y88b  `P  )88b  `888P"Y88b  888' `88b  d88' `88b
 *     8     `88b.8  888   888      `"Y88b  888888.     888   888   888  888           888   888   .oP"888   888   888  888   888  888ooo888
 *     8       `888  888   888 oo     .d8P  888 `88b.   888   888   888  `88b    ooo   888   888  d8(  888   888   888  `88bod8P'  888    .o
 *    o8o        `8  `Y8bod8P' 8""88888P'  o888o o888o o888o o888o o888o  `Y8bood8P'  o888o o888o `Y888""8o o888o o888o `8oooooo.  `Y8bod8P'
 *                                                                                                                      d"     YD
 *                                                                                                                      "Y88888P'
 *
 *    This plugin is open source, allowing you to modify and duplicate it as you wish.
 *    Feel free to customize it according to your needs and contribute to its development.
 *    Your feedback and improvements are always welcome!
 *
 *    @name NoSkinChange
 *    @author Kronnosy
 *    @version 1.0.0
 */

namespace Kronnosy\NoSkinChange;

use pocketmine\
{
    event\Listener,
    event\player\PlayerChangeSkinEvent,
    plugin\PluginBase as Base
};

class NoSkinChange extends Base implements Listener
{
    /**
     * @return void
     */
    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(
            $this,
            $this
        );

        parent::onEnable();
    }

    /**
     * @param PlayerChangeSkinEvent $playerChangeSkinEvent
     * @return void
     */
    public function onPlayerChangeSkinEvent(PlayerChangeSkinEvent $playerChangeSkinEvent): void
    {
        $player = $playerChangeSkinEvent->getPlayer();

        if (!$player->hasPermission("nsc.permission.use")) {
            $playerChangeSkinEvent->cancel();
        }
    }
}
