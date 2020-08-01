<?php
/**
 * Created by PhpStorm.
 * User: eduardcherkashyn
 * Date: 2020-08-01
 * Time: 23:40
 */

namespace EduardCherkashyn\OverdoseAdvancedReview\Block\Adminhtml;


class ReviewGrid extends \Magento\Review\Block\Adminhtml\Grid
{
    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        $this->addColumn(
            'pros',
            [
                'header' => __('Pros'),
                'type' => 'text',
                'index' => 'pros',
                'escape' => true
            ]
        );
        $this->addColumn(
            'cons',
            [
                'header' => __('Cons'),
                'type' => 'text',
                'index' => 'cons',
                'escape' => true
            ]
        );
        $this->addColumn(
            'helpful',
            [
                'header' => __('Helpful'),
                'type' => 'text',
                'index' => 'helpful',
                'escape' => true
            ]
        );
        return $this;
    }
}

