<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use DateTimeInterface;

interface VendorInterface extends VendorProfileInterface
{
    public const STATUS_UNVERIFIED = 'unverified';

    public const STATUS_VERIFIED = 'verified';

    public function getId(): ?int;

    public function setId(?int $id): void;

    public function getCompanyName(): ?string;

    public function setCompanyName(?string $companyName): void;

    public function getTaxIdentifier(): ?string;

    public function setTaxIdentifier(?string $taxIdentifier): void;

    public function getPhoneNumber(): ?string;

    public function setPhoneNumber(?string $phoneNumber): void;

    public function getVendorAddress(): ?VendorAddressInterface;

    public function setVendorAddress(?VendorAddressInterface $vendorAddress): void;

    public function getShopUser(): ShopUserInterface;

    public function setShopUser(ShopUserInterface $user): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;

    public function getEditedAt(): ?DateTimeInterface;

    public function setEditedAt(?DateTimeInterface $editedAt): void;
}