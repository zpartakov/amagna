<?php
/* Etape Fixture generated on: 2012-06-28 13:57:33 : 1340884653 */
class EtapeFixture extends CakeTestFixture {
	var $name = 'Etape';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'key' => 'primary'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'comment' => 'ordre des étapes'),
		'text' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'image' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'sound' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 80),
		'video' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 80),
		'notes' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'order' => 1,
			'text' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'url' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'sound' => 1,
			'video' => 1,
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
