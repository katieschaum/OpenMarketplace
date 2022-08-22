<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository as BaseOrderRepository;

class OrderRepository extends BaseOrderRepository
{
    public function findAllByVendor(VendorInterface $vendor): QueryBuilder
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ;
    }

    public function findOrderForVendor(VendorInterface $vendor, int $id): ?OrderInterface
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->andWhere('o.id = :id')
            ->setParameter('vendor', $vendorId)
            ->setParameter('id', $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOrdersForVendorByCustomer(VendorInterface $vendor, int $id): QueryBuilder
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->leftJoin('o.customer', 'c')
            ->andWhere('o.vendor = :vendor')
            ->andWhere('c.id = :id')
            ->setParameter('vendor', $vendorId)
            ->setParameter('id', $id);
    }
}
