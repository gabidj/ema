<?php
/**
 * DotBoost Technologies Inc.
 * DotKernel Application Framework
 *
 * @category   DotKernel
 * @copyright  Copyright (c) 2009-2016 DotBoost Technologies Inc. (http://www.dotboost.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version    $Id: User.php 1019 2016-04-25 17:00:45Z gabi $
 * @author     DotKernel Team <team@dotkernel.com>
*/

/**
 * User Model for CLI
 * 
 * Class that prepare output related to User controller
 * 
 * @category   DotKernel
 * @package    CLI
 * @subpackage User
 * @author     DotKernel Team <team@dotkernel.com>
 */

class Console_Model_User extends Dot_Model_User
{
	/**
	 * Email constructor
	 * @access public 
	 * @return Dot_Model_User
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	public function countUsers()
	{
		$select = $this->db->select()
			->from('user', array('cnt' => 'count(id)'));
		$result = $this->db->fetchRow($select);
		return $result['cnt'];
	}
}