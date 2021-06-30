<?php
namespace Gonzalezuy\Article2\Controller\Adminhtml\Color;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Get extends Action
{
    /**
     * @var ResultFactory
     */
    protected $_resultFactory;
    /**
     * @var \Gonzalezuy\Article2\Helper\Data
     */
    protected $_helper;
    /**
     * Get constructor.
     * @param Action\Context $context
     * @param ResultFactory $resultFactory
     * @param \Gonzalezuy\Article2\Helper\Data $helper
     */
    public function __construct(
        Action\Context $context,
        ResultFactory $resultFactory,
        \Gonzalezuy\Article2\Helper\Data $helper
    )
    {
        parent::__construct($context);
        $this->_helper  = $helper;
        $this->_resultFactory = $resultFactory;
    }
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $shape = $params['shape'];
        $colors = $this->_helper->getColors($shape);
        $resultJson = $this->_resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($colors);
        return $resultJson;

    }
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }

}