var nbInputVide = 0;
//recuperation des valeurs des inputs	
var prenomEntree = document.getElementById("inputPrenom").value;
var nomEntree = document.getElementById("inputNom").value;
var numPortEntree = document.getElementById("inputNumPort").value;
//var numFixEntree = document.getElementById("inputNumFix").value;
var adresse1Entree = document.getElementById("inputAdresse").value;
var adresse2Entree = document.getElementById("inputAdresse2").value;
var villeEntree = document.getElementById("inputVille").value;
var codePostalEntree = document.getElementById("inputCodePostal").value;
var codeSiretSirenEntree = document.getElementById("inputNumSiretSiren").value;
var emailEntree = document.getElementById("inputEmail").value;
var motDePasseEntree = document.getElementById("inputMotDePasse").value;
var motDePasseConfirmEntree = document.getElementById("inputMotDePasseConfirm").value;

// tableau de 12 cases
var tabValidationNom=['prenomValidee','nomValidee','numPortValidee','numFixValidee','adresse1Validee','adresse2Validee','villeValidee','codePostalValidee','numSiretSirenValidee','mailValidee','motDePasseValidee','motDePasseConfirmValidee'];
var tabValidationValeur=[0,0,0,0,0,0,0,0,0,0,0,0];


// Verification du prenom
function verifPrenom ()
{
	document.getElementById("inputPrenom").addEventListener("input", function (e) {
		var inputPrenom = e.target.value; // Valeur saisie dans le champ
		var Message;
		var couleurMsg = "red";
		var validePrenom = 0;
		var casePrenom = document.getElementById("inputPrenom");
		//validePrenom=1 == chiffre ; validePrenom=2 == lettres
		for (compteur = 0 ; compteur<inputPrenom.length ; compteur ++)
		{
			if(!(isNaN(inputPrenom[compteur])))
			{
				validePrenom = 1;
			}
		}    
		if (inputPrenom!==null && validePrenom==1) {
			tabValidationValeur[0]=0;
			Message = "N'accepte pas les chiffres";
			couleurMsg = "red";    
			casePrenom.style = "outline: 1px solid red;"
		} 
		else if (inputPrenom.length<3)
		{
			casePrenom.style = "outline: 1px solid red;"
			tabValidationValeur[0]=0;
		}
		else
		{
			tabValidationValeur[0]=1;
			casePrenom.style = "outline: 1px solid green;"
		}	


		var aidePrenomElt = document.getElementById("alertPrenom");
		aidePrenomElt.textContent =  Message; // Texte de l'aide
		aidePrenomElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
}

// Verification du nom
function verifNom ()
{
	document.getElementById("inputNom").addEventListener("input", function (e) {
		var inputNom = e.target.value; // Valeur saisie dans le champ
		var Message;
		var couleurMsg = "red";
		var valideNom = 0;
		var caseNom = document.getElementById("inputNom");
		//valideNom=1 == chiffre ; valideNom=2 == lettres
		for (compteur = 0 ; compteur<inputNom.length ; compteur ++)
		{
			if(!(isNaN(inputNom[compteur])))
			{
				valideNom = 1;
			}
		}    
		if (inputNom!==null && valideNom==1) {
			caseNom.style = "outline: 1px solid red;"
			Message = "N'accepte pas les chiffres";
			couleurMsg = "red";  
			tabValidationValeur[1]=0;   
		}
		else if (inputNom.length<3)
		{
			caseNom.style = "outline: 1px solid red;"
			tabValidationValeur[1]=0;
		}
		else
		{
			tabValidationValeur[1]=1;
			caseNom.style = "outline: 1px solid green;"
		}	

		var aideNomElt = document.getElementById("alertNom");
		aideNomElt.textContent =  Message; // Texte de l'aide
		aideNomElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
}

// V�rification du numero de portable
function verifNumPort ()
{
	document.getElementById("inputNumPort").addEventListener("input", function (e) {
		var inputNumPort = e.target.value; // Valeur saisie dans le champ
		var Message = "";
		var Message2 = "";
		var couleurMsg = "red";
		var valideNumPort = 0;
		var caseNumPort = document.getElementById("inputNumPort");
		//valideNumPort=1 == chiffre ; valideNumPort=2 == lettres
		for (compteur = 0 ; compteur<inputNumPort.length ; compteur ++)
		{
			if(isNaN(inputNumPort[compteur]))
			{
				valideNumPort = 1;
			}
		}    
		if (((inputNumPort.length>=10) || valideNumPort==1)&&!(inputNumPort[0]==0 && (inputNumPort[1]==6 || inputNumPort[1]==7)))
		{
			Message = "Numero invalide";
			couleurMsg = "red";     
			caseNumPort.style= "outline : 1px solid red;"
			tabValidationValeur[2]=0;
		}
		else if(inputNumPort.length<10)	
		{
			caseNumPort.style = "outline: 1px solid red;"
			tabValidationValeur[2]=0;
		}
		else if(inputNumPort.length==0)
		{
			caseNumPort.style = "outline: 1px solid red;"
			tabValidationValeur[2]=0;
		} 
		else
		{
			caseNumPort.style = "outline: 1px solid green;"
			tabValidationValeur[2]=1;
		
		} 

		var aideNumPortElt = document.getElementById("alertNumPort");
		aideNumPortElt.textContent =  Message + Message2; // Texte de l'aide
		aideNumPortElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
}

//Verification du numero de fixe
function verifNumFix ()
{
	document.getElementById("inputNumFix").addEventListener("input", function (e) {
		var inputNumFix = e.target.value; // Valeur saisie dans le champ
		var Message = "";
		var Message2 = "";
		var couleurMsg = "red";
		var valideNumFix = 0;
		var caseNumFix = document.getElementById("inputNumFix");
		//valideNumPort=1 == chiffre ; valideNumPort=2 == lettres
		for (compteur = 0 ; compteur<inputNumFix.length ; compteur ++)
		{
			if(isNaN(inputNumFix[compteur]))
			{
				valideNumFix = 1;
			}
		}    
		if (((inputNumFix.length>=10 || valideNumFix==1)&&!(inputNumFix[0]==0 && inputNumFix[1]==4)))
		{
			Message = "Numero invalide";
			couleurMsg = "red";     
			caseNumFix.style= "outline : 1px solid red";
			tabValidationValeur[3]=0;
		}	
		else if(inputNumFix.length==0)
		{
			caseNumFix.style = "outline: 1px solid orange;"
			tabValidationValeur[3]=0;
		}
		else if (inputNumFix.length<10)
		{
			caseNumFix.style = "outline: 1px solid red;"
			tabValidationValeur[3]=0;
		} 
		else
		{
			caseNumFix.style = "outline: 1px solid green;"
			tabValidationValeur[3]=1;
		
		} 

		var aideNumPortElt = document.getElementById("alertNumFix");
		aideNumPortElt.textContent =  Message + Message2; // Texte de l'aide
		aideNumPortElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
}

function verifAdresse (){
	document.getElementById("inputAdresse").addEventListener("input", function (e) {
		var inputAdresse = e.target.value; // Valeur saisie dans le champ
		var caseAdresse = document.getElementById("inputAdresse");

		if (inputAdresse.length<8)
		{
			tabValidationValeur[4]=0;
			caseAdresse.style = "outline: 1px solid red;"
		}
		else
		{
			tabValidationValeur[4]=1;
			caseAdresse.style = "outline: 1px solid green;"
		}
	});
}

/*function completerAdresse(){
	var adresse=document.getElementById("inputAdresse").value;
	if (adresse.length>10)
	{
		var url = "https://api-adresse.data.gouv.fr/search/?q="+adresse+"&limit=15";
		var request = new XMLHttpRequest();
		request.open('GET', url);
		request.responseType = 'text';
		request.send();
		alert(request);
	}
}*/

function verifAdresse2 (){
	document.getElementById("inputAdresse2").addEventListener("input", function (e) {
		var inputAdresse2 = e.target.value; // Valeur saisie dans le champ
		var caseAdresse2 = document.getElementById("inputAdresse2");
		if (inputAdresse2.length==0)
		{
			caseAdresse2.style = "outline: 1px solid orange;"
		}
		else if (inputAdresse2.length<3)
		{
			tabValidationValeur[5]=0
			caseAdresse2.style = "outline: 1px solid red;"
		}
		else
		{
			tabValidationValeur[5]=1
			caseAdresse2.style = "outline: 1px solid green;"
		}
	});
}

// Verification du code postal
function verifCodePostal ()
{
	document.getElementById("inputCodePostal").addEventListener("input", function (e) {
		var inputCodePostal = e.target.value; // Valeur saisie dans le champ
		var Message = "";
		var Message2 = "";
		var couleurMsg = "red";
		var valideCodePostal = 0;
		var caseCodePostal = document.getElementById("inputCodePostal");
		//valideCodePostal=0 == chiffre ; valideCodePostal=1 == lettre(s)
		for (compteur = 0 ; compteur<inputCodePostal.length ; compteur ++)
		{
			if(isNaN(inputCodePostal[compteur]))
			{
				valideCodePostal = 1;
			}
		}    

		if ((inputCodePostal.length!==5 && inputCodePostal.length>0) || valideCodePostal==1)
		{
			Message = "Code postal invalide";
			couleurMsg = "red";     	
			caseCodePostal.style = "outline: 1px solid red;"
			tabValidationValeur[7]=0;
		}
		else if(inputCodePostal.length==0)
		{
			caseCodePostal.style = "outline: 1px solid red;"
			tabValidationValeur[7]=0;
		} 
		else
		{
			caseCodePostal.style = "outline: 1px solid green;"
			tabValidationValeur[7]=1;
		
		}

		var aideCodePostalElt = document.getElementById("alertCodePostal");
		aideCodePostalElt.textContent =  Message + Message2; // Texte de l'aide
		aideCodePostalElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
    chargeListeVilles();
}

function chargeListeVilles(){
    var codePostal= document.getElementById('inputCodePostal').value;
	var inputVille= document.getElementById('inputVille');
	var caseVille = document.getElementById("inputVille");
    if (codePostal.length>=3)
    {
        xhr_object = new XMLHttpRequest();
        var adresse= "assets/listeVilles.php?cp="+codePostal;
        //alert (adresse);
        xhr_object.open("GET",adresse, true);
        xhr_object.send(null);

            xhr_object.onreadystatechange = function()
            {
                //instruction de traitement de la reponse
                if (xhr_object.readyState == 4)
                {

                    //alert("reponse 4");
                    if (xhr_object.statut == 200)
                    {
                        //inputVille.innerHTML=xhr_object.responseText;
                        //alert("reponse 200");
                    }
                    else 
                    {
                        inputVille.innerHTML=xhr_object.responseText;
                        tabValidationValeur[6]=1
                        caseVille.style = "outline: 1px solid green;"
                        //alert (xhr_object.responseText);
                    }
                }
                //else alert ("else du 4");
            };
    } // Fin du si , le nombre de caracteres est suffisant
    else{
        inputVille.innerHTML="";
        tabValidationValeur[6]=0
        caseVille.style = "outline: 1px solid red;"
    }
}

/*function verifVille (){
	document.getElementById("inputVille").addEventListener("input", function (e) {
		var inputVille = e.target.value; // Valeur saisie dans le champ
		var valideVille = 0;
		var caseVille = document.getElementById("inputVille");
		//valideVille=1 == chiffre ;
		for (compteur = 0 ; compteur<inputVille.length ; compteur ++)
		{
			if(!(isNaN(inputVille[compteur])))
			{
				valideVille = 1;
			}
		}    
		if (inputVille!==null && valideVille==1) {
			Message = "N'accepte pas les chiffres"; 
			tabValidationValeur[6]=0   
			caseVille.style = "outline: 1px solid red;"
		}
		else if (inputVille.length<3 && valideVille==1)
		{
			tabValidationValeur[6]=0
			caseVille.style = "outline: 1px solid red;"
		}
		else
		{
			tabValidationValeur[6]=1
			caseVille.style = "outline: 1px solid green;"
		}
	});
}*/

// Verification du Num Siret Siren
function verifNumSiretSiren ()
{
	document.getElementById("inputNumSiretSiren").addEventListener("input", function (e) {
		var inputNumSiretSiren = e.target.value; // Valeur saisie dans le champ
		var Message = "";
		var Message2 = "";
		var couleurMsg = "red";
		var valideNumSiretSiren = 0;
		var caseNumSiretSiren = document.getElementById("inputNumSiretSiren");
		//valideNumSiretSiren=0 == chiffre ; valideNumSiretSiren=1 == lettre(s)
		for (compteur = 0 ; compteur<inputNumSiretSiren.length ; compteur ++)
		{
			if(isNaN(inputNumSiretSiren[compteur]))
			{
				valideNumSiretSiren = 1;
			}
		}    

		if ((inputNumSiretSiren.length!==14 && inputNumSiretSiren.length>0) || valideNumSiretSiren==1)
		{
			Message = "Numero Siret ou Siren invalide";
			couleurMsg = "red";     	
			caseNumSiretSiren.style = "outline: 1px solid red;"
			tabValidationValeur[8]=0
		}
		else if(inputNumSiretSiren.length==0)
		{
			caseNumSiretSiren.style = "outline: 1px solid red;"
			tabValidationValeur[8]=0
		} 
		else
		{
			caseNumSiretSiren.style = "outline: 1px solid green;"
			tabValidationValeur[8]=1
		
		}

		var aideNumSiretSirenElt = document.getElementById("alertNumSiretSiren");
		aideNumSiretSirenElt.textContent =  Message + Message2; // Texte de l'aide
		aideNumSiretSirenElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});

}

// Verification du nom de l'entreprise
function verifNomEntreprise ()
{
	document.getElementById("inputNomEntreprise").addEventListener("input", function (e) {
		var inputNomEntreprise = e.target.value; // Valeur saisie dans le champ
		var Message;
		var couleurMsg = "red";
		var caseNomEntreprise = document.getElementById("inputNomEntreprise");

		if (inputNomEntreprise.length<3)
		{
			caseNomEntreprise.style = "outline: 1px solid red;"
			tabValidationValeur[12]=0;
		}
		else
		{
			tabValidationValeur[12]=1;
			caseNomEntreprise.style = "outline: 1px solid green;"
		}	

		var aideNomElt = document.getElementById("alertNomEntreprise");
		aideNomElt.textContent =  Message; // Texte de l'aide
		aideNomElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
}

// Verification de l'Email
function verifEmail()
{
	document.getElementById("inputEmail").addEventListener("input", function (e) {
		var inputEmail = e.target.value; // Valeur saisie dans le champ
		var Message = "";
		var Message2 = "";
		var couleurMsg = "red";
		var caseEmail = document.getElementById("inputEmail"); 

		if(inputEmail.length<8)
		{
			caseEmail.style = "outline: 1px solid red;"
			tabValidationValeur[9]=0;
		} 
		else
		{
			caseEmail.style = "outline: 1px solid green;"
			tabValidationValeur[9]=1;
		
		}

		var aideEmailElt = document.getElementById("alertEmail");
		aideEmailElt.textContent =  Message + Message2; // Texte de l'aide
		aideEmailElt.style.color = couleurMsg; // Couleur du texte de l'aide
	});
}

// V�rification de la longueur du mot de passe saisi
function verifMotDePasse(){
	document.getElementById("inputMotDePasse").addEventListener("input", function (e) {
		var inputMotDePasse = e.target.value; // Valeur saisie dans le champ inputMotDePasse
		var longueurMdp = "faible";
		var couleurMsg = "red"; // Longueur faible => couleur rouge
		var caseMotDePasse = document.getElementById("inputMotDePasse"); 
		
		tabValidationValeur[10]=0
		if (inputMotDePasse.length >= 12) {
			longueurMdp = "suffisante";
			couleurMsg = "green"; // Longueur suffisante => couleur verte
			tabValidationValeur[10]=1;
			caseMotDePasse.style = "outline: 1px solid green;"
		} else if (inputMotDePasse.length >= 8) {
			longueurMdp = "moyenne";
			couleurMsg = "orange"; // Longueur moyenne => couleur orange
			tabValidationValeur[10]=1;
			caseMotDePasse.style = "outline: 1px solid orange;"
		}
		else if (inputMotDePasse.length <8){
			caseMotDePasse.style = "outline: 1px solid red;"
		}
		var aideMdpElt = document.getElementById("aideMdp");
		aideMdpElt.textContent = "Longueur : " + longueurMdp; // Texte de l'aide
		aideMdpElt.style.color = couleurMsg; // Couleur du texte de l'aide*/
	});
}

//Verification de la confirmation de mot de Passe
function verifMotDePasseConfirm(){
	document.getElementById("inputMotDePasseConfirm").addEventListener("input", function (e) {
		var inputMotDePasseConfirm = e.target.value; // Valeur saisie dans le champ inputMotDePasseConfirm
		var inputMotDePasse=document.getElementById("inputMotDePasse").value;
		var couleurMsg;
		var correspondanceMdp;
		var caseMotDePasseConfirm = document.getElementById("inputMotDePasseConfirm"); 

		if (inputMotDePasseConfirm == null)
		{
			correspondanceMdp = "Vide";
			couleurMsg = "black";
			tabValidationValeur[11]=0
			caseMotDePasseConfirm.style = "outline: 1px solid red;" 
		}
		if (inputMotDePasseConfirm == inputMotDePasse) {
			correspondanceMdp = "Les mots de passes correspondent";
			couleurMsg = "green";
			tabValidationValeur[11]=1
			caseMotDePasseConfirm.style = "outline: 1px solid green;" 
		} else {
			correspondanceMdp = "Les mots de passes ne correspondent pas";
			couleurMsg = "red";
			tabValidationValeur[11]=0
			caseMotDePasseConfirm.style = "outline: 1px solid red;" 
		}
		var aideMdpElt = document.getElementById("aideMdpConfirm");
		aideMdpElt.textContent = correspondanceMdp; // Texte de l'aide
		aideMdpElt.style.color = couleurMsg; // Couleur du texte de l'aide*/
	});
}


//Entourer un element en rouge lorsque la case est vide + alerte du nombre de case vides
function check(element) {
	if (!element.value && element!==inputAdresse2 && element!== inputNumFix)
	{
		element.style = "outline: 1px solid red;"
	}
	/*else
	{
		if(element!==codePostalEntree || element!==emailEntree || element!==adresse1Entree || element!==adresse2Entree || element!==villeEntree || element!==nomEntree || element!==prenomEntree)
		{
			element.style = "outline: 1px solid green;"
		}
	}*/

}

//Verification onKeyUp
function verifChamp(element){
	check(element);
	verifPrenom();
	verifNom();
	verifNumPort();
	verifNumFix();
	verifAdresse();
	verifAdresse2();
	if (element==inputCodePostal)	verifCodePostal();
	//verifVille();
	verifNumSiretSiren();
	verifNomEntreprise ();
	verifEmail();
	verifMotDePasse();
	verifMotDePasseConfirm();

	validation();
}

//Verification champs vides
function validerInscription() {
		if(!inputPrenom.value)
	{
		nbInputVide++;
		inputPrenom.style = "border : 2px solid red;"
	}
		if(!inputNom.value)
	{
		nbInputVide++;
		inputNom.style = "border : 2px solid red;"
	}
		if(!inputNumPort.value)
	{
		nbInputVide++;
		inputNumPort.style = "border : 2px solid red;"
	}
		if(!inputAdresse.value)
	{
		nbInputVide++;
		inputAdresse.style = "border : 2px solid red;"
	}
		if(!inputVille.value)
	{
		nbInputVide++;
		inputVille.style = "border : 2px solid red;"
	}
		if(!inputCodePostal.value)
	{
		nbInputVide++;
		inputCodePostal.style = "border : 2px solid red;"
	}
		if(!inputNumSiretSiren.value)
	{
		nbInputVide++;
		inputNumSiretSiren.style = "border : 2px solid red;"
	}
		if(!inputEmail.value)
	{
		nbInputVide++;
		//inputEmail.style = "border : 2px solid red;"
	}
		if(!inputMotDePasse.value)
	{
		nbInputVide++;
		inputMotDePasse.style = "border : 2px solid red;"
	}
		if(!inputMotDePasseConfirm.value)
	{
		nbInputVide++;
		inputMotDePasseConfirm.style = "border : 2px solid red;"
	}	
		if(nbInputVide>0)
	{
		alert(nbInputVide+" champ(s) vide(s)");
	}
	nbInputVide=0;

}

function validation(){
		var validation=1
		for(var compteur = 0 ; compteur < 13 ; compteur++)
		{
			if(tabValidationValeur[3]==0 || tabValidationValeur[5]==0)
			{

			}
			else if(tabValidationValeur[compteur]==0)
			{
				validation=0
			}
		}

		if (validation==1)
		{
			document.getElementById('submitButton').disabled = '';
		}
		else
		{
			document.getElementById('submitButton').disabled = 'disabled';
		}
	}

	
