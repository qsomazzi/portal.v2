<?php

namespace Portal\Bundle\MoneyBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Portal\Bundle\AppBundle\Entity\Classification\Category;
use Sonata\ClassificationBundle\Entity\CategoryManager as BaseCategoryManager;

/**
 * Class CategoryManager
 *
 * @package Portal\Bundle\MoneyBundle\Entity
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class CategoryManager extends BaseCategoryManager
{
    /**
     * Get All Categories concerning Money App
     */
    public function getMoneyCategories()
    {
        $rootCategoryChildren = $this->getRootCategory('default')->getChildren();
        $rootMoneyCategory    = $rootCategoryChildren[0];

        return $this->getChildrenCategories($rootMoneyCategory->getChildren());
    }

    /**
     * Recursive categories getter
     *
     * @param Collection $categories
     * @param int        $level
     *
     * @return array
     */
    private function getChildrenCategories(Collection $categories)
    {
        $results = [];

        /** @var Category $category */
        foreach ($categories as $category) {
            $one = new \stdClass();

            $one->id       = $category->getId();
            $one->position = $category->getPosition();
            $one->name     = $category->getName();
            $one->slug     = $category->getSlug();
            $one->parent   = $category->getParent()->getId();

            $results[] = $one;

            if ($category->hasChildren()) {
                $one->children = $this->getChildrenCategories($category->getChildren());
            }
        }

        return $results;
    }
}
