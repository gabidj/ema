<?php

/**
 * DotBoost Technologies Inc.
 * DotKernel Application Framework
 *
 * @category   DotKernel
 * @copyright  Copyright (c) 2009-2016 DotBoost Technologies Inc. (http://www.dotboost.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version    $Id: Interface.php 1019 2016-04-25 17:00:45Z gabi $
 */

/**
 * Plugin Interface
 * 
 * @category   DotKernel
 * @package    Dot_Plugin
 * @author     DotKernel Team <team@dotkernel.com>
 */
interface Plugin_Interface
{

	/**
	 * Get plugin info
	 * @access public
	 * @return array $info
	 */
	public function getPluginInfo();

}