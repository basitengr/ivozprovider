<?php

/**
 * Application Model
 *
 * @package IvozProvider\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity]
 *
 * @package IvozProvider\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 */
 
namespace IvozProvider\Model;
class Countries extends Raw\Countries
{
    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }

    /**
     * Convert a dialed number to E164 form
     *
     * param string $number
     * return string number in E164
     */
    public function preferredToE164($number, $areaCode = "")
    {
        // Get country pattern
        $e164Pattern = $this->getE164Pattern();

        // Extract number data
        preg_match($e164Pattern, $number, $result);
        if (count($result) == 0) {
            // Get User international code
            $intcode = $this->getIntCode();
            // Remove international Preffix
            $e164number = preg_replace("/^$intcode|^\+/", "", $number, -1, $count);
            // If not an international call (no int prefix found)
            if ($count === 0) {
                return $this->getCallingCode() . $number;
            } else {
                return $e164number;
            }
        } else {
            // Get E164 if not part of the number
            $cc = (!empty($result['cc'])) ? $result['cc'] : $this->getCallingCode();
            $ac = (!empty($result['ac'])) ? $result['ac'] : $areaCode;
            $sn = $result['sn'];
            return $cc . $ac . $sn;
        }
    }

    /**
     * Convert a received number to Company prefered format
     *
     * @param unknown $number
     */
    public function E164ToPreferred($e164number, $areaCode = "")
    {
        $preferred = "";

        // Get country pattern
        $e164Pattern = $this->getE164Pattern();

        // Extract number data
        preg_match($e164Pattern, $e164number, $result);
        if (count($result) == 0) {
            // if calls starts with the country calling code, just remove it
            $cclen = strlen($this->getCallingCode());
            if (substr($e164number, 0, $cclen) == $this->getCallingCode()) {
                $preferred = substr($e164number, $cclen);
            } else {
                // Add international preffix
                $preferred = $this->getIntCode() . $e164number;
            }
        } else {
            // Split E164 components
            $cc = (!empty($result['cc'])) ? $result['cc'] : $this->getCallingCode();
            $ac = (!empty($result['ac'])) ? $result['ac'] : $areaCode;
            $sn = $result['sn'];

            if ($ac != $areaCode) {
                if ($this->getNationalCC())
                    $preferred .= $cc;
                $preferred .= $ac;
            }
            $preferred .= $sn;
        }
        return $preferred;
    }

    /**
     * Check if a country uses Area code
     *
     * return true if the country has area code in its e164 pattern
     */
    public function hasAreaCode()
    {
        return strpos($this->getE164Pattern(), "ac") !== FALSE;
    }

}
