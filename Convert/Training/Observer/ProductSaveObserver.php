<?php
/**
 * @author Convert Team
 * @copyright Copyright (c) Convert (https://www.convert.no/)
 */
declare(strict_types=1);

namespace Convert\Training\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

/**
 * Even to add logs when product is saved
 */
class ProductSaveObserver implements ObserverInterface
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
     * Log every saved product
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer): ProductSaveObserver
    {
        $product = $observer->getProduct();
        if (!$productId = $product->getId()) {
            return $this;
        }

        $this->logger->notice(
            sprintf(
                'Training event - Product %s has been saved',
                $productId
            )
        );

        return $this;
    }
}
