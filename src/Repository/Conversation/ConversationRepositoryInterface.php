<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface ConversationRepositoryInterface extends RepositoryInterface
{
    public function findAllWithStatusAndUser(string $status, ?UserInterface $user): ?array;
}
