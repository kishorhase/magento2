<?php
namespace Kh\Apidemo\Model;

use Kh\Apidemo\Api\CalculatorInterface;

use Kh\Apidemo\Api\Data\PointInterfaceFactory;

/**
 * Defines the implementaiton class of the calculator service contract.
 */

class Calculator implements CalculatorInterface {

	/**
	 * @var PointInterfaceFactory
	 * Factory for creating new Point instances. This code will be automatically
	 * generated because the type ends in "Factory".
	 */
	private $pointFactory;

	/**
	 * Constructor.
	 *
	 * @param PointInterfaceFactory Factory for creating new Point instances.
	 */
	public function __construct(PointInterfaceFactory $pointFactory) {
		$this->pointFactory = $pointFactory;
	}

	/**
	 * Return the sum of the two numbers.
	 *
	 * @api
	 * @param int $num1 Left hand operand.
	 * @param int $num2 Right hand operand.
	 * @return int The sum of the two values.
	 */
	public function add($num1, $num2) {
		return $num1+$num2;
	}

	public function sum($nums) {
		$total = 0.0;
		foreach ($nums as $num) {
			$total += $num;
		}
		return $total;
	}

	/**
	 * Compute mid-point between two points.
	 *
	 * @api
	 * @param PointInterface $point1 The first point.
	 * @param PointInterface $point2 The second point.
	 * @return PointInterface The mid-point.
	 */
	public function midPoint($point1, $point2) {
		$point = $this->pointFactory->create();
		$point->setX(($point1->getX()+$point2->getX())/2.0);
		$point->setY(($point1->getY()+$point2->getY())/2.0);
		return $point;
	}

}