<?php

// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class User extends BaseUser {

    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $business;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;
    private $name;
    private $phone;
    private $linkedin;
    private $cv;
    private $cvFile;
    private $createdAt;
    private $updatedAt;

    
    function getCreatedAt() {
        return $this->createdAt;
    }

    function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

        
    
    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    
  
    
    
    
    public function __construct() {
        parent::__construct();
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime(); 
        // your own logic
    }

    function getId() {
        return $this->id;
    }

    function getBusiness() {
        return $this->business;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBusiness(\Doctrine\Common\Collections\Collection $business) {
        $this->business = $business;
    }

    function getJobs() {
        return $this->jobs;
    }

    /**
     * Add job
     *
     * @param \AppBundle\Entity\Job $job
     *
     * @return User
     */
    public function addJob(\AppBundle\Entity\Job $job) {
        $this->jobs[] = $job;

        return $this;
    }

    function setJobs(\Doctrine\Common\Collections\Collection $jobs) {
        $this->jobs = $jobs;
    }

    function getName() {
        return $this->name;
    }

    function getPhone() {
        return $this->phone;
    }

    function getLinkedin() {
        return $this->linkedin;
    }

    function getCv() {
        return $this->cv;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    function setCv($cv) {


        //$this->cartaoCidadao01 = $cartaoCidadao01;
        $this->cv = $cv;

        if ($this->cv instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    function setCvFile(File $cv = null) {
        $this->cvFile = $cv;


        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($cv) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    function getCvFile() {
        return $this->cvFile;
    }

    public function getAbsolutePath() {
        return null === $this->cv ? null : $this->getUploadRootDir() . '/' . $this->cv;
    }

    public function getWebPath() {
        return null === $this->cv ? null : $this->getUploadDir() . '/' . $this->cv;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/curriculo';
    }

}
