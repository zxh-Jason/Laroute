<?php

namespace Laroute\Helper;

use Laroute\Helper\TGetter;

////////////////////////////////////////////////////////////////

class Stack
{
	use TGetter;

	/**
	 * The array that hosting the items.
	 *
	 * @access private
	 *
	 * @var    array
	 */
	private $stackArray= [];

	/**
	 * Type of items.
	 *
	 * @access private
	 *
	 * @var    string
	 */
	private $type= '';

	/**
	 * Constructing a stack with item of giving type.
	 *
	 * @access public
	 *
	 * @param  string $type
	 */
	public function __construct( string$type='' )
	{
		$this->type= $type;
	}

	/**
	 * Pushing an item into this stack.
	 *
	 * @access public
	 *
	 * @param  mixed $item
	 *
	 * @return void
	 */
	public function push( $item )
	{
		if( $this->type && gettype($item)!==$this->type && get_class($item)!==$this->type ){
			$type= gettype($item);
			$type==='object' and $type= get_class($item);
			throw new Error('TypeError: Argument 1 passed to '.__METHOD__."() must be of the type {$this->type}, $type given.");
		}

		array_unshift($this->stackArray,$item);
	}

	/**
	 * Popping out the top item of this stack.
	 *
	 * @access public
	 *
	 * @return ($this->type)
	 */
	public function pop()
	{
		return array_shift($this->stackArray);
	}

	/**
	 * Getting the top item of this stack.
	 *
	 * @access public
	 *
	 * @return ($this->type)
	 */
	public function getTop()
	{
		return $this->stackArray[0]??null;
	}

	/**
	 * Getting an item with index.
	 *
	 * @access public
	 *
	 * @param  int $index
	 *
	 * @return ($this->type)
	 */
	public function get( int$index )
	{
		return $this->stackArray[$index]??null;
	}

	/**
	 * Whether this stack is empty.
	 *
	 * @access public
	 *
	 * @return bool
	 */
	public function getIsEmpty():bool
	{
		return empty($this->stackArray);
	}

	/**
	 * Count of items of this stack.
	 *
	 * @access public
	 *
	 * @return int
	 */
	public function count():int
	{
		return count($this->stackArray);
	}

	/**
	 * Method getSize
	 *
	 * @access public
	 *
	 * @return int
	 */
	public function getSize():int
	{
		return $this->count();
	}

}
