<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Mar 2018 10:30:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentResult
 * 
 * @property int $id
 * @property string $name
 * @property string $nric
 * @property string $subject
 * @property string $marks
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class StudentResult extends Eloquent
{
	protected $table = 'student_result';

	protected $fillable = [
		'name',
		'nric',
		'subject',
		'marks'
	];
}
