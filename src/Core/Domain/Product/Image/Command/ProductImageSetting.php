<?php

declare(strict_types=1);

namespace PrestaShop\PrestaShop\Core\Domain\Product\Image\Command;

use PrestaShop\PrestaShop\Core\Domain\Product\Image\ValueObject\ImageId;
use PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopId;

class ProductImageSetting
{
    /**
     * @var ImageId
     */
    private $productImageId;
    /**
     * @var array<ShopId>
     */
    private $shopIds;

    public function __construct(int $productImageId, array $shopIds)
    {
        $this->productImageId = new ImageId($productImageId);
        $this->shopIds = array_map(
            static function (int $shopId): ShopId {
                return new ShopId($shopId);
            },
            $shopIds
        );
    }

    /**
     * @return ImageId
     */
    public function getProductImageId(): ImageId
    {
        return $this->productImageId;
    }

    /**
     * @return array<ShopId>
     */
    public function getShopIds(): array
    {
        return $this->shopIds;
    }
}
