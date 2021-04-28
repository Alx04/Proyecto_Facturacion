<?php

namespace App\Controllers;


class Ajustes extends BaseController
{
	public function clientes()
	{
		return view('ajustes/clientes');
	}

	public function usuarios()
	{
		return view('ajustes/usuarios');
	}

	public function articulos()
	{
		return view('ajustes/articulos');
	}
	

	

	
}