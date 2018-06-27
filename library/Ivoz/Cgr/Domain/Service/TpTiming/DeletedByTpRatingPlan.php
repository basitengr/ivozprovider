<?php

namespace Ivoz\Cgr\Domain\Service\TpTiming;

use Ivoz\Cgr\Domain\Model\TpRatingPlan\TpRatingPlanInterface;
use Ivoz\Cgr\Domain\Service\TpRatingPlan\TpRatingPlanLifecycleEventHandlerInterface;
use Ivoz\Core\Domain\Service\EntityPersisterInterface;

class DeletedByTpRatingPlan implements TpRatingPlanLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * CreatedByTpDestinationRate constructor.
     * @param EntityPersisterInterface $entityPersister
     */
    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public static function getSubscribedEvents()
    {
        return [
            self::EVENT_POST_REMOVE => self::PRIORITY_NORMAL
        ];
    }

    public function execute(TpRatingPlanInterface $entity)
    {
        $timing = $entity->getTiming();

        if ($timing) {
            // Delete custom timing if exists
            $this->entityPersister->remove($entity->getTiming());
        }
    }
}
