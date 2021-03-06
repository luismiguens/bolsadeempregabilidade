<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Speaker
 */
class Speaker {

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
    private $profession;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var string
     */
    private $linkedin;
//
//    /**
//     * @var string
//     */
//    private $twitter;
//
//    /**
//     * @var string
//     */
//    private $google;

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
     * @return Speaker
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
     * @return Speaker
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
     * Set profession
     *
     * @param string $profession
     *
     * @return Speaker
     */
    public function setProfession($profession) {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession() {
        return $this->profession;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Speaker
     */
    public function setPresentation($presentation) {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation() {
        return $this->presentation;
    }

//
//    /**
//     * Set facebook
//     *
//     * @param string $facebook
//     *
//     * @return Speaker
//     */
//    public function setFacebook($facebook)
//    {
//        $this->facebook = $facebook;
//
//        return $this;
//    }
//
//    /**
//     * Get facebook
//     *
//     * @return string
//     */
//    public function getFacebook()
//    {
//        return $this->facebook;
//    }
//
//    /**
//     * Set twitter
//     *
//     * @param string $twitter
//     *
//     * @return Speaker
//     */
//    public function setTwitter($twitter)
//    {
//        $this->twitter = $twitter;
//
//        return $this;
//    }
//
//    /**
//     * Get twitter
//     *
//     * @return string
//     */
//    public function getTwitter()
//    {
//        return $this->twitter;
//    }
//
//    /**
//     * Set google
//     *
//     * @param string $google
//     *
//     * @return Speaker
//     */
//    public function setGoogle($google)
//    {
//        $this->google = $google;
//
//        return $this;
//    }
//
//    /**
//     * Get google
//     *
//     * @return string
//     */
//    public function getGoogle()
//    {
//        return $this->google;
//    }

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
        return 'uploads/speaker';
    }

    function getLinkedin() {
        return $this->linkedin;
    }

    function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var string
     */
    private $google;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $years;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->years = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Speaker
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set google
     *
     * @param string $google
     *
     * @return Speaker
     */
    public function setGoogle($google)
    {
        $this->google = $google;

        return $this;
    }

    /**
     * Get google
     *
     * @return string
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * Add year
     *
     * @param \AppBundle\Entity\Year $year
     *
     * @return Speaker
     */
    public function addYear(\AppBundle\Entity\Year $year)
    {
        $this->years[] = $year;

        return $this;
    }

    /**
     * Remove year
     *
     * @param \AppBundle\Entity\Year $year
     */
    public function removeYear(\AppBundle\Entity\Year $year)
    {
        $this->years->removeElement($year);
    }

    /**
     * Get year
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getYears()
    {
        return $this->years;
    }
}
