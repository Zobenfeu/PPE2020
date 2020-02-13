<?php

class DataBaseLinker
	{
		private static $_url = "mysql:host=localhost;dbname=MCDPPE;charset=utf8";
		private static $_user = "root";
		private static $_password = "root";
		private static $_stockConnexionPDO;

		public static function getConnexion()
                {

                    if(DataBaseLinker::$_stockConnexionPDO == null)
                    {
                        DataBaseLinker::$_stockConnexionPDO = new PDO(DataBaseLinker::$_url,DataBaseLinker::$_user,DataBaseLinker::$_password);
                    }

                    return DataBaseLinker::$_stockConnexionPDO;
                }
	}
?>
