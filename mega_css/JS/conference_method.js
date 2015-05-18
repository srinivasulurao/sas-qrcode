var siteurl="http://appddictionstudio.biz/conferencecms";


// replace characters
function convertPipedToHtmlChar(str)
{
	// ------------ PHP EXAMPLE -----------------
	//$search  = array(
	//'||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
	//'||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
	//'||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
	//'||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
	//'||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
	//'||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
	//'||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||', 
	//'||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
	//'||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
	//'||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
	//'||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
	//'||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
	//'||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
	//'||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
	//);

	//$replace = array(
	//'&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
	//'&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
	//'&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
	//'&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
	//'&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
	//'&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
	//'&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
	//'&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
	//'&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
	//'&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;', 
	//'&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
	//'&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
	//'&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
	//'&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
	//);
	// ----------------- PHP EXAMPLE ----------------
	
	//alert(str);
	var res = str;
	
	// row 1
	// '||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
	// '&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
	res = res.replace("||A11||", "&#xC0;");
	res = res.replace("||a22||", "&#xE0;");
	res = res.replace("||Ac1||", "&#xC1;");
	res = res.replace("||ae1||", "&#xE1;");
	res = res.replace("||Ac2||", "&#xC2;");
	
	// row 2
	// '||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
	// '&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
	res = res.replace("||ae2||", "&#xE2;");
	res = res.replace("||Ac3||", "&#xC3;");
	res = res.replace("||ae3||", "&#xE3;");
	res = res.replace("||Ac4||", "&#xC4;");
	res = res.replace("||ae4||", "&#xE4;");
	
	// row 3
	// '||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
	// '&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
	res = res.replace("||Ac5||", "&#xC5;");
	res = res.replace("||ae5||", "&#xE5;");
	res = res.replace("||Ac6||", "&#xC6;");
	res = res.replace("||ae6||", "&#xE6;");
	res = res.replace("||Cc7||", "&#xC7;");
	
	// row 4
	// '||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
	// '&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
	res = res.replace("||ce7||", "&#xE7;");
	res = res.replace("||Ec8||", "&#xC8;");
	res = res.replace("||ee8||", "&#xE8;");
	res = res.replace("||Ec9||", "&#xC9;");
	res = res.replace("||ee9||", "&#xE9;");
	
	// row 5
	// '||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
	// '&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
	res = res.replace("||Eca||", "&#xCA;");
	res = res.replace("||eea||", "&#xEA;");
	res = res.replace("||Ecb||", "&#xCB;");
	res = res.replace("||eeb||", "&#xEB;");
	res = res.replace("||Icc||", "&#xCC;");
	
	// row 6
	// '||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
	// '&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
	res = res.replace("||iec||", "&#xEC;");
	res = res.replace("||Icd||", "&#xCD;");
	res = res.replace("||ied||", "&#xED;");
	res = res.replace("||Ice||", "&#xCE;");
	res = res.replace("||iee||", "&#xEE;");
	
	// row 7
	// '||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||',
	// '&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
	res = res.replace("||Icf||", "&#xCF;");
	res = res.replace("||ief||", "&#xEF;");
	res = res.replace("||Nd1||", "&#xD1;");
	res = res.replace("||nf1||", "&#xF1;");
	res = res.replace("||Od2||", "&#xD2;");
	
	// row 8
	// '||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
	// '&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
	res = res.replace("||of2||", "&#xF2;");
	res = res.replace("||Od3||", "&#xD3;");
	res = res.replace("||of3||", "&#xF3;");
	res = res.replace("||Od4||", "&#xD4;");
	res = res.replace("||of4||", "&#xF4;");
	
	// row 9
	// '||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
	// '&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
	res = res.replace("||Od5||", "&#xD5;");
	res = res.replace("||of5||", "&#xF5;");
	res = res.replace("||Od6||", "&#xD6;");
	res = res.replace("||of6||", "&#xF6;");
	res = res.replace("||Od8||", "&#xD8;");
	
	// row 10
	// '||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
	// '&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;',
	res = res.replace("||of8||", "&#xF8;");
	res = res.replace("||S8a||", "&#x8A;");
	res = res.replace("||s9a||", "&#x9A;");
	res = res.replace("||Ud9||", "&#xD9;");
	res = res.replace("||uf9||", "&#xF9;");
	
	// row 11
	// '||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
	// '&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
	res = res.replace("||Uda||", "&#xDA;");
	res = res.replace("||ufa||", "&#xFA;");
	res = res.replace("||Udb||", "&#xDB;");
	res = res.replace("||ufb||", "&#xFB;");
	res = res.replace("||Udc||", "&#xDC;");
	
	// row 12
	// '||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
	// '&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
	res = res.replace("||ufc||", "&#xFC;");
	res = res.replace("||Y9f||", "&#x9F;");
	res = res.replace("||yff||", "&#xFF;");
	res = res.replace("||Ydd||", "&#xDD;");
	res = res.replace("||yfd||", "&#xFD;");
	
	// row 13
	// '||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
	// '&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
	res = res.replace("||Z8e||", "&#x8E;");
	res = res.replace("||z9e||", "&#x9E;");
	res = res.replace("||!a1||", "&#xA1;");
	res = res.replace("||?bf||", "&#xBF;");
	res = res.replace("||OE8c||", "&#x8C;");
	
	// row 14
	// '||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
	// '&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
	res = res.replace("||oe9c||", "&#x9C;");
	res = res.replace("||Dd0||", "&#xD0;");
	res = res.replace("||df0||", "&#xF0;");
	res = res.replace("||Pde||", "&#xDE;");
	res = res.replace("||pfe||", "&#xFE;");
	//res = res.replace("||ox151||", "&#x151;");
	
	
	//return res;
	document.write(res);
	
	
}

// replace characters
function returnPipedToRealChar(str)
{
	// ------------ PHP EXAMPLE -----------------
	//$search  = array(
	//'||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
	//'||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
	//'||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
	//'||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
	//'||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
	//'||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
	//'||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||', 
	//'||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
	//'||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
	//'||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
	//'||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
	//'||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
	//'||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
	//'||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
	//);

	//$replace = array(
	//'&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
	//'&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
	//'&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
	//'&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
	//'&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
	//'&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
	//'&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
	//'&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
	//'&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
	//'&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;', 
	//'&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
	//'&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
	//'&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
	//'&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
	//);
	// ----------------- PHP EXAMPLE ----------------
	
	//alert(str);
	var res = str;
	
	// row 1
	// '||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
	// '&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
	res = res.replace("||A11||", "À");
	res = res.replace("||a22||", "à");
	res = res.replace("||Ac1||", "Á");
	res = res.replace("||ae1||", "á");
	res = res.replace("||Ac2||", "Â");
	
	// row 2
	// '||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
	// '&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
	res = res.replace("||ae2||", "â");
	res = res.replace("||Ac3||", "Ã");
	res = res.replace("||ae3||", "ã");
	res = res.replace("||Ac4||", "Ä");
	res = res.replace("||ae4||", "ä");
	
	// row 3
	// '||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
	// '&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
	res = res.replace("||Ac5||", "Å");
	res = res.replace("||ae5||", "å");
	res = res.replace("||Ac6||", "Æ");
	res = res.replace("||ae6||", "æ");
	res = res.replace("||Cc7||", "Ç");
	
	// row 4
	// '||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
	// '&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
	res = res.replace("||ce7||", "ç");
	res = res.replace("||Ec8||", "È");
	res = res.replace("||ee8||", "è");
	res = res.replace("||Ec9||", "É");
	res = res.replace("||ee9||", "é");
	
	// row 5
	// '||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
	// '&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
	res = res.replace("||Eca||", "Ê");
	res = res.replace("||eea||", "ê");
	res = res.replace("||Ecb||", "Ë");
	res = res.replace("||eeb||", "ë");
	res = res.replace("||Icc||", "Ì");
	
	// row 6
	// '||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
	// '&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
	res = res.replace("||iec||", "ì");
	res = res.replace("||Icd||", "Í");
	res = res.replace("||ied||", "í");
	res = res.replace("||Ice||", "Î");
	res = res.replace("||iee||", "î");
	
	// row 7
	// '||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||',
	// '&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
	res = res.replace("||Icf||", "Ï");
	res = res.replace("||ief||", "ï");
	res = res.replace("||Nd1||", "Ñ");
	res = res.replace("||nf1||", "ñ");
	res = res.replace("||Od2||", "Ò");
	
	// row 8
	// '||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
	// '&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
	res = res.replace("||of2||", "ò");
	res = res.replace("||Od3||", "Ó");
	res = res.replace("||of3||", "ó");
	res = res.replace("||Od4||", "Ô");
	res = res.replace("||of4||", "ô");
	
	// row 9
	// '||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
	// '&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
	res = res.replace("||Od5||", "Õ");
	res = res.replace("||of5||", "õ");
	res = res.replace("||Od6||", "Ö");
	res = res.replace("||of6||", "ö");
	res = res.replace("||Od8||", "Ø");
	
	// row 10
	// '||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
	// '&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;',
	res = res.replace("||of8||", "ø");
	res = res.replace("||S8a||", "Š");
	res = res.replace("||s9a||", "š");
	res = res.replace("||Ud9||", "Ù");
	res = res.replace("||uf9||", "ù");
	
	// row 11
	// '||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
	// '&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
	res = res.replace("||Uda||", "Ú");
	res = res.replace("||ufa||", "ú");
	res = res.replace("||Udb||", "Û");
	res = res.replace("||ufb||", "û");
	res = res.replace("||Udc||", "Ü");
	
	// row 12
	// '||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
	// '&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
	res = res.replace("||ufc||", "ü");
	res = res.replace("||Y9f||", "Ÿ");
	res = res.replace("||yff||", "ÿ");
	res = res.replace("||Ydd||", "Ý");
	res = res.replace("||yfd||", "ý");
	
	// row 13
	// '||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
	// '&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
	res = res.replace("||Z8e||", "Ž");
	res = res.replace("||z9e||", "ž");
	res = res.replace("||!a1||", "¡");
	res = res.replace("||?bf||", "¿");
	res = res.replace("||OE8c||", "Œ");
	
	// row 14
	// '||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
	// '&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
	res = res.replace("||oe9c||", "œ");
	res = res.replace("||Dd0||", "Ð");
	res = res.replace("||df0||", "ð");
	res = res.replace("||Pde||", "Þ");
	res = res.replace("||pfe||", "þ");
	//res = res.replace("||ox151||", "o");
	
	
	return res;
	//document.write(res);
	
	
}

function replaceFormCharWithPipe(form){

	// run this for text input
    $('form input[type="text"]').each(function(){
		
		var res = this.value;
		
		//.replace(/,/g, '&#44;');
		//do string conversion
		
		// row 1
		// '||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
		// '&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
		res = res.replace("À", "||A11||");
		res = res.replace("à", "||a22||");
		res = res.replace("Á", "||Ac1||");
		res = res.replace("á", "||ae1||");
		res = res.replace("Â", "||Ac2||");
		
		// row 2
		// '||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
		// '&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
		res = res.replace("â", "||ae2||");
		res = res.replace("Ã", "||Ac3||");
		res = res.replace("ã", "||ae3||");
		res = res.replace("Ä", "||Ac4||");
		res = res.replace("ä", "||ae4||");
		
		// row 3
		// '||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
		// '&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
		res = res.replace("Å", "||Ac5||");
		res = res.replace("å", "||ae5||");
		res = res.replace("Æ", "||Ac6||");
		res = res.replace("æ", "||ae6||");
		res = res.replace("Ç", "||Cc7||");
		
		// row 4
		// '||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
		// '&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
		res = res.replace("ç", "||ce7||");
		res = res.replace("È", "||Ec8||");
		res = res.replace("è", "||ee8||");
		res = res.replace("É", "||Ec9||");
		res = res.replace("é", "||ee9||");
		
		// row 5
		// '||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
		// '&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
		res = res.replace("Ê", "||Eca||");
		res = res.replace("ê", "||eea||");
		res = res.replace("Ë", "||Ecb||");
		res = res.replace("ë", "||eeb||");
		res = res.replace("Ì", "||Icc||");
		
		// row 6
		// '||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
		// '&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
		res = res.replace("ì", "||iec||");
		res = res.replace("Í", "||Icd||");
		res = res.replace("í", "||ied||");
		res = res.replace("Î", "||Ice||");
		res = res.replace("î", "||iee||");
		
		// row 7
		// '||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||',
		// '&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
		res = res.replace("Ï", "||Icf||");
		res = res.replace("ï", "||ief||");
		res = res.replace("Ñ", "||Nd1||");
		res = res.replace("ñ", "||nf1||");
		res = res.replace("Ò", "||Od2||");
		
		// row 8
		// '||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
		// '&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
		res = res.replace("ò", "||of2||");
		res = res.replace("Ó", "||Od3||");
		res = res.replace("ó", "||of3||");
		res = res.replace("Ô", "||Od4||");
		res = res.replace("ô", "||of4||");
		
		// row 9
		// '||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
		// '&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
		res = res.replace("Õ", "||Od5||");
		res = res.replace("õ", "||of5||");
		res = res.replace("Ö", "||Od6||");
		res = res.replace("ö", "||of6||");
		res = res.replace("Ø", "||Od8||");
		
		// row 10
		// '||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
		// '&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;',
		res = res.replace("ø", "||of8||");
		res = res.replace("Š", "||S8a||");
		res = res.replace("š", "||s9a||");
		res = res.replace("Ù", "||Ud9||");
		res = res.replace("ù", "||uf9||");
		
		// row 11
		// '||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
		// '&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
		res = res.replace("Ú", "||Uda||");
		res = res.replace("ú", "||ufa||");
		res = res.replace("Û", "||Udb||");
		res = res.replace("û", "||ufb||");
		res = res.replace("Ü", "||Udc||");
		
		// row 12
		// '||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
		// '&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
		res = res.replace("ü", "||ufc||");
		res = res.replace("Ÿ", "||Y9f||");
		res = res.replace("ÿ", "||yff||");
		res = res.replace("Ý", "||Ydd||");
		res = res.replace("ý", "||yfd||");
		
		// row 13
		// '||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
		// '&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
		res = res.replace("Ž", "||Z8e||");
		res = res.replace("ž", "||z9e||");
		res = res.replace("¡", "||!a1||");
		res = res.replace("¿", "||?bf||");
		res = res.replace("Œ", "||OE8c||");
		
		// row 14
		// '||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
		// '&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
		res = res.replace("œ", "||oe9c||");
		res = res.replace("Ð", "||Dd0||");
		res = res.replace("ð", "||df0||");
		res = res.replace("Þ", "||Pde||");
		res = res.replace("þ", "||pfe||");
		//res = res.replace("||ox151||", "o");
		
        this.value = res;
    });
	
	// run this for textarea fields
	$('form textarea').each(function(){
		
		var res = this.value;
		
		//.replace(/,/g, '&#44;');
		//do string conversion
		
		// row 1
		// '||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
		// '&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
		res = res.replace("À", "||A11||");
		res = res.replace("à", "||a22||");
		res = res.replace("Á", "||Ac1||");
		res = res.replace("á", "||ae1||");
		res = res.replace("Â", "||Ac2||");
		
		// row 2
		// '||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
		// '&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
		res = res.replace("â", "||ae2||");
		res = res.replace("Ã", "||Ac3||");
		res = res.replace("ã", "||ae3||");
		res = res.replace("Ä", "||Ac4||");
		res = res.replace("ä", "||ae4||");
		
		// row 3
		// '||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
		// '&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
		res = res.replace("Å", "||Ac5||");
		res = res.replace("å", "||ae5||");
		res = res.replace("Æ", "||Ac6||");
		res = res.replace("æ", "||ae6||");
		res = res.replace("Ç", "||Cc7||");
		
		// row 4
		// '||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
		// '&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
		res = res.replace("ç", "||ce7||");
		res = res.replace("È", "||Ec8||");
		res = res.replace("è", "||ee8||");
		res = res.replace("É", "||Ec9||");
		res = res.replace("é", "||ee9||");
		
		// row 5
		// '||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
		// '&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
		res = res.replace("Ê", "||Eca||");
		res = res.replace("ê", "||eea||");
		res = res.replace("Ë", "||Ecb||");
		res = res.replace("ë", "||eeb||");
		res = res.replace("Ì", "||Icc||");
		
		// row 6
		// '||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
		// '&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
		res = res.replace("ì", "||iec||");
		res = res.replace("Í", "||Icd||");
		res = res.replace("í", "||ied||");
		res = res.replace("Î", "||Ice||");
		res = res.replace("î", "||iee||");
		
		// row 7
		// '||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||',
		// '&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
		res = res.replace("Ï", "||Icf||");
		res = res.replace("ï", "||ief||");
		res = res.replace("Ñ", "||Nd1||");
		res = res.replace("ñ", "||nf1||");
		res = res.replace("Ò", "||Od2||");
		
		// row 8
		// '||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
		// '&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
		res = res.replace("ò", "||of2||");
		res = res.replace("Ó", "||Od3||");
		res = res.replace("ó", "||of3||");
		res = res.replace("Ô", "||Od4||");
		res = res.replace("ô", "||of4||");
		
		// row 9
		// '||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
		// '&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
		res = res.replace("Õ", "||Od5||");
		res = res.replace("õ", "||of5||");
		res = res.replace("Ö", "||Od6||");
		res = res.replace("ö", "||of6||");
		res = res.replace("Ø", "||Od8||");
		
		// row 10
		// '||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
		// '&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;',
		res = res.replace("ø", "||of8||");
		res = res.replace("Š", "||S8a||");
		res = res.replace("š", "||s9a||");
		res = res.replace("Ù", "||Ud9||");
		res = res.replace("ù", "||uf9||");
		
		// row 11
		// '||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
		// '&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
		res = res.replace("Ú", "||Uda||");
		res = res.replace("ú", "||ufa||");
		res = res.replace("Û", "||Udb||");
		res = res.replace("û", "||ufb||");
		res = res.replace("Ü", "||Udc||");
		
		// row 12
		// '||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
		// '&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
		res = res.replace("ü", "||ufc||");
		res = res.replace("Ÿ", "||Y9f||");
		res = res.replace("ÿ", "||yff||");
		res = res.replace("Ý", "||Ydd||");
		res = res.replace("ý", "||yfd||");
		
		// row 13
		// '||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
		// '&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
		res = res.replace("Ž", "||Z8e||");
		res = res.replace("ž", "||z9e||");
		res = res.replace("¡", "||!a1||");
		res = res.replace("¿", "||?bf||");
		res = res.replace("Œ", "||OE8c||");
		
		// row 14
		// '||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
		// '&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
		res = res.replace("œ", "||oe9c||");
		res = res.replace("Ð", "||Dd0||");
		res = res.replace("ð", "||df0||");
		res = res.replace("Þ", "||Pde||");
		res = res.replace("þ", "||pfe||");
		//res = res.replace("||ox151||", "o");
		
        this.value = res;
    });
	
}

function convertPipedToRealChar(str)
{
	// ------------ PHP EXAMPLE -----------------
	//$search  = array(
	//'||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
	//'||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
	//'||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
	//'||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
	//'||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
	//'||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
	//'||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||', 
	//'||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
	//'||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
	//'||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
	//'||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
	//'||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
	//'||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
	//'||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
	//);

	//$replace = array(
	//'&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
	//'&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
	//'&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
	//'&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
	//'&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
	//'&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
	//'&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
	//'&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
	//'&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
	//'&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;', 
	//'&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
	//'&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
	//'&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
	//'&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
	//);
	// ----------------- PHP EXAMPLE ----------------
	
	//alert(str);
	var res = str;
	
	//.replace(/,/g, '&#44;');
	//do string conversion
	
	// row 1
	// '||A11||', '||a22||', '||Ac1||', '||ae1||', '||Ac2||',
	// '&#xC0;', '&#xE0;', '&#xC1;', '&#xE1;', '&#xC2;', 
	res = res.replace("||A11||", "À");
	res = res.replace("||a22||", "à");
	res = res.replace("||Ac1||", "Á");
	res = res.replace("||ae1||", "á");
	res = res.replace("||Ac2||", "Â");
	
	// row 2
	// '||ae2||', '||Ac3||', '||ae3||', '||Ac4||', '||ae4||',
	// '&#xE2;', '&#xC3;', '&#xE3;', '&#xC4;', '&#xE4;',
	res = res.replace("||ae2||", "â");
	res = res.replace("||Ac3||", "Ã");
	res = res.replace("||ae3||", "ã");
	res = res.replace("||Ac4||", "Ä");
	res = res.replace("||ae4||", "ä");
	
	// row 3
	// '||Ac5||', '||ae5||', '||Ac6||', '||ae6||', '||Cc7||',
	// '&#xC5;', '&#xE5;', '&#xC6;', '&#xE6;', '&#xC7;', 
	res = res.replace("||Ac5||", "Å");
	res = res.replace("||ae5||", "å");
	res = res.replace("||Ac6||", "Æ");
	res = res.replace("||ae6||", "æ");
	res = res.replace("||Cc7||", "Ç");
	
	// row 4
	// '||ce7||', '||Ec8||', '||ee8||', '||Ec9||', '||ee9||',
	// '&#xE7;', '&#xC8;', '&#xE8;', '&#xC9;', '&#xE9;', 
	res = res.replace("||ce7||", "ç");
	res = res.replace("||Ec8||", "È");
	res = res.replace("||ee8||", "è");
	res = res.replace("||Ec9||", "É");
	res = res.replace("||ee9||", "é");
	
	// row 5
	// '||Eca||', '||eea||', '||Ecb||', '||eeb||', '||Icc||', 
	// '&#xCA;', '&#xEA;', '&#xCB;', '&#xEB;', '&#xCC;', 
	res = res.replace("||Eca||", "Ê");
	res = res.replace("||eea||", "ê");
	res = res.replace("||Ecb||", "Ë");
	res = res.replace("||eeb||", "ë");
	res = res.replace("||Icc||", "Ì");
	
	// row 6
	// '||iec||', '||Icd||', '||ied||', '||Ice||', '||iee||',
	// '&#xEC;', '&#xCD;', '&#xED;', '&#xCE;', '&#xEE;', 
	res = res.replace("||iec||", "ì");
	res = res.replace("||Icd||", "Í");
	res = res.replace("||ied||", "í");
	res = res.replace("||Ice||", "Î");
	res = res.replace("||iee||", "î");
	
	// row 7
	// '||Icf||', '||ief||', '||Nd1||', '||nf1||', '||Od2||',
	// '&#xCF;', '&#xEF;', '&#xD1;', '&#xF1;', '&#xD2;', 
	res = res.replace("||Icf||", "Ï");
	res = res.replace("||ief||", "ï");
	res = res.replace("||Nd1||", "Ñ");
	res = res.replace("||nf1||", "ñ");
	res = res.replace("||Od2||", "Ò");
	
	// row 8
	// '||of2||', '||Od3||', '||of3||', '||Od4||', '||of4||', 
	// '&#xF2;', '&#xD3;', '&#xF3;', '&#xD4;', '&#xF4;', 
	res = res.replace("||of2||", "ò");
	res = res.replace("||Od3||", "Ó");
	res = res.replace("||of3||", "ó");
	res = res.replace("||Od4||", "Ô");
	res = res.replace("||of4||", "ô");
	
	// row 9
	// '||Od5||', '||of5||', '||Od6||', '||of6||', '||Od8||',
	// '&#xD5;', '&#xF5;', '&#xD6;', '&#xF6;', '&#xD8;',
	res = res.replace("||Od5||", "Õ");
	res = res.replace("||of5||", "õ");
	res = res.replace("||Od6||", "Ö");
	res = res.replace("||of6||", "ö");
	res = res.replace("||Od8||", "Ø");
	
	// row 10
	// '||of8||', '||S8a||', '||s9a||', '||Ud9||', '||uf9||', 
	// '&#xF8;', '&#x8A;', '&#x9A;', '&#xD9;', '&#xF9;',
	res = res.replace("||of8||", "ø");
	res = res.replace("||S8a||", "Š");
	res = res.replace("||s9a||", "š");
	res = res.replace("||Ud9||", "Ù");
	res = res.replace("||uf9||", "ù");
	
	// row 11
	// '||Uda||', '||ufa||', '||Udb||', '||ufb||', '||Udc||', 
	// '&#xDA;', '&#xFA;', '&#xDB;', '&#xFB;', '&#xDC;',
	res = res.replace("||Uda||", "Ú");
	res = res.replace("||ufa||", "ú");
	res = res.replace("||Udb||", "Û");
	res = res.replace("||ufb||", "û");
	res = res.replace("||Udc||", "Ü");
	
	// row 12
	// '||ufc||', '||Y9f||', '||yff||', '||Ydd||', '||yfd||', 
	// '&#xFC;', '&#x9F;', '&#xFF;', '&#xDD;', '&#xFD;', 
	res = res.replace("||ufc||", "ü");
	res = res.replace("||Y9f||", "Ÿ");
	res = res.replace("||yff||", "ÿ");
	res = res.replace("||Ydd||", "Ý");
	res = res.replace("||yfd||", "ý");
	
	// row 13
	// '||Z8e||', '||z9e||', '||!a1||', '||?bf||', '||OE8c||', 
	// '&#x8E;', '&#x9E;', '&#xA1;', '&#xBF;', '&#x8C;', 
	res = res.replace("||Z8e||", "Ž");
	res = res.replace("||z9e||", "ž");
	res = res.replace("||!a1||", "¡");
	res = res.replace("||?bf||", "¿");
	res = res.replace("||OE8c||", "Œ");
	
	// row 14
	// '||oe9c||', '||Dd0||', '||df0||','||Pde||', '||pfe||', '||ox151||'
	// '&#x9C;', '&#xD0;', '&#xF0;', '&#xDE;', '&#xFE;', '&#x151;'
	res = res.replace("||oe9c||", "œ");
	res = res.replace("||Dd0||", "Ð");
	res = res.replace("||df0||", "ð");
	res = res.replace("||Pde||", "Þ");
	res = res.replace("||pfe||", "þ");
	//res = res.replace("||ox151||", "o");
	
	
	//return res;
	document.write(res);
	
	
}


function tableCls()
{
	oTable = $('#example').dataTable({
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"aoColumnDefs": [{"bSortable": false, "aTargets":[6] }],
				"aaSorting":[[0,"desc"]]
			});
}

function changeall(obj)
{
	if($('#checkforall').attr('checked'))
	{
		$('.dayCheck').attr('checked','checked');
	}
	else
	{
		$('.dayCheck').removeAttr('checked');
	}
}

function saveImage_()
{
	var angVal=$("#angVal").val();
	var imageName=$("#imageName").val();
	$.post(siteurl+"/admin/resizeImage",{imageName:imageName,angVal:angVal},
			function(data)
			{
				alert(data);
			});
}

function addAng_()
{
	var angVal=$("#angVal").val();
	newAng= Number(angVal)+90;
	$("#angVal").val(newAng);
}
function subAng_()
{
	var angVal=$("#angVal").val();
	newAng= Number(angVal)-90;
	$("#angVal").val(newAng)
}
function DeleteRecord(webService,RecID,Redirection,info){
if (confirm('are you sure! want to delete?')) { 	
 	$.post(siteurl+'/conference/'+webService,{RecID:RecID},function(data){ 		
		alert('Record Delete Successfully...');
		if(Redirection!="" && info==""){
			window.location=siteurl+'/conference/'+Redirection;	
		}else if(Redirection!="" && info!=""){
			window.location=siteurl+'/conference/'+Redirection+"/"+info;	
		}else{
			
		}
		
	});
}
}
//========================method===================
function saveConference()
{
	var con_name=$("#con_name").val();
	var recID=$("#recID").val();
	var selShow=$("#selShow").val();
	
	if(con_name!="" && selShow!=""){
		$.post(siteurl+'/conference/saveConference',{con_name:con_name,recID:recID,selShow:selShow},function(data){ 
			var result=$.parseJSON(data);
			
			if(result.success==true){
				//alert(result.msg);
				//window.location=siteurl+'/conference/index';
			}else{
				alert(result.msg);
			}
		});	
	}else{
		alert('Please Eneter conference Name OR Show');
	}
	
}
function saveConferenceSetting()
{

    saveConference();
	var conf_id=$("#conf_id").val();
	var recID=$("#recID").val();
	var logo=$("#logo").val();
	var bgImage=$("#bgImage").val();
	
	var data = new FormData();
	var logoTagName="logo";
	if(logo!=""){		
		jQuery.each($("#tdLogoImage input[type='file']"), function(i, file) {
			logoTagName=file.id;
			jQuery.each($("#tdLogoImage input[type='file']")[i].files, function(j, file) {				
				data.append(logoTagName, file);	
			});
		});
	}
	var BgImageTagName="bgImage";
	if(bgImage!=""){		
		jQuery.each($("#tdBgImage input[type='file']"), function(i, file) {
			BgImageTagName=file.id;
			
			jQuery.each($("#tdBgImage input[type='file']")[i].files, function(j, file2) {				
				data.append(BgImageTagName, file2);	
			});
		});
	}
		
	if(conf_id!=""){
		data.append('conf_id', conf_id);	
		data.append('recID', recID);	

		$.ajax({
		url: siteurl+'/conference/saveConferenceSetting',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			console.log(res);
			var result=$.parseJSON(res);
			
			if(result.success==true){
				alert(result.msg);
				window.location='';
			}else{
				alert(result.msg);
			}
		}
		});
		
	}else{
		alert('Please Select conference Name');
	}
	
}


function SaveConModules(){
var modules=[];
$("#sortable2").children().each(function(i,item){		
	modules.push($(item).attr('id'));
});
var conf_id=$("#conf_id").val();
var Error="";

if(conf_id==""){Error+="Please Select Conference Name \n";}
if(modules.length==0){Error+="Please Select Atleast on Module \n";}

if(Error==""){
	
$.post(siteurl+'/conference/saveConferenceModule',{con_name:conf_id,Modules:modules},function(data){ 
	var result=$.parseJSON(data);
	alert(result.msg);
	if(result.success==true){		
		window.location=siteurl+'/conference/ConModuleViewSetting/'+conf_id;
	}
});

}else{
	alert(Error);
}


}

function OnSelectConference(Obj){
	if(Obj.value!=""){
		window.location=siteurl+'/conference/ConModuleViewSetting/'+Obj.value;
	}else{
		window.location=siteurl+'/conference/ConModuleViewSetting/';
	}
}

function SaveOverviewData(){
	
	var overview_title=$("#overview_title").val();
	var overview_text=$("#overview_text").val();	
	var recID=$("#recID").val();
	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	$.post(siteurl+'/conference/saveMod_Overview',{overview_title:overview_title,overview_text:overview_text,recID:recID,ConferenceID:HdnConferenceID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
		}
	});
	
	
}
function DeleteOverviewData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_Overview',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}

function SaveSessionData(){
	
	var session_title=$("#session_title").val();
	var sessionType=$("#sessionType").val();
	var startDate=$("#startDate").val();
	var endDate=$("#endDate").val();
	var ShowType=$("#ShowType").val();
	var recID=$("#recID").val();
	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	$.post(siteurl+'/conference/saveMod_Session',{session_title:session_title,sessionType:sessionType,recID:recID,ConferenceID:HdnConferenceID,startDate:startDate,endDate:endDate,ShowType:ShowType},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
		}
	});
	
	
}
function DeleteSessionData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_Session',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}

function DeleteSessionPresenationData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_SessionPresentaion',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/presentation_'+SessionID;
		}
	});
}
}


function SaveSessionPresentatorData(){
	
	var Title=$("#Title").val();
	var Presenter=$("#Presenter").val();
	var Audience=$("#Audience").val();
	var Strand=$("#Strand").val();
	var Floor=$("#Floor").val();
	var Description=$("#Description").val();
	var handout_link=$("#handout_link").val();
	var Room=$("#Room").val();
	
	var recID=$("#recID").val();	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	var SessionID=$("#HdnSessionID").val();
	
	
	$.post(siteurl+'/conference/saveMod_SessionPresentaion',{Title:Title,Presenter:Presenter,recID:recID,Audience:Audience,Strand:Strand,Floor:Floor,Room:Room,Description:Description,handout_link:handout_link,SessionID:SessionID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){ 	
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/presentation_'+SessionID;
		}
	});
	
	
}

function saveSpeakerData()
{
	var speaker_name=$("#speaker_name").val();
	var about_speaker=$("#about_speaker").val();
	var spaeakerImage=$("#spaeakerImage").val();
	var hdnImage=$("#hdnImage").val();
	
	var recID=$("#recID").val();
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	
	var data = new FormData();
	var SpeakerImgTagName="spaeakerImage";
	if(spaeakerImage!=""){		
		jQuery.each($("#tdSpeaker input[type='file']"), function(i, file) {
			SpeakerImgTagName=file.id;
			jQuery.each($("#tdSpeaker input[type='file']")[i].files, function(j, file) {				
				data.append(SpeakerImgTagName, file);	
			});
		});
	}
	
		
	if(HdnConferenceID!=""){
		data.append('ConferenceID', HdnConferenceID);	
		data.append('recID', recID);
		data.append('ModuleID', HdnModuleID);
		data.append('AboutSpeaker', about_speaker);
		data.append('SpeakerName', speaker_name);
		data.append('hdnImage', hdnImage);
		
		$.ajax({
		url: siteurl+'/conference/saveMod_SpeakerData',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			//console.log(res); ManageModuleData/8/7/speaker_0
			var result=$.parseJSON(res);
			alert(result.msg);
			if(result.success==true){				
				window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/speaker_0';
			}
		}
		});
		
	}else{
		alert('Please Select conference Name');
	}
	
}

function DeleteSpeakerData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_SpeakerData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID+'/speaker_0';
		}
	});
}
}


function SaveKeynoteDetail(){
	var keynote_date=$("#keynote_date").val();
	var keynote_start_time=$("#keynote_start_time").val();
	var keynote_end_time=$("#keynote_end_time").val();
	var keynote_place=$("#keynote_place").val();
	
	var recID=$("#recID").val();
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	var SelSpeakerList=0;
	var keynote_address=0;
	
	$("[name^=SelSpeaker]").each(function () {
       if($(this).val()==""){
		 SelSpeakerList++;  
	   }
    });
	$("[name^=keynote_address]").each(function () {
       if($(this).val()==""){
		 keynote_address++;  
	   }
    });
	var Error="";
	
	if(keynote_date==""){Error+="Enter keynote date \n";}
	if(keynote_start_time==""){Error+="Enter keynote start time \n";}
	if(keynote_end_time==""){Error+="Enter keynote end time \n";}
	if(keynote_place==""){Error+="Enter keynote place \n";}
	if(keynote_address>0){Error+="Enter Keynote Address \n";}
	if(SelSpeakerList>0){Error+="Enter Speaker \n";}
	
	if(Error==""){		
		var datastring = $("#keynoteForm").serialize();
		$.ajax({
            type: "POST",
            url: siteurl+'/conference/saveMod_KeynoteData',
            data: datastring,
            dataType: "json",
            success: function(data) {
                //var result=$.parseJSON(data);
				//console.log(data);
				//var result=$.parseJSON(data);
				alert(data.msg);
				if(data.success==true){	 
					window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
				}
            },
            error: function(error){
				console.log(error);                  
            }
        });
		
	}else{
		alert(Error);	
	}

}

function DeleteKeynoteDetailInfo(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_KeynoteData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		console.log(result);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}
function saveKeynoteSessionData(){
	
	var SelSpeaker=$("#SelSpeaker").val();
	var keynote_session=$("#keynote_session").val();
	var startDate=$("#startDate").val();
	var endDate=$("#endDate").val();
	var keynote_session_detail=$("#keynote_session_detail").val();
	
	var recID=$("#recID").val();	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	var KeyNoteDetailID=$("#KeyNoteDetailID").val();
	
	
	$.post(siteurl+'/conference/saveMod_KeynoteSessionData',{SelSpeaker:SelSpeaker,keynote_session:keynote_session,startDate:startDate,endDate:endDate,keynote_session_detail:keynote_session_detail,recID:recID,KeyNoteDetailID:KeyNoteDetailID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){ 	
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/sessioninfo_'+KeyNoteDetailID;
		}
	});
	
	
}
function DeleteKeynoteSessionData(RecID,ModuleID,ConferenceID,keyDetailID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_KeynoteSessionData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);		
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID+'/sessioninfo_'+keyDetailID;
		}
	});
}
}



function SavePlannerData(){
	
	var planner_title=$("#planner_title").val();
	var planner_date=$("#planner_date").val();
	var planner_detail=$("#planner_detail").val();
	
	var recID=$("#recID").val();	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	$.post(siteurl+'/conference/saveMod_PlannerData',{planner_title:planner_title,planner_date:planner_date,recID:recID,ConferenceID:HdnConferenceID,planner_detail:planner_detail},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
		}
	});	
	
}
function DeletePlannerData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_PlannerData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);		
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}