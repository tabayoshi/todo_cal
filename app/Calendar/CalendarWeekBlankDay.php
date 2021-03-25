<?php
namespace App\Calendar;

/**
 *  余白を出力するためのクラス
 */

class CalendarWeekBlankDay extends CalendarWeekDay {

	public function getClassName(){
		return "day-blank";
	}

	/**
	 *@return
	 */
	function render(){
		return '';
	}
}