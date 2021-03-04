<?php
/*--------------------
https://github.com/billiemead/activeecommerce-form-builder.git
Licensed under the GNU General Public License v3.0
Author: Billie Mead (billiemead.com)
Last Updated: 02/20/2021
----------------------*/
namespace billiemead\FormBuilder\Services;

class RolesProvider
{
	/**
	 * Return the array of roles in the format
	 *
	 * [
	 * 	 1 => 'Role Name',
	 * ]
	 * @return array
	 */
    public function __invoke() : array
    {
    	return [
    		1 => 'Default',
    	];
    }
}
