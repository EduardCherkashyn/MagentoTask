<?php
/**
 * Created by PhpStorm.
 * User: eduardcherkashyn
 * Date: 2020-08-01
 * Time: 23:51
 */

namespace EduardCherkashyn\OverdoseAdvancedReview\Model\ResourceModel\Review\Product;


class Collection extends \Magento\Review\Model\ResourceModel\Review\Product\Collection
{
    /**
     * Join fields to entity
     *
     * @return $this
     */
    protected function _joinFields()
    {
        $reviewTable = $this->_resource->getTableName('review');
        $reviewDetailTable = $this->_resource->getTableName('review_detail');

        $this->addAttributeToSelect('name')->addAttributeToSelect('sku');

        $this->getSelect()->join(
            ['rt' => $reviewTable],
            'rt.entity_pk_value = e.entity_id',
            ['rt.review_id', 'review_created_at' => 'rt.created_at', 'rt.entity_pk_value', 'rt.status_id']
        )->join(
            ['rdt' => $reviewDetailTable],
            'rdt.review_id = rt.review_id',
            ['rdt.title', 'rdt.nickname', 'rdt.detail', 'rdt.customer_id', 'rdt.store_id','rdt.pros','rdt.cons','rdt.helpful']
        );
        return $this;
    }
}
