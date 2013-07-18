<?php

namespace Ens\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ens\JobeetBundle\Utils\Jobeet as Jobeet;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ens\JobeetBundle\Entity\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()

 */
class Category {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255,unique=true)
     *
     */
    private $name;

    /**
     * 
     * @ORM\oneToMany(targetEntity="Job", mappedBy="category")
     * 
     */
    private $jobs;

    private $more_jobs;

    /**
     * 
     * @ORM\oneToMany(targetEntity="CategoryAffiliate", mappedBy="category")
     * 
     */
    private $category_affiliates;
    private $active_jobs;

    /**
     * @var string  
     * @ORM\Column(name="slug", type="string", length=255,unique=true)

     */
    private $slug;

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug) {
        $this->slug = $slug;
    }

    /**
* Get slug
*
* @return string
*/

   public function getSlug()
  {
    return Jobeet::slugify($this->getName());
  }
    /**
     * @ORM\prePersist
     * @ORM\preUpdate
     * 
     */
    public function setSlugValue() {
    $this->slug = Jobeet::slugify($this->getName());
    }

    /**
     * @ORM\prePersist
     */
    public function setActiveJobs($jobs) {
        $this->active_jobs = $jobs;
    }

    public function getActiveJobs() {
        return $this->active_jobs;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category_affiliates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add jobs
     *
     * @param \Ens\JobeetBundle\Entity\Job $jobs
     * @return Category
     */
    public function addJob(\Ens\JobeetBundle\Entity\Job $jobs) {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \Ens\JobeetBundle\Entity\Job $jobs
     */
    public function removeJob(\Ens\JobeetBundle\Entity\Job $jobs) {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs() {
        return $this->jobs;
    }

    /**
     * Add category_affiliates
     *
     * @param \Ens\JobeetBundle\Entity\CategoryAffiliate $categoryAffiliates
     * @return Category
     */
    public function addCategoryAffiliate(\Ens\JobeetBundle\Entity\CategoryAffiliate $categoryAffiliates) {
        $this->category_affiliates[] = $categoryAffiliates;

        return $this;
    }

    /**
     * Remove category_affiliates
     *
     * @param \Ens\JobeetBundle\Entity\CategoryAffiliate $categoryAffiliates
     */
    public function removeCategoryAffiliate(\Ens\JobeetBundle\Entity\CategoryAffiliate $categoryAffiliates) {
        $this->category_affiliates->removeElement($categoryAffiliates);
    }

    /**
     * Get category_affiliates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoryAffiliates() {
        return $this->category_affiliates;
    }

    public function __toString() {
        return $this->getName();
    }

    // public function getSlug() {
    //    return Jobeet::slugify($this->getName());
    //}

// ...

    public function setMoreJobs($jobs) {
        $this->more_jobs = $jobs >= 0 ? $jobs : 0;
    }

    public function getMoreJobs() {
        return $this->more_jobs;
    }

}
