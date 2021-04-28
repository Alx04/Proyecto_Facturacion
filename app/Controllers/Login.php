<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Libraries\Mailer;

class Login extends BaseController
{
	public function login()
	{
		if( is_login() ){
			return redirect()->to(base_url("inicio/inicio"));
		}else{
			return view('login/login');
		}
	}

	public function registro()
	{
		if( is_login() ){
			return redirect()->to(base_url("inicio/inicio"));
		}else{
			return view('login/registro');
		}
		
	}

	public function olvido()
	{
		$this->session = \Config\Services::session();
		$id_usuario= $this->session->get('id_usuario');

		if ($id_usuario>0){
			return redirect()->to(base_url("inicio/inicio"));
		}else{
			return view('login/olvido');
		}
	}

	public function verificar()
	{
		$respuesta=0;

		$UsuariosModel= new UsuariosModel();
		$UsuariosModel->setCorreo($_POST['usuario']);
		$usuario = $UsuariosModel->selectUsuarioCorreo();
		
		if ($usuario) {
			if ($usuario->pass==$_POST['pass']) {
				
				$dataSesion = array(
                    'id_usuario' => $usuario->id_usuario,
                    'id_rol' => $usuario->id_rol,
                    'nombre' => $usuario->nombre,
                    'correo' => $usuario->correo,
                    'id_empresa' => 1,
                );
                $session = \Config\Services::session();
                $session->set($dataSesion);

				$respuesta=1;
			}
		}
		return json_encode(array("respuesta"=>$respuesta));
	}

	public function registrarme(){
		if($_POST['pass'] == $_POST['repass']){
			$UsuariosModel= new UsuariosModel();

			$UsuariosModel->setNombre($_POST['nombre']);
			$UsuariosModel->setCorreo($_POST['correo']);
			$UsuariosModel->setPass($_POST['pass']);
			$UsuariosModel->setIdRol(3);
			$UsuariosModel->setActivo(1);

			$id_usuario= $UsuariosModel->insertarUsuario();
			if ($id_usuario>0) {
				$dataSesion = array(
                    'id_usuario' => $id_usuario,
                    'id_rol' => 3,
                    'nombre' => $_POST['nombre'],
                    'correo' => $_POST['correo'],
                    'id_empresa' => 1,
                );
	            $session = \Config\Services::session();
	            $session->set($dataSesion);

	            $mail = new Mailer();

	            $body="
	            	<h1 style='color:red;'>Hola ".$_POST['nombre'].",</h1>
	            	<p>Bienvenido</p>
	            	<a href='".base_url()."''>Acceder a la plataforma</a>
	            ";
				$data= array(
					"from" => "miramar@jrtec.cl",
					"name" => "Miramar",
					"correo" =>$_POST['correo'],
					"asunto" => "Bienvenido",
					"cuerpo" =>$body,
				);

				$envio= $mail->enviarCorreo($data);
			}
			return json_encode($id_usuario);
		}else{
			return json_encode(0);
		}
	}

	public function verificaCorreo(){
		$UsuariosModel= new UsuariosModel();
		
		$UsuariosModel->setCorreo($_POST['correo']);
		$usuario = $UsuariosModel->selectUsuarioCorreo();
		return $usuario;
		
	}

	public function listaDeUsuarios(){
		$UsuariosModel= new UsuariosModel();
		$listado= $UsuariosModel->selectUsuarios();
		print_r($listado);
	}

	public function salir(){
		$session= $this->session = \Config\Services::session();
		$session->destroy();
		return redirect()->to(base_url("login/login"));
	}

	public function recuperar(){
		$UsuariosModel= new UsuariosModel();
		$UsuariosModel->setCorreo($_POST['correo']);
		$usuario = $UsuariosModel->selectUsuarioCorreo();

		if ($usuario) {
			$correo = $usuario->correo;
			$mail = new Mailer();
			$correos= array($correo, "ventas@jrtec.cl", "jquesada@azucareraelpalmar.com");
			$data= array(
				"from" => "miramar@jrtec.cl",
				"name" => "Miramar",
				"correo" =>$correos,
				"asunto" => "Recuperar contraseña",
				"cuerpo" =>"Hola su contraseña es: $usuario->pass",
				//"adjunto" =>"archivos/brower.xlsx",
				//"nombre_adjunto" => "reporte $usuario->nombre.xlsx"
			);

			$envio= $mail->enviarCorreo($data);

			if ($envio) {
				echo 1;
			}else{
				echo 0;
			}
			
		}else{
			echo 0;
		}
	}


	
}