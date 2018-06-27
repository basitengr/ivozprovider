<?php

namespace Ivoz\Cgr\Domain\Service\TpTiming;

use Ivoz\Cgr\Domain\Model\TpRatingPlan\TpRatingPlan;
use Ivoz\Cgr\Domain\Model\TpRatingPlan\TpRatingPlanInterface;
use Ivoz\Cgr\Domain\Model\TpTiming\TpTiming;
use Ivoz\Cgr\Domain\Model\TpTiming\TpTimingDto;
use Ivoz\Cgr\Domain\Service\TpRatingPlan\TpRatingPlanLifecycleEventHandlerInterface;
use Ivoz\Core\Domain\Service\EntityPersisterInterface;

class CreatedByTpRatingPlan implements TpRatingPlanLifecycleEventHandlerInterface
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
            self::EVENT_POST_PERSIST => self::PRIORITY_NORMAL
        ];
    }

    public function execute(TpRatingPlanInterface $entity)
    {
        $timing = $entity->getTiming();

        // Always timings don't have timing entity related
        if ($entity->getTimingType() == TpRatingPlan::TIMING_TYPE_ALWAYS) {
            if ($timing) {
                // Delete custom timing if exists
                $this->entityPersister->remove($entity->getTiming());
            }
        } else {

            // Update related timing or create a new one
            if (is_null($timing)) {
                $timingDto = new TpTimingDto();
            } else {
                $timingDto = $timing->toDto();
            }

            $timingTag = sprintf("b%dtm%d",
                $entity->getRatingPlan()->getBrand()->getId(),
                $entity->getId()
            );

            // Update/Insert endpoint data
            $timingDto
                ->setTag($timingTag)
                ->setYears(TpTiming::TIMING_ANY)
                ->setMonths(TpTiming::TIMING_ANY)
                ->setMonthDays(TpTiming::TIMING_ANY)
                ->setWeekDays($entity->getWeekDays())
                ->setTime($entity->getTimeIn()->format("H:i:s"));

            $timing = $this->entityPersister
                ->persistDto(
                    $timingDto,
                    $timing,
                    true
                );

            $entity
                ->setTiming($timing)
                ->setTimingTag($timingTag);

        }
    }

}
