<?php
/**
* DotBoost Technologies Inc.
* DotKernel Application Framework
*
* @category   DotKernel
* @copyright  Copyright (c) 2009-2016 DotBoost Technologies Inc. (http://www.dotboost.com)
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
* @version    $Id: Validate.php 1019 2016-04-25 17:00:45Z gabi $
*/

/**
* Validate different inputs
* @category   DotKernel
* @package    DotLibrary
* @subpackage DotValidate
* @author     DotKernel Team <team@dotkernel.com>
*/

class Dot_Validate
{
	/**
	 * Validate options
	 * @access private
	 * @var array
	 */
	private $_options = array();
	
	/**
	 * Constructor
	 * @access public
	 * @param array $options [optional]
	 * @return Dot_Validate
	 */
	public function __construct($options = array())
	{
		$this->_options = $options;
	}
}
