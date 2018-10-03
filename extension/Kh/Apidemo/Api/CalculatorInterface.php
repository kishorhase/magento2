<?php

namespace Kh\Apidemo\Api;

/**
 * Defines the service contract for some simple maths functions.
 */
interface CalculatorInterface {
	/**
	 * Return the sum of the two numbers.
	 *
	 * @api
	 * @param int $num1 Left hand operand.
	 * @param int $num2 Right hand operand.
	 * @return int The sum of the numbers.
	 */
	public function add($num1, $num2);

	/**
	 * Sum an array of numbers.
	 *
	 * @api
	 * @param float[] $nums The array of numbers to sum.
	 * @return float The sum of the numbers.
	 */
	public function sum($nums);

	/**
	 * Compute mid-point between two points.
	 *
	 * @api
	 * @param Kh\Apidemo\Api\Data\PointInterface $point1 The first point.
	 * @param Kh\Apidemo\Api\Data\PointInterface $point2 The second point.
	 * @return Kh\Apidemo\Api\Data\PointInterface The mid-point.
	 */
	public function midPoint($point1, $point2);
}