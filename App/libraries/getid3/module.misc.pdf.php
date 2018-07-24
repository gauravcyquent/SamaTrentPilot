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
// module.misc.pdf.php                                         //
// module for analyzing PDF files                              //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_pdf extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;

		$info['fileformat'] = 'pdf';

		$info['error'][] = 'PDF parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
		return false;

	}

}
