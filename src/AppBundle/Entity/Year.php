<?php

namespace AppBundle\Entity;

/**
 * Year
 */
class Year
{
    /**
     * @var integer
     */
    private $number;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $business;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $photos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $speakers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sponsors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->business = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->speakers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sponsors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Year
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add business
     *
     * @param \AppBundle\Entity\Business $business
     *
     * @return Year
     */
    public function addBusiness(\AppBundle\Entity\Business $business)
    {
        $this->business[] = $business;

        return $this;
    }

    /**
     * Remove business
     *
     * @param \AppBundle\Entity\Business $business
     */
    public function removeBusiness(\AppBundle\Entity\Business $business)
    {
        $this->business->removeElement($business);
    }

    /**
     * Get business
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Add photo
     *
     * @param \AppBundle\Entity\Photo $photo
     *
     * @return Year
     */
    public function addPhoto(\AppBundle\Entity\Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \AppBundle\Entity\Photo $photo
     */
    public function removePhoto(\AppBundle\Entity\Photo $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add speaker
     *
     * @param \AppBundle\Entity\Speaker $speaker
     *
     * @return Year
     */
    public function addSpeaker(\AppBundle\Entity\Speaker $speaker)
    {
        $this->speakers[] = $speaker;

        return $this;
    }

    /**
     * Remove speaker
     *
     * @param \AppBundle\Entity\Speaker $speaker
     */
    public function removeSpeaker(\AppBundle\Entity\Speaker $speaker)
    {
        $this->speakers->removeElement($speaker);
    }

    /**
     * Get speakers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpeakers()
    {
        return $this->speakers;
    }

    /**
     * Add sponsor
     *
     * @param \AppBundle\Entity\Sponsor $sponsor
     *
     * @return Year
     */
    public function addSponsor(\AppBundle\Entity\Sponsor $sponsor)
    {
        $this->sponsors[] = $sponsor;

        return $this;
    }

    /**
     * Remove sponsor
     *
     * @param \AppBundle\Entity\Sponsor $sponsor
     */
    public function removeSponsor(\AppBundle\Entity\Sponsor $sponsor)
    {
        $this->sponsors->removeElement($sponsor);
    }

    /**
     * Get sponsors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }
    
    public function __toString() {
        return (string)$this->getNumber();
    }
    
    
}

