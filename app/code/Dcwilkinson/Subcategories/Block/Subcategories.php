<?php

namespace Dcwilkinson\Subcategories\Block;

class Subcategories extends \Magento\Framework\View\Element\Template
{
    private $layerResolver;
    public $categoryRepository;
    public $categoryFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        
        $this->layerResolver = $layerResolver;
        $this->categoryRepository = $categoryRepository;
        $this->categoryFactory = $categoryFactory; 
    }

    public function getCurrentCategory() {
        return $this->layerResolver->get()->getCurrentCategory();
    }

    public function getCurrentCategoryId() {
        return $this->getCurrentCategory()->getId();
    }

    public function getCategoryData($id) {
        return $category = $this->categoryFactory->create()->load($id);       
    }
    
    public function getImageUrl($id) {
        $category = $this->categoryFactory->create()->load($id);
        return $category->getImageUrl();
    }

}


