<?php

namespace Ivoz\Provider\Domain\Model\CallCsvScheduler;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;
use Ivoz\Core\Domain\Model\EntityInterface;

/**
 * CallCsvSchedulerAbstract
 * @codeCoverageIgnore
 */
abstract class CallCsvSchedulerAbstract
{
    /**
     * @var string
     */
    protected $iden;

    /**
     * comment: enum:week|month|year
     * @var string
     */
    protected $unit = 'month';

    /**
     * @var integer
     */
    protected $frequency;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var \DateTime
     */
    protected $lastExecution;

    /**
     * @var \DateTime
     */
    protected $nextExecution;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    protected $company;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($iden, $unit, $frequency, $email)
    {
        $this->setIden($iden);
        $this->setUnit($unit);
        $this->setFrequency($frequency);
        $this->setEmail($email);
    }

    abstract public function getId();

    public function __toString()
    {
        return sprintf("%s#%s",
            "CallCsvScheduler",
            $this->getId()
        );
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @param null $id
     * @return CallCsvSchedulerDto
     */
    public static function createDto($id = null)
    {
        return new CallCsvSchedulerDto($id);
    }

    /**
     * @param EntityInterface|null $entity
     * @param int $depth
     * @return CallCsvSchedulerDto|null
     */
    public static function entityToDto(EntityInterface $entity = null, $depth = 0)
    {
        if (!$entity) {
            return null;
        }

        Assertion::isInstanceOf($entity, CallCsvSchedulerInterface::class);

        if ($depth < 1) {
            return static::createDto($entity->getId());
        }

        if ($entity instanceof \Doctrine\ORM\Proxy\Proxy && !$entity->__isInitialized()) {
            return static::createDto($entity->getId());
        }

        return $entity->toDto($depth-1);
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallCsvSchedulerDto
         */
        Assertion::isInstanceOf($dto, CallCsvSchedulerDto::class);

        $self = new static(
            $dto->getIden(),
            $dto->getUnit(),
            $dto->getFrequency(),
            $dto->getEmail());

        $self
            ->setLastExecution($dto->getLastExecution())
            ->setNextExecution($dto->getNextExecution())
            ->setCompany($dto->getCompany())
        ;

        $self->sanitizeValues();
        $self->initChangelog();

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallCsvSchedulerDto
         */
        Assertion::isInstanceOf($dto, CallCsvSchedulerDto::class);

        $this
            ->setIden($dto->getIden())
            ->setUnit($dto->getUnit())
            ->setFrequency($dto->getFrequency())
            ->setEmail($dto->getEmail())
            ->setLastExecution($dto->getLastExecution())
            ->setNextExecution($dto->getNextExecution())
            ->setCompany($dto->getCompany());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @param int $depth
     * @return CallCsvSchedulerDto
     */
    public function toDto($depth = 0)
    {
        return self::createDto()
            ->setIden(self::getIden())
            ->setUnit(self::getUnit())
            ->setFrequency(self::getFrequency())
            ->setEmail(self::getEmail())
            ->setLastExecution(self::getLastExecution())
            ->setNextExecution(self::getNextExecution())
            ->setCompany(\Ivoz\Provider\Domain\Model\Company\Company::entityToDto(self::getCompany(), $depth));
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'iden' => self::getIden(),
            'unit' => self::getUnit(),
            'frequency' => self::getFrequency(),
            'email' => self::getEmail(),
            'lastExecution' => self::getLastExecution(),
            'nextExecution' => self::getNextExecution(),
            'companyId' => self::getCompany() ? self::getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    public function setIden($iden)
    {
        Assertion::notNull($iden, 'iden value "%s" is null, but non null value was expected.');
        Assertion::maxLength($iden, 40, 'iden value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->iden = $iden;

        return $this;
    }

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden()
    {
        return $this->iden;
    }

    /**
     * Set unit
     *
     * @param string $unit
     *
     * @return self
     */
    public function setUnit($unit)
    {
        Assertion::notNull($unit, 'unit value "%s" is null, but non null value was expected.');
        Assertion::maxLength($unit, 30, 'unit value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($unit, array (
          0 => 'week',
          1 => 'month',
          2 => 'year',
        ), 'unitvalue "%s" is not an element of the valid values: %s');

        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set frequency
     *
     * @param integer $frequency
     *
     * @return self
     */
    public function setFrequency($frequency)
    {
        Assertion::notNull($frequency, 'frequency value "%s" is null, but non null value was expected.');
        Assertion::integerish($frequency, 'frequency value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($frequency, 0, 'frequency provided "%s" is not greater or equal than "%s".');

        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return integer
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        Assertion::notNull($email, 'email value "%s" is null, but non null value was expected.');
        Assertion::maxLength($email, 140, 'email value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set lastExecution
     *
     * @param \DateTime $lastExecution
     *
     * @return self
     */
    public function setLastExecution($lastExecution = null)
    {
        if (!is_null($lastExecution)) {
        $lastExecution = \Ivoz\Core\Domain\Model\Helper\DateTimeHelper::createOrFix(
            $lastExecution,
            null
        );
        }

        $this->lastExecution = $lastExecution;

        return $this;
    }

    /**
     * Get lastExecution
     *
     * @return \DateTime
     */
    public function getLastExecution()
    {
        return $this->lastExecution;
    }

    /**
     * Set nextExecution
     *
     * @param \DateTime $nextExecution
     *
     * @return self
     */
    public function setNextExecution($nextExecution = null)
    {
        if (!is_null($nextExecution)) {
        $nextExecution = \Ivoz\Core\Domain\Model\Helper\DateTimeHelper::createOrFix(
            $nextExecution,
            null
        );
        }

        $this->nextExecution = $nextExecution;

        return $this;
    }

    /**
     * Get nextExecution
     *
     * @return \DateTime
     */
    public function getNextExecution()
    {
        return $this->nextExecution;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

