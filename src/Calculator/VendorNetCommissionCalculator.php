<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Calculator;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

class VendorNetCommissionCalculator implements VendorCommissionCalculatorInterface
{
    public function calculate(OrderInterface $order): int
    {
        if ($order->isPrimary()) {
            throw new \Exception('Primary order cannot be used for net commission');
        }

        /** @var VendorInterface $vendor */
        $vendor = $order->getVendor();

        /** @var int $commission */
        $commission = $vendor->getCommission();

        $floatTotal = $order->getItemsTotal() / 100;

        $floatCommission = round(($floatTotal * ($commission / 100)), 2);
        $intCommission = $floatCommission * 100;

        return (int) $intCommission;
    }

    public function supports(OrderInterface $order): bool
    {
        /** @var VendorInterface $vendor */
        $vendor = $order->getVendor();

        return VendorInterface::NET_COMMISSION === $vendor->getCommissionType();
    }

    public static function getDefaultPriority(): int
    {
        return 1;
    }
}
