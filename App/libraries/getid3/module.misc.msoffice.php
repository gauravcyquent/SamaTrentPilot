<?php
/////////////////////////////////////////////////////////////////
/// Getid3() by James Heinrich <info@Getid3.org>               //
//  available at http://Getid3.sourceforge.net                 //
//            or http://www.Getid3.org                         //
//          also https://github.com/JamesHeinrich/Getid3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
//                                                             //
// module.misc.msoffice.php                                    //
// module for analyzing MS Office (.doc, .xls, etc) files      //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_msoffice extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;

		$this->fseek($info['avdataoffset']);
		$DOCFILEheader = $this->fread(8);
		$magic = "\xD0\xCF\x11\xE0\xA1\xB1\x1A\xE1";
		if (substr($DOCFILEheader, 0, 8) != $magic) {
			$info['error'][] = 'Expecting "'.Getid3_lib::PrintHexBytes($magic).'" at '.$info['avdataoffset'].', found '.Getid3_lib::PrintHexBytes(substr($DOCFILEheader, 0, 8)).' instead.';
			return false;
		}
		$info['fileformat'] = 'msoffice';

$info['error'][] = 'MS Office (.doc, .xls, etc) parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
return false;

	}

}
