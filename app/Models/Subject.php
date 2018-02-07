<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Oct 2017 13:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Subject
 * 
 * @property int $id
 * @property string $subject_desc
 * @property string $school_name
 *
 * @package App\Models
 */
class Subject extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'subject_desc',
		'school_name'
	];
}
