# Magento 2 Sub Category List

Displays a category's direct descendant sub-categories. The frontend template displays a simple list with each sub-category name, URL and category image. 

The getCategoryData method in the block class retrieves most of the category attributes available, etc. To see all attributes you can quickly pull from each sub-category, add this within the foreach loop on the template:
    
    $categoryData = $this->getCategoryData($subcat->getId());
    print_r($categoryData->getData());
    
The easiest way to display sub-categories on the frontend on a category-by-category basis is to create a static block with the following in the content area:

    {{block class="Dcwilkinson\Subcategories\Block\Subcategories" template="Dcwilkinson_Subcategories::subcategories.phtml"}}
    
Then navigate to Catalog > Categories > Category XYZ > Content > Add CMS Block. Choose the static block you just created from the dropdown and then go to Display Settings > Display Mode and set it to "Static block only" or "Static block and products" as required.

Alternatively, you can also add the following XML in Design > Layout Update XML on the category settings:

    <referenceContainer name="content">
    	<block class="Dcwilkinson\Subcategories\Block\Subcategories" name="subcats" template="Dcwilkinson_Subcategories::subcategories.phtml" before="-"/>
    </referenceContainer>
