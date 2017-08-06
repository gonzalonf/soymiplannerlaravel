<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ValidacionAjaxController extends Controller
{
	public function validadorAjax(Request $request)
	{	
		$errores['email'] = '';

				$inputEmail = $request->get('email');

				if (User::where('email', $inputEmail)->first()) {
					$errores['email'] = '* El email ya se encuetra registrado.'; 
				} else{
					$errores['email'] = '* El email sirve.'; 
				}

				return json_encode($errores);
	}
}
