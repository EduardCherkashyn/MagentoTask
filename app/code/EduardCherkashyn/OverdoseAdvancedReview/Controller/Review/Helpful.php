<?php
/**
 * Created by PhpStorm.
 * User: eduardcherkashyn
 * Date: 2020-07-31
 * Time: 18:10
 */

namespace EduardCherkashyn\OverdoseAdvancedReview\Controller\Review;

class Helpful extends \Magento\Framework\App\Action\Action
{
    /**
     * Helpful constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Framework\Session\SessionManagerInterface $sessionManager
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context
        ,\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Session\SessionManagerInterface $sessionManager
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->sessionManager = $sessionManager;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute() {
        /** @var \Magento\Framework\Controller\Result\Json $result */
        $result = $this->resultJsonFactory->create();
        $post = $this->getRequest()->getPost();

        $this->sessionManager->start();
        if(!$pressedHelpful = $this->sessionManager->getHelpful()) {
            $this->sessionManager->setHelpful(array($post['id']));
        } elseif (in_array($post['id'], $pressedHelpful)) {
            return $result->setData(null);
        } else {
            $pressedHelpful[] = $post['id'];
            $this->sessionManager->setHelpful($pressedHelpful);
        }
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $review = $objectManager->create(\Magento\Review\Model\Review::class)->load($post['id']);
        $helpful = $review->getHelpful() + 1;
        $review->setHelpful($helpful);
        $review->save();

        return $result->setData($helpful);
    }

}
