<?php

namespace Ivoz\Provider\Domain\Model\Queue;

/**
 * Queue
 */
class Queue extends QueueAbstract implements QueueInterface
{
    use QueueTrait;

    public function getChangeSet()
    {
        return parent::getChangeSet();
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

    public function getAstQueueName()
    {
        return sprintf("b%dc%dq%d_%s",
            $this->getCompany()->getBrand()->getId(),
            $this->getCompany()->getId(),
            $this->getId(),
            $this->getName()
        );

    }
    /**
     * Get the timeout numberValue in E.164 format when routing to 'number'
     *
     * @return string
     */
    public function getTimeoutNumberValueE164()
    {
        return
            $this->getTimeoutNumberCountry()->getCountryCode() .
            $this->getTimeoutNumberValue();
    }

    /**
     * Get the full numberValue in E.164 format when routing to 'number'
     *
     * @return string
     */
    public function getFullNumberValueE164()
    {
        return
            $this->getFullNumberCountry()->getCountryCode() .
            $this->getFullNumberValue();
    }
}
