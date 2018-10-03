<?php

/**
 * Copyright 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Kh\Apidemo\Model;

use Kh\Apidemo\Api\Data\PointInterface;

/**
 * Defines a data structure representing a point, to demonstrating passing
 * more complex types in and out of a function call.
 */

class Point implements PointInterface {
	private $x;
	private $y;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->x = 0.0;
		$this->y = 0.0;
	}

	/**
	 * Get the x coordinate.
	 *
	 * @api
	 * @return float The x coordinate.
	 */
	public function getX() {
		return $this->x;
	}

	/**
	 * Set the x coordinate.
	 *
	 * @api
	 * @param $value float The new x coordinate.
	 * @return null
	 */
	public function setX($value) {
		$this->x = $value;
	}

	/**
	 * Get the y coordinate.
	 *
	 * @api
	 * @return float The y coordinate.
	 */
	public function getY() {
		return $this->y;
	}

	/**
	 * Set the y coordinate.
	 *
	 * @api
	 * @param $value float The new y coordinate.
	 * @return null
	 */
	public function setY($value) {
		$this->y = $value;
	}
}