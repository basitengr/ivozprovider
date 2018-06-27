<?php

namespace Ivoz\Cgr\Domain\Service\TpTiming;

use Ivoz\Cgr\Domain\Model\TpTiming\TpTimingInterface;
use Ivoz\Core\Infrastructure\Domain\Service\Redis\Client as RedisClient;

class UpdatedTpTimingNotificator implements TpTimingLifecycleEventHandlerInterface
{
    private $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    public static function getSubscribedEvents()
    {
        return [
            self::EVENT_ON_COMMIT => 10
        ];
    }

    public function execute(TpTimingInterface $entity)
    {
        $this->client->scheduleFullReload();
    }
}