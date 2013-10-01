<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Model for People
 * 
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application\Models
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License Version 3 (GPLv3)
 */

class Model_Person extends ORM {
	/**
	 * A person has many pings, children
	 * A person has and belongs to many contacts
	 */
	protected $_has_many = array(
		'pings' => array(),
		'pongs' => array(),
		'contacts' => array('through' => 'contacts_people'),
		'children' => array(
			'model' => 'Person',
			'foreign_key' => 'parent_id',
			),
		);

	/**
	 * A person belongs to a parent, user
	 */
	protected $_belongs_to = array(
		'user' => array(),
		'parent' => array(
			'model'  => 'Person',
			'foreign_key' => 'parent_id',
			),
		);

	// Insert/Update Timestamps
	protected $_created_column = array('column' => 'created', 'format' => 'Y-m-d H:i:s');
	protected $_updated_column = array('column' => 'updated', 'format' => 'Y-m-d H:i:s');

	public function rules()
	{
		return array(
			'name' => array(
				array('not_empty'),
				array('min_length', array(':value', 2)),
				array('max_length', array(':value', 150)),
			),
			'status' => array(
				array('in_array', array(':value', array('ok', 'notok', 'unknown')) ),
			),
		);
	}
}