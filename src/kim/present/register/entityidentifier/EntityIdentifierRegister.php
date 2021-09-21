<?php

/**
 *
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author  PresentKim (debe3721@gmail.com)
 * @link    https://github.com/PresentKim
 * @license https://www.gnu.org/licenses/lgpl-3.0 LGPL-3.0 License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 *
 * @noinspection PhpUnused
 * @noinspection SpellCheckingInspection
 */

declare(strict_types=1);

namespace kim\present\register\entityidentifier;

use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\mcpe\cache\StaticPacketCache;
use pocketmine\network\mcpe\protocol\types\CacheableNbt;

final class EntityIdentifierRegister{
    private function __construct(){ }

    public static function register(string $entityIdentifier) : void{
        $availableActorIdentifiersPacket = StaticPacketCache::getInstance()->getAvailableActorIdentifiers();
        /** @var CompoundTag $identifiersNbt */
        $identifiersNbt = $availableActorIdentifiersPacket->identifiers->getRoot();
        $identifiersNbt->getListTag("idlist")->push(CompoundTag::create()->setString("id", $entityIdentifier));
        $availableActorIdentifiersPacket->identifiers = new CacheableNbt($identifiersNbt);
    }
}