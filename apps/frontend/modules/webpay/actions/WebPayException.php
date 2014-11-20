<?php
/**
* Platba kartou přes bránu.
* GP webpay, 3-D secure
* 
* @author Petr Procházka http://petrp.cz petr@petrp.cz
* @copyright 2009 Petr Procházka
* @version 0.3
*/


/**
* Chyba od platební brány.
* 
* @todo kontrola navratovych kodu, jesti davaji smysl.
* @todo kontrola jestli je chyba urcena uzivately, nebo je to chyba implementace na serveru obchodnika, a v tom pripade vyhazovat normalni vyjimku
*/
class WebPayException extends RuntimeException
{
	
	/** @var string Slovní popis chyby, který je jednoznačně dán kombinací PRCODE a SRCODE. */
	private $resultText;
	
	/** @var int Udává primární návratový kód. */
	private $primaryCode;
	
	/** @var int Udává sekundární kód. */
	private $secondaryCode;
	
	/** @var WebPayResponse */
	private $response;
	
	/**
	* @param string Slovní popis chyby, který je jednoznačně dán kombinací PRCODE a SRCODE.
	* @param int Udává primární návratový kód.
	* @param int Udává sekundární kód.
	* @param WebPayResponse
	*/
	public function __construct($resultText, $primaryCode, $secondaryCode, WebPayResponse $response)
	{
		parent::__construct($resultText, $primaryCode);
		
		$this->resultText = $resultText;
		$this->primaryCode = $primaryCode;
		$this->secondaryCode = $secondaryCode;
		$this->response = $response;
	}
}