<?php

namespace Hcode;


class PageAdmin extends Page {


	public function __construct($opts = array(), $tpl_dir = "/views/admin/") {

		// Como esta herdando de Page, apenas usa o parent chamando o metodo construtor e passando as variaveis
		parent::__construct($opts, $tpl_dir);


	}

}


?>