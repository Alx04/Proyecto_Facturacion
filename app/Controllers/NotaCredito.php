<?php

namespace App\Controllers;


class NotaCredito extends BaseController
{
	public function crear()
	{
		return view('notaCredito/crear');
	}

	public function listado()
	{
		return view('notaCredito/listado');
	}
	

	

	
}