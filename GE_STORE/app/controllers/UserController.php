<?php

class UserController extends Controller
{
    	//connexion
    public function connectAction(){
       //echo" Le frontcontroller is doing is job by the default COntroller";
        //récupération des infos de connexion
		$userCM = new UserModel();
		$this -> viewData['user'] = $userCM -> getLoginInfo();
		

		//vérification des données reçues
		if(array_key_exists('email', $_POST) && array_key_exists('password', $_POST))
	 	{
	 		//ouverture de la session
	 		if (session_status() !== PHP_SESSION_ACTIVE)
	 			{
	 				session_start();
	 				session_regenerate_id();
	 			}

			if (!empty($_POST['email'])&&!empty($_POST['password']))
			{	
				$enteredData =
				[
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password'])
				];

				//mémorisation pour ré-afficher les données entrées en cas d'erreur
				$_SESSION['forms']['connect']['fieldsContent']['email'] = $enteredData['email'];

				//récupération des infos compte associées à l'e-mail entré
				$userCM = new UserModel();
				$user = $userCM -> getOneByEmail($enteredData['email']);

				//si le compte existe et que le mot de passe correspond
				if ($user !== false && password_verify($enteredData['password'], $user['passwordHash']))
				{
                    
					//enregistrement des infos client dans la session
					$_SESSION['user'] = 
						[
							'id' => $user['id'],
							'email' => $user['email'],
							/*'firstName' => $user['firstName'],
							'lastName' => $user['lastName'],
							'CSRFToken' => bin2hex(openssl_random_pseudo_bytes(10))*/
						];

					header('Location: connexion');
					exit();
				}
				else
				{
					$_SESSION['alertMessages']['error'][] = 'Vos identifiants ne correspondent pas.';
				}
			}
			else 
			{
				$_SESSION['alertMessages']['error'][] = 'Veuillez entrer une adresse e-mail et un mot de passe valides.';
			}
		}

		if(isset($_SESSION['forms']['connect']['fieldsContent']))
		{
			$this->viewData['enteredData'] = $_SESSION['forms']['connect']['fieldsContent'];
		}
		header('Location:connexion');
		exit();
    }



    public function connexionAction()
	{
		//récupération des infos de connexion
		$userCM = new UserModel();
		$this -> viewData['user'] = $userCM ->getLoginInfo();

		//récupération des éventuelles données entrées erronées
		if(isset($_SESSION['forms']['connect']['fieldsContent']))
		{
			$this->viewData['enteredData'] = $_SESSION['forms']['connect']['fieldsContent'];
		}

		$this -> generateView('user/success.html');
		
	}
   

	
}
