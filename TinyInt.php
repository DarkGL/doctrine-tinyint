<?php

namespace GollumSF\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TinyInt extends Type {
	const TINYINT = 'tinyint';
	
	/**
	 * @param array $fieldDeclaration
	 * @param AbstractPlatform $platform
	 * @return string
	 */
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
		if (isset($fieldDeclaration['length'])) {
		    $length = $fieldDeclaration['length'];
		} else {
		    $length = 4;
		}

		if (isset($fieldDeclaration['unsigned']) && $fieldDeclaration['unsigned']) {
		    return "TINYINT($length) UNSIGNED";
		} else {
		    return "TINYINT($length)";
		}
	}
	
	/**
	 * @return string
	 */
	public function getName() {
		return self::TINYINT;
	}
}
