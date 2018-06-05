<?php 

	class TemplateController extends Controller
	{
	
		//affichage  connexion
		public function showLoginStatus()
        {
           // echo"Test function working Winning AL hamdoulillah Machallah";
            
            
           //récupération des informations de connexion
			$userCM = new UserModel();
			$this->viewData['user'] = $userCM -> getLoginInfo();

			//récupération des éventuelles données entrées erronées
			if(isset($_SESSION['forms']['login']['fieldsContent']))
			{
				$this->viewData['enteredData'] = $_SESSION['forms']['login']['fieldsContent'];
			}
			$this -> generateView('templates/login.html', null);
		}

		
    }
 ?>