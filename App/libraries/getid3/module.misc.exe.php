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
// module.misc.exe.php                                         //
// module for analyzing EXE files                              //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_exe extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;

		$this->fseek($info['avdataoffset']);
		$EXEheader = $this->fread(28);

		$magic = 'MZ';
		if (substr($EXEheader, 0, 2) != $magic) {
			$info['error'][] = 'Expecting "'.Getid3_lib::PrintHexBytes($magic).'" at offset '.$info['avdataoffset'].', found "'.Getid3_lib::PrintHexBytes(substr($EXEheader, 0, 2)).'"';
			return false;
		}

		$info['fileformat'] = 'exe';
		$info['exe']['mz']['magic'] = 'MZ';

		$info['exe']['mz']['raw']['last_page_size']          = Getid3_lib::LittleEndian2Int(substr($EXEheader,  2, 2));
		$info['exe']['mz']['raw']['page_count']              = Getid3_lib::LittleEndian2Int(substr($EXEheader,  4, 2));
		$info['exe']['mz']['raw']['relocation_count']        = Getid3_lib::LittleEndian2Int(substr($EXEheader,  6, 2));
		$info['exe']['mz']['raw']['header_paragraphs']       = Getid3_lib::LittleEndian2Int(substr($EXEheader,  8, 2));
		$info['exe']['mz']['raw']['min_memory_paragraphs']   = Getid3_lib::LittleEndian2Int(substr($EXEheader, 10, 2));
		$info['exe']['mz']['raw']['max_memory_paragraphs']   = Getid3_lib::LittleEndian2Int(substr($EXEheader, 12, 2));
		$info['exe']['mz']['raw']['initial_ss']              = Getid3_lib::LittleEndian2Int(substr($EXEheader, 14, 2));
		$info['exe']['mz']['raw']['initial_sp']              = Getid3_lib::LittleEndian2Int(substr($EXEheader, 16, 2));
		$info['exe']['mz']['raw']['checksum']                = Getid3_lib::LittleEndian2Int(substr($EXEheader, 18, 2));
		$info['exe']['mz']['raw']['cs_ip']                   = Getid3_lib::LittleEndian2Int(substr($EXEheader, 20, 4));
		$info['exe']['mz']['raw']['relocation_table_offset'] = Getid3_lib::LittleEndian2Int(substr($EXEheader, 24, 2));
		$info['exe']['mz']['raw']['overlay_number']          = Getid3_lib::LittleEndian2Int(substr($EXEheader, 26, 2));

		$info['exe']['mz']['byte_size']          = (($info['exe']['mz']['raw']['page_count'] - 1)) * 512 + $info['exe']['mz']['raw']['last_page_size'];
		$info['exe']['mz']['header_size']        = $info['exe']['mz']['raw']['header_paragraphs'] * 16;
		$info['exe']['mz']['memory_minimum']     = $info['exe']['mz']['raw']['min_memory_paragraphs'] * 16;
		$info['exe']['mz']['memory_recommended'] = $info['exe']['mz']['raw']['max_memory_paragraphs'] * 16;

$info['error'][] = 'EXE parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
return false;

	}

}
