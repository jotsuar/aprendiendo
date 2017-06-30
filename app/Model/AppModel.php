<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function renameFile($field, $currentName, $data, $options = array()) {
		$rand        = mt_rand(8764,999999999);
		$rand_v2     = uniqid();
		$rand_v3     = strtotime(date('Y-m-d H:i:s'));
		$nameContent = explode(".", $currentName);
		$ext         = end($nameContent);
		$newName     = $this->alias."_{$rand}_{$rand_v2}_{$rand_v3}.{$ext}";
		return $newName;
 	}

 	public $fileMimeOffice =  
			array(
	        	'rule' => array('isValidMimeType', array('application/pdf',
 										'application/msword',
 										'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
 										'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
					                    'application/vnd.ms-word.document.macroEnabled.12',
					                    'application/vnd.ms-word.template.macroEnabled.12',
					                    'application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
					                    'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
					                    'application/vnd.ms-excel.sheet.macroEnabled.12',
					                    'application/vnd.ms-excel.template.macroEnabled.12',
					                    'application/vnd.ms-excel.addin.macroEnabled.12',
					                    'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
					                    'application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation',
					                    'application/vnd.openxmlformats-officedocument.presentationml.template',
					                    'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
					                    'application/vnd.ms-powerpoint.addin.macroEnabled.12',
					                    'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
					                    'application/vnd.ms-powerpoint.template.macroEnabled.12',
					                    'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
					                ) ),
	        	'message' => 'File is not a pdf or png',
			
 	);

	public $validExtencionPdf = array(
		'rule' => array('isValidExtension', array("xls","pdf","txt",'pps','ppsx','xlam','doc','docm','docx'), false),
		'message' => 'La extención del archivo no corresponde a las permitidas: Para los formatos Word, Pdf, Excel o Power Point',
	);

	public $validMimeTypeImage = array(
		'rule' => array('isValidMimeType',array('image/gif','image/jpeg','image/pjpeg','image/jpeg','image/pjpeg','image/png')),
		'message' => 'File is not a JPG, PNG o GIF'
	);

	public $validExtencionImage = array(

		'rule' => array('isValidExtension', array("jpg","gif","png"), false),
		'message' => 'La extención del archivo no corresponde a las permitidas: Para los formatos JPG, GIF, PNG',
	);

	public function fileSelected($file) {
		$file = $file["file"];
	    return -(is_array($file) && array_key_exists('name', $file) && !empty($file['name']));
	    die();
	}

}
