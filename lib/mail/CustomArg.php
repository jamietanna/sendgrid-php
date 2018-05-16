<?php 
/**
 * This helper builds the CustomArg object for a /mail/send API call
 * 
 * PHP Version - 5.6, 7.0, 7.1, 7.2
 *
 * @package   SendGrid\Mail
 * @author    Elmer Thomas <dx@sendgrid.com>
 * @copyright 2018 SendGrid
 * @license   https://opensource.org/licenses/MIT The MIT License
 * @version   GIT: <git_id>
 * @link      http://packagist.org/packages/sendgrid/sendgrid 
 */
namespace SendGrid\Mail;

/**
 * This class is used to construct a CustomArg object for the /mail/send API call
 * 
 * Values that are specific to the entire send that will be carried along with the 
 * email and its activity data. Substitutions will not be made on custom arguments, 
 * so any string that is entered into this parameter will be assumed to be the 
 * custom argument that you would like to be used. This parameter is overridden by 
 * personalizations[x].custom_args if that parameter has been defined. Total custom 
 * args size may not exceed 10,000 bytes.
 * 
 * @package SendGrid\Mail
 */
class CustomArg implements \JsonSerializable
{
    // @var string Custom arg key
    private $key;
    // @var string Custom arg value
    private $value;

    /**
     * Optional constructor
     *
     * @param string|null $key   Custom arg key
     * @param string|null $value Custom arg value
     */ 
    public function __construct($key=null, $value=null)
    {
        if (isset($key)) {
            $this->setKey($key);
        }
        if (isset($value)) {
            $this->setValue($value);
        }
    }

    /**
     * Add a custom arg key on a CustomArg object
     *
     * @param string $key Custom arg key
     * 
     * @return null
     */ 
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Retrieve a custom arg key on a CustomArg object
     * 
     * @return string
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Add a custom arg value on a CustomArg object
     *
     * @param string $value Custom arg value
     * 
     * @return null
     */ 
    public function setValue($value)
    {
        $this->value = (string)$value;
    }

    /**
     * Retrieve a custom arg key on a CustomArg object
     * 
     * @return string
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Return an array representing a CustomArg object for the SendGrid API
     * 
     * @return null|array
     */  
    public function jsonSerialize()
    {
        return array_filter(
            [
                'key'   => $this->getKey(),
                'value'   => $this->getValue()
            ],
            function ($value) {
                return $value !== null;
            }
        ) ?: null;
    }
}