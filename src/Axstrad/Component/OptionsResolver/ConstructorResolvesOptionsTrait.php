<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\OptionsResolver
 */
namespace Axstrad\Component\OptionsResolver;


/**
 * Axstrad\Component\OptionsResolver\ConstructorResolvesOptionsTrait
 *
 */
trait ConstructorResolvesOptionsTrait
{
	use ResolvesOptionsTrait {
		ResolvesOptionsTrait::resolveOptions as protected;
	}


	/**
	 * @param array $options
	 */
	public function __construct(array $options = array())
	{
		$this->setResolvedOptions(
			$this->resolveOptions($options)
		);
	}

	/**
	 * Define this method to process the resolved options.
	 *
	 * @param array $options
	 */
	abstract protected function setResolvedOptions(array $options);
}
