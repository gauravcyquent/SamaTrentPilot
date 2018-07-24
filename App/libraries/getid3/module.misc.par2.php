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
// module.misc.par2.php                                        //
// module for analyzing PAR2 files                             //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_par2 extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;

		$info['fileformat'] = 'par2';

		$info['error'][] = 'PAR2 parsing not enabled in this version of Getid3()';
		return false;

	}

}
