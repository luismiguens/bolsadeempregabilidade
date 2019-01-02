<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Photo
 */
class Photo {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var integer
     */
    private $id;
    private $imageFile;
    private $updatedAt;

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Photo
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
     * Set image
     *
     * @param string $image
     *
     * @return Photo
     */
    public function setImage($image) {
        $this->image = $image;
        // Only change the updated af if the file is really uploaded to avoid database updates.
        // This is needed when the file should be set when loading the entity.
        if ($this->image instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return Photo
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    public function setImageFile(File $image = null) {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile() {
        return $this->imageFile;
    }

    public function getAbsolutePath() {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }

    public function getWebPath() {
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/photo';
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $years;

    /**
     * Constructor
     */
    public function __construct() {
        $this->years = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add year
     *
     * @param \AppBundle\Entity\Year $year
     *
     * @return Photo
     */
    public function addYear(\AppBundle\Entity\Year $year) {
        $this->years[] = $year;

        return $this;
    }

    /**
     * Remove year
     *
     * @param \AppBundle\Entity\Year $year
     */
    public function removeYear(\AppBundle\Entity\Year $year) {
        $this->years->removeElement($year);
    }

    /**
     * Get year
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getYears() {
        return $this->years;
    }

}
