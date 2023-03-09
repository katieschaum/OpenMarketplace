<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Converter;

use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;

interface AttributesConverterInterface
{
    public function convert(ProductDraftInterface $productDraft, ProductInterface $product): void;
}
