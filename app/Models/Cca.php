<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Mar 2018 10:30:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cca
 * 
 * @property int $id
 * @property string $school_section
 * @property string $school_name
 * @property string $cca_grouping_desc
 * @property string $cca_customized_name
 * @property string $cca_generic_name
 *
 * @package App\Models
 */
class Cca extends Eloquent
{
	protected $table = 'cca';
	public $timestamps = false;

	protected $fillable = [
		'school_section',
		'school_name',
		'cca_grouping_desc',
		'cca_customized_name',
		'cca_generic_name'
	];
}
