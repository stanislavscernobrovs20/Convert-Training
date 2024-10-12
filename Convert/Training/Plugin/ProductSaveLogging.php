<?php
/**
 * @author Convert Team
 * @copyright Copyright (c) Convert (https://www.convert.no/)
 */
declare(strict_types=1);

namespace Convert\Training\Plugin;

use Magento\Catalog\Model\ResourceModel\Product;
use Magento\Catalog\Model\Product as ProductModel;
use Psr\Log\LoggerInterface;

/**
 * Plugin to add logs around original product save method
 */
class ProductSaveLogging
{
    protected LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * Logging before original product save method
     *
     * @param Product $subject
     * @param ProductModel $product
     * @return array
     * @see Product::save
     */
    public function beforeSave(Product $subject, ProductModel $product): array
    {
        if (!$productId = $product->getEntityId()) {
            return [$product];
        }

        $this->logger->notice(
            sprintf(
                'Training plugin - Before save product %s',
                $productId
            )
        );

        return [$product];
    }

    /**
     * Logging after original product save method
     *
     * @param Product $subject
     * @param Product $result
     * @param ProductModel $product
     * @return Product
     * @see Product::save
     */
    public function afterSave(Product $subject, Product $result, ProductModel $product): Product
    {
        if (!$productId = $product->getEntityId()) {
            return $result;
        }

        $this->logger->notice(
            sprintf(
                'Training plugin - After save product %s',
                $productId
            )
        );

        return $result;
    }

    /**
     * Logging around original product save method
     *
     * @param Product $subject
     * @param callable $proceed
     * @param ProductModel $product
     * @return Product
     * @see Product::save
     */
    public function aroundSave(Product $subject, callable $proceed, ProductModel $product): Product
    {
        if (!$productId = $product->getEntityId()) {
            return $proceed($product);
        }

        $this->logger->notice(
            sprintf(
                'Training plugin - Around save product %s',
                $productId
            )
        );

        return $proceed($product);
    }
}
