<?php

/**
 * Application Model
 *
 * @package IvozProvider\Model\Raw
 * @subpackage Model
 * @author Luis Felipe Garcia
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity][rest]
 *
 * @package IvozProvider\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 */

namespace IvozProvider\Model\Raw;
class CallForwardSettings extends ModelAbstract
{

    protected $_callTypeFilterAcceptedValues = array(
        'internal',
        'external',
        'both',
    );
    protected $_callForwardTypeAcceptedValues = array(
        'inconditional',
        'noAnswer',
        'busy',
        'userNotRegistered',
    );
    protected $_targetTypeAcceptedValues = array(
        'number',
        'extension',
        'voicemail',
    );

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_userId;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_retailAccountId;

    /**
     * [enum:internal|external|both]
     * Database var type varchar
     *
     * @var string
     */
    protected $_callTypeFilter;

    /**
     * [enum:inconditional|noAnswer|busy|userNotRegistered]
     * Database var type varchar
     *
     * @var string
     */
    protected $_callForwardType;

    /**
     * [enum:number|extension|voicemail]
     * Database var type varchar
     *
     * @var string
     */
    protected $_targetType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_numberValue;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_extensionId;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_voiceMailUserId;

    /**
     * Database var type smallint
     *
     * @var int
     */
    protected $_noAnswerTimeout;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_enabled;


    /**
     * Parent relation CallForwardSettings_ibfk_1
     *
     * @var \IvozProvider\Model\Raw\Users
     */
    protected $_User;

    /**
     * Parent relation CallForwardSettings_ibfk_2
     *
     * @var \IvozProvider\Model\Raw\Extensions
     */
    protected $_Extension;

    /**
     * Parent relation CallForwardSettings_ibfk_3
     *
     * @var \IvozProvider\Model\Raw\Users
     */
    protected $_VoiceMailUser;

    /**
     * Parent relation CallForwardSettings_ibfk_4
     *
     * @var \IvozProvider\Model\Raw\RetailAccounts
     */
    protected $_RetailAccount;


    protected $_columnsList = array(
        'id'=>'id',
        'userId'=>'userId',
        'retailAccountId'=>'retailAccountId',
        'callTypeFilter'=>'callTypeFilter',
        'callForwardType'=>'callForwardType',
        'targetType'=>'targetType',
        'numberValue'=>'numberValue',
        'extensionId'=>'extensionId',
        'voiceMailUserId'=>'voiceMailUserId',
        'noAnswerTimeout'=>'noAnswerTimeout',
        'enabled'=>'enabled',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'callTypeFilter'=> array('enum:internal|external|both'),
            'callForwardType'=> array('enum:inconditional|noAnswer|busy|userNotRegistered'),
            'targetType'=> array('enum:number|extension|voicemail'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'en'));

        $this->setParentList(array(
            'CallForwardSettingsIbfk1'=> array(
                    'property' => 'User',
                    'table_name' => 'Users',
                ),
            'CallForwardSettingsIbfk2'=> array(
                    'property' => 'Extension',
                    'table_name' => 'Extensions',
                ),
            'CallForwardSettingsIbfk3'=> array(
                    'property' => 'VoiceMailUser',
                    'table_name' => 'Users',
                ),
            'CallForwardSettingsIbfk4'=> array(
                    'property' => 'RetailAccount',
                    'table_name' => 'RetailAccounts',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'noAnswerTimeout' => '10',
            'enabled' => '1',
        );

        $this->_initFileObjects();
        parent::__construct();
    }

    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }
    /**************************************************************************
    ************************** File System Object (FSO)************************
    ***************************************************************************/

    protected function _initFileObjects()
    {

        return $this;
    }

    public function getFileObjects()
    {

        return array();
    }


    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id', $this->_id, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_id = $data;

        } else if (!is_null($data)) {
            $this->_id = (int) $data;

        } else {
            $this->_id = $data;
        }
        return $this;
    }

    /**
     * Gets column id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setUserId($data)
    {

        if ($this->_userId != $data) {
            $this->_logChange('userId', $this->_userId, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_userId = $data;

        } else if (!is_null($data)) {
            $this->_userId = (int) $data;

        } else {
            $this->_userId = $data;
        }
        return $this;
    }

    /**
     * Gets column userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setRetailAccountId($data)
    {

        if ($this->_retailAccountId != $data) {
            $this->_logChange('retailAccountId', $this->_retailAccountId, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_retailAccountId = $data;

        } else if (!is_null($data)) {
            $this->_retailAccountId = (int) $data;

        } else {
            $this->_retailAccountId = $data;
        }
        return $this;
    }

    /**
     * Gets column retailAccountId
     *
     * @return int
     */
    public function getRetailAccountId()
    {
        return $this->_retailAccountId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setCallTypeFilter($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_callTypeFilter != $data) {
            $this->_logChange('callTypeFilter', $this->_callTypeFilter, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_callTypeFilter = $data;

        } else if (!is_null($data)) {
            if (!in_array($data, $this->_callTypeFilterAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(sprintf(_('Invalid value for %s'), 'callTypeFilter'));
            }
            $this->_callTypeFilter = (string) $data;

        } else {
            $this->_callTypeFilter = $data;
        }
        return $this;
    }

    /**
     * Gets column callTypeFilter
     *
     * @return string
     */
    public function getCallTypeFilter()
    {
        return $this->_callTypeFilter;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setCallForwardType($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_callForwardType != $data) {
            $this->_logChange('callForwardType', $this->_callForwardType, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_callForwardType = $data;

        } else if (!is_null($data)) {
            if (!in_array($data, $this->_callForwardTypeAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(sprintf(_('Invalid value for %s'), 'callForwardType'));
            }
            $this->_callForwardType = (string) $data;

        } else {
            $this->_callForwardType = $data;
        }
        return $this;
    }

    /**
     * Gets column callForwardType
     *
     * @return string
     */
    public function getCallForwardType()
    {
        return $this->_callForwardType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setTargetType($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_targetType != $data) {
            $this->_logChange('targetType', $this->_targetType, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_targetType = $data;

        } else if (!is_null($data)) {
            if (!in_array($data, $this->_targetTypeAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(sprintf(_('Invalid value for %s'), 'targetType'));
            }
            $this->_targetType = (string) $data;

        } else {
            $this->_targetType = $data;
        }
        return $this;
    }

    /**
     * Gets column targetType
     *
     * @return string
     */
    public function getTargetType()
    {
        return $this->_targetType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setNumberValue($data)
    {

        if ($this->_numberValue != $data) {
            $this->_logChange('numberValue', $this->_numberValue, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_numberValue = $data;

        } else if (!is_null($data)) {
            $this->_numberValue = (string) $data;

        } else {
            $this->_numberValue = $data;
        }
        return $this;
    }

    /**
     * Gets column numberValue
     *
     * @return string
     */
    public function getNumberValue()
    {
        return $this->_numberValue;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setExtensionId($data)
    {

        if ($this->_extensionId != $data) {
            $this->_logChange('extensionId', $this->_extensionId, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_extensionId = $data;

        } else if (!is_null($data)) {
            $this->_extensionId = (int) $data;

        } else {
            $this->_extensionId = $data;
        }
        return $this;
    }

    /**
     * Gets column extensionId
     *
     * @return int
     */
    public function getExtensionId()
    {
        return $this->_extensionId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setVoiceMailUserId($data)
    {

        if ($this->_voiceMailUserId != $data) {
            $this->_logChange('voiceMailUserId', $this->_voiceMailUserId, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_voiceMailUserId = $data;

        } else if (!is_null($data)) {
            $this->_voiceMailUserId = (int) $data;

        } else {
            $this->_voiceMailUserId = $data;
        }
        return $this;
    }

    /**
     * Gets column voiceMailUserId
     *
     * @return int
     */
    public function getVoiceMailUserId()
    {
        return $this->_voiceMailUserId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setNoAnswerTimeout($data)
    {

        if ($this->_noAnswerTimeout != $data) {
            $this->_logChange('noAnswerTimeout', $this->_noAnswerTimeout, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_noAnswerTimeout = $data;

        } else if (!is_null($data)) {
            $this->_noAnswerTimeout = (int) $data;

        } else {
            $this->_noAnswerTimeout = $data;
        }
        return $this;
    }

    /**
     * Gets column noAnswerTimeout
     *
     * @return int
     */
    public function getNoAnswerTimeout()
    {
        return $this->_noAnswerTimeout;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setEnabled($data)
    {

        if ($this->_enabled != $data) {
            $this->_logChange('enabled', $this->_enabled, $data);
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_enabled = $data;

        } else if (!is_null($data)) {
            $this->_enabled = (int) $data;

        } else {
            $this->_enabled = $data;
        }
        return $this;
    }

    /**
     * Gets column enabled
     *
     * @return int
     */
    public function getEnabled()
    {
        return $this->_enabled;
    }

    /**
     * Sets parent relation User
     *
     * @param \IvozProvider\Model\Raw\Users $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setUser(\IvozProvider\Model\Raw\Users $data)
    {
        $this->_User = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setUserId($primaryKey);
        }

        $this->_setLoaded('CallForwardSettingsIbfk1');
        return $this;
    }

    /**
     * Gets parent User
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\Users
     */
    public function getUser($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CallForwardSettingsIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_User = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_User;
    }

    /**
     * Sets parent relation Extension
     *
     * @param \IvozProvider\Model\Raw\Extensions $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setExtension(\IvozProvider\Model\Raw\Extensions $data)
    {
        $this->_Extension = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setExtensionId($primaryKey);
        }

        $this->_setLoaded('CallForwardSettingsIbfk2');
        return $this;
    }

    /**
     * Gets parent Extension
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\Extensions
     */
    public function getExtension($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CallForwardSettingsIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Extension = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Extension;
    }

    /**
     * Sets parent relation VoiceMailUser
     *
     * @param \IvozProvider\Model\Raw\Users $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setVoiceMailUser(\IvozProvider\Model\Raw\Users $data)
    {
        $this->_VoiceMailUser = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setVoiceMailUserId($primaryKey);
        }

        $this->_setLoaded('CallForwardSettingsIbfk3');
        return $this;
    }

    /**
     * Gets parent VoiceMailUser
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\Users
     */
    public function getVoiceMailUser($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CallForwardSettingsIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_VoiceMailUser = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_VoiceMailUser;
    }

    /**
     * Sets parent relation RetailAccount
     *
     * @param \IvozProvider\Model\Raw\RetailAccounts $data
     * @return \IvozProvider\Model\Raw\CallForwardSettings
     */
    public function setRetailAccount(\IvozProvider\Model\Raw\RetailAccounts $data)
    {
        $this->_RetailAccount = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setRetailAccountId($primaryKey);
        }

        $this->_setLoaded('CallForwardSettingsIbfk4');
        return $this;
    }

    /**
     * Gets parent RetailAccount
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\RetailAccounts
     */
    public function getRetailAccount($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CallForwardSettingsIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_RetailAccount = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_RetailAccount;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return IvozProvider\Mapper\Sql\CallForwardSettings
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\IvozProvider\Mapper\Sql\CallForwardSettings')) {

                $this->setMapper(new \IvozProvider\Mapper\Sql\CallForwardSettings);

            } else {

                 new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \IvozProvider\Model\Validator\CallForwardSettings
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\IvozProvider\\Validator\CallForwardSettings')) {

                $this->setValidator(new \IvozProvider\Validator\CallForwardSettings);
            }
        }

        return $this->_validator;
    }

    public function setFromArray($data)
    {
        return $this->getMapper()->loadModel($data, $this);
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
     * @see \Mapper\Sql\CallForwardSettings::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getId() === null) {
            $this->_logger->log('The value for Id cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'id = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getId())
        );
    }

    public function mustUpdateEtag()
    {
        return true;
    }

}