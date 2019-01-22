<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Business
 */
class Business {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $website;

    /**
     * @var integer
     */
    private $id;
    //nome da imagem
    private $image;
    private $imageFile;
    
        /**
     * @var string
     */
    private $taxName;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $nif;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var string
     */
    private $representatives;

    /**
     * @var string
     */
    private $outdoor;
    private $outdoorFile;


    private $users;
    
    private $updatedAt;
    
        /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $years;

    
    
        /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;
    
    
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->years = new \Doctrine\Common\Collections\ArrayCollection();
    }

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
        // Only change the updated af if the file is really uploaded to avoid database updates.
        // This is needed when the file should be set when loading the entity.
        if ($this->image instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }


        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Business
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
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Business
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Business
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Business
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Business
     */
    public function setWebsite($website) {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite() {
        return $this->website;
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

    
    
     public function setOutdoorFile(File $outdoor = null) {
        $this->outdoorFile = $outdoor;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($outdoor) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getOutdoorFile() {
        return $this->outdoorFile;
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
        return 'uploads/business';
    }



    /**
     * Add year
     *
     * @param \AppBundle\Entity\Year $year
     *
     * @return Business
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


    
        /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Business
     */
    public function addUser(\AppBundle\Entity\User $user) {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\user $user
     */
    public function removeUser(\AppBundle\Entity\User $user) {
        $this->users->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers() {
        return $this->users;
    }


    
    

    /**
     * Set taxName
     *
     * @param string $taxName
     *
     * @return Business
     */
    public function setTaxName($taxName) {
        $this->taxName = $taxName;

        return $this;
    }

    /**
     * Get taxName
     *
     * @return string
     */
    public function getTaxName() {
        return $this->taxName;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Business
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set nif
     *
     * @param string $nif
     *
     * @return Business
     */
    public function setNif($nif) {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif() {
        return $this->nif;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Business
     */
    public function setContact($contact) {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Set representatives
     *
     * @param string $representatives
     *
     * @return Business
     */
    public function setRepresentatives($representatives) {
        $this->representatives = $representatives;

        return $this;
    }

    /**
     * Get representatives
     *
     * @return string
     */
    public function getRepresentatives() {
        return $this->representatives;
    }

    /**
     * Set outdoor
     *
     * @param string $outdoor
     *
     * @return Business
     */
    public function setOutdoor($outdoor) {
        $this->outdoor = $outdoor;

        return $this;
    }

    /**
     * Get outdoor
     *
     * @return string
     */
    public function getOutdoor() {
        return $this->outdoor;
    }


    public function __toString() {
        return $this->getName();
    }
    
            /**
     * Add job
     *
     * @param \AppBundle\Entity\Job $job
     *
     * @return Business
     */
    public function addJob(\AppBundle\Entity\Job $job) {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \AppBundle\Entity\job $job
     */
    public function removeJob(\AppBundle\Entity\Job $job) {
        $this->jobs->removeElement($job);
    }

    /**
     * Get job
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs() {
        return $this->jobs;
    }


    function setUsers($users) {
        $this->users = $users;
    }

    function setYears(\Doctrine\Common\Collections\Collection $years) {
        $this->years = $years;
    }

    function setJobs(\Doctrine\Common\Collections\Collection $jobs) {
        $this->jobs = $jobs;
    }



}
