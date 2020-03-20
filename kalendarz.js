function dzien()
	{
		var dzisiaj = new Date();
		
		var dzien = dzisiaj.getDate();
		var miesiac = dzisiaj.getMonth();
		if (miesiac<10) miesiac = "0"+miesiac;
		
		var rok = dzisiaj.getFullYear();
		
		document.getElementById("dzien").innerHTML =
		dzien+"."+miesiac+"."+rok;
		
		setTimeout("dzien()",1000);
	}