<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Mar 2018 10:30:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Consentform
 * 
 * @property int $consentForm_id
 * @property string $form
 * @property int $admin_id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Consentform extends Eloquent
{
	protected $table = 'consentform';
	protected $primaryKey = 'consentForm_id';

	protected $casts = [
		'admin_id' => 'int'
	];

	protected $fillable = [
		'form',
		'admin_id',
		'title'
	];
}
