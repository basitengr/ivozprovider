<?php

namespace Ivoz\Cgr\Domain\Model\TpRatingProfile;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface TpRatingProfileInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * Set tpid
     *
     * @param string $tpid
     *
     * @return self
     */
    public function setTpid($tpid);

    /**
     * Get tpid
     *
     * @return string
     */
    public function getTpid();

    /**
     * Set loadid
     *
     * @param string $loadid
     *
     * @return self
     */
    public function setLoadid($loadid);

    /**
     * Get loadid
     *
     * @return string
     */
    public function getLoadid();

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return self
     */
    public function setDirection($direction);

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection();

    /**
     * Set tenant
     *
     * @param string $tenant
     *
     * @return self
     */
    public function setTenant($tenant = null);

    /**
     * Get tenant
     *
     * @return string
     */
    public function getTenant();

    /**
     * Set category
     *
     * @param string $category
     *
     * @return self
     */
    public function setCategory($category);

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory();

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return self
     */
    public function setSubject($subject = null);

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject();

    /**
     * Set activationTime
     *
     * @param \DateTime $activationTime
     *
     * @return self
     */
    public function setActivationTime($activationTime);

    /**
     * Get activationTime
     *
     * @return \DateTime
     */
    public function getActivationTime();

    /**
     * Set ratingPlanTag
     *
     * @param string $ratingPlanTag
     *
     * @return self
     */
    public function setRatingPlanTag($ratingPlanTag = null);

    /**
     * Get ratingPlanTag
     *
     * @return string
     */
    public function getRatingPlanTag();

    /**
     * Set fallbackSubjects
     *
     * @param string $fallbackSubjects
     *
     * @return self
     */
    public function setFallbackSubjects($fallbackSubjects = null);

    /**
     * Get fallbackSubjects
     *
     * @return string
     */
    public function getFallbackSubjects();

    /**
     * Set cdrStatQueueIds
     *
     * @param string $cdrStatQueueIds
     *
     * @return self
     */
    public function setCdrStatQueueIds($cdrStatQueueIds = null);

    /**
     * Get cdrStatQueueIds
     *
     * @return string
     */
    public function getCdrStatQueueIds();

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt($createdAt);

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Set ratingProfile
     *
     * @param \Ivoz\Provider\Domain\Model\RatingProfile\RatingProfileInterface $ratingProfile
     *
     * @return self
     */
    public function setRatingProfile(\Ivoz\Provider\Domain\Model\RatingProfile\RatingProfileInterface $ratingProfile);

    /**
     * Get ratingProfile
     *
     * @return \Ivoz\Provider\Domain\Model\RatingProfile\RatingProfileInterface
     */
    public function getRatingProfile();

}

