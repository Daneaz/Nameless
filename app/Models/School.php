<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 18 Mar 2018 10:30:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class School
 * 
 * @property int $schoolId
 * @property string $fax_no
 * @property string $gifted_ind
 * @property string $mothertongue3_code
 * @property string $fifth_vp_name
 * @property string $postal_code
 * @property string $type_code
 * @property string $second_vp_name
 * @property string $first_vp_name
 * @property string $mainlevel_code
 * @property string $email_address
 * @property string $sap_ind
 * @property string $cluster_code
 * @property string $telephone_no_2
 * @property string $philosophy_culture_ethos
 * @property string $mrt_desc
 * @property string $bus_desc
 * @property string $third_vp_name
 * @property string $telephone_no
 * @property string $ip_ind
 * @property string $special_sdp_offered
 * @property string $principal_name
 * @property string $mothertongue1_code
 * @property string $nature_code
 * @property string $visionstatement_desc
 * @property string $fourth_vp_name
 * @property string $missionstatement_desc
 * @property string $autonomous_ind
 * @property string $session_code
 * @property string $school_name
 * @property string $dgp_code
 * @property string $address
 * @property string $mothertongue2_code
 * @property string $fax_no_2
 * @property string $zone_code
 * @property string $_id
 * @property string $url_address
 *
 * @package App\Models
 */
class School extends Eloquent
{
	protected $primaryKey = 'schoolId';
	public $timestamps = false;

	protected $fillable = [
		'fax_no',
		'gifted_ind',
		'mothertongue3_code',
		'fifth_vp_name',
		'postal_code',
		'type_code',
		'second_vp_name',
		'first_vp_name',
		'mainlevel_code',
		'email_address',
		'sap_ind',
		'cluster_code',
		'telephone_no_2',
		'philosophy_culture_ethos',
		'mrt_desc',
		'bus_desc',
		'third_vp_name',
		'telephone_no',
		'ip_ind',
		'special_sdp_offered',
		'principal_name',
		'mothertongue1_code',
		'nature_code',
		'visionstatement_desc',
		'fourth_vp_name',
		'missionstatement_desc',
		'autonomous_ind',
		'session_code',
		'school_name',
		'dgp_code',
		'address',
		'mothertongue2_code',
		'fax_no_2',
		'zone_code',
		'_id',
		'url_address'
	];
}
