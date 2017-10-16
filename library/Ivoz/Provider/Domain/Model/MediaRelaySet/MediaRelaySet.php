<?php
namespace Ivoz\Provider\Domain\Model\MediaRelaySet;

/**
 * MediaRelaySet
 */
class MediaRelaySet extends MediaRelaySetAbstract implements MediaRelaySetInterface
{
    use MediaRelaySetTrait;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
