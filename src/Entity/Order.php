<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements OrderInterface
{
    /** @var Collection<int, OrderItemInterface> */
    protected $items;

    private ?VendorInterface $vendor;

    private ?OrderInterface $primaryOrder;

    /** @var Collection<int, OrderInterface> */
    private Collection $secondaryOrders;

    public function __construct()
    {
        parent::__construct();
        $this->secondaryOrders = new ArrayCollection();
    }

    public function getVendor(): ?VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(?VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getPrimaryOrder(): ?OrderInterface
    {
        return $this->primaryOrder;
    }

    public function setPrimaryOrder(?OrderInterface $primaryOrder): void
    {
        $this->primaryOrder = $primaryOrder;
    }

    public function addSecondaryOrder(OrderInterface $secondaryOrder): void
    {
        $this->secondaryOrders->add($secondaryOrder);
    }

    /** @return Collection<int, OrderInterface> */
    public function getSecondaryOrders(): Collection
    {
        return $this->secondaryOrders;
    }
}