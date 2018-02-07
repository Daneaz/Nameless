<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Oct 2017 13:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Consentform
 * 
 * @property int $consentForm_id
 * @property string $form
 * @property int $adminid
 * @property string $title
 *
 * @package App\Models
 */
class Consentform extends Eloquent
{
	protected $table = 'consentform';
	protected $primaryKey = 'consentForm_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'consentForm_id' => 'int',
		'adminid' => 'int'
	];

	protected $fillable = [
		'form',
		'adminid',
		'title'
	];
}
