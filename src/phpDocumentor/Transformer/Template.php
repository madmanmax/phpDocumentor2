<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2012 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Transformer;

/**
 * Model representing a loaded template.
 *
 * @author  Mike van Riel <mike.vanriel@naenius.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link    http://phpdoc.org
 */
class Template extends \ArrayObject
{
    /** @var string Name for this template */
    protected $name = '';

    /** @var string */
    protected $author = '';

    /** @var string */
    protected $version = '';

    /** @var string[] */
    protected $parameters = array();

    /**
     * Returns the name for this template.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name for this template.
     *
     * @param string $name
     *
     * @return Template
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Sets the name of the author of this template (optionally including mail
     * address).
     *
     * @param string $author Name of the author optionally including mail address
     *  between angle brackets.
     *
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Returns the name and/or mail address of the author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the version number for this template.
     *
     * @param string $version Semantic version number in this format: 1.0.0
     *
     * @throws \InvalidArgumentException if the version number is invalid
     * @return void
     */
    public function setVersion($version)
    {
        if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
            throw new \InvalidArgumentException(
                'Version number is invalid; ' . $version . ' does not match '
                . 'x.x.x (where x is a number)'
            );
        }
        $this->version = $version;
    }

    /**
     * Returns the version number for this template.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Adds a new transformation to the template.
     *
     * @param Transformation $transformation
     *
     * @return Template
     */
    public function add(Transformation $transformation)
    {
        $this[] = $transformation;

        return $this;
    }

    /**
     * Sets a transformation at the given offset.
     *
     * @param integer|string $offset The offset to place the value at.
     * @param Transformation $value  The transformation to add to this template.
     *
     * @throws \InvalidArgumentException if an invalid item was received
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof Transformation) {
            throw new \InvalidArgumentException(
                '\phpDocumentor\Transformer\Template may only contain items of '
                . 'type \phpDocumentor\Transformer\Transformation'
            );
        }

        parent::offsetSet($offset, $value);
    }

    /**
     * Sets an associative array representing parameters for this template.
     *
     * @param string[] $parameters
     *
     * @return $this
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Returns a list of parameters as key value pairs.
     *
     * @return string[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
