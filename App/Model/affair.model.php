<?php
class Affair extends Model
{
	private static $m=null;
	public static function mode(){
		if(self::$m==null)
		{
			self::$m= new Affair();
		}
		return self::$m;
	}
	public function table(){
		return 'affair';
	}
	
	public function cast(){
		return array(
			'ID'=>'AFF_ID',
			'Contents'=>'CONTENT'
		);
	}
}