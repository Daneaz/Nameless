<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Oct 2017 13:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Signform
 * 
 * @property int $consentForm_id
 * @property int $user_id
 * @property int $boolean
 *
 * @package App\Models
 */
class Signform extends Eloquent
{
	protected $table = 'signform';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'consentForm_id' => 'int',
		'user_id' => 'int',
		'boolean' => 'int'
	];

	protected $fillable = [
		'boolean'
	];
}
