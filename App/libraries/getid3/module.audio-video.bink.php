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
// module.audio.bink.php                                       //
// module for analyzing Bink or Smacker audio-video files      //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_bink extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;

$info['error'][] = 'Bink / Smacker files not properly processed by this version of Getid3() ['.$this->Getid3->version().']';

		$this->fseek($info['avdataoffset']);
		$fileTypeID = $this->fread(3);
		switch ($fileTypeID) {
			case 'BIK':
				return $this->ParseBink();
				break;

			case 'SMK':
				return $this->ParseSmacker();
				break;

			default:
				$info['error'][] = 'Expecting "BIK" or "SMK" at offset '.$info['avdataoffset'].', found "'.Getid3_lib::PrintHexBytes($fileTypeID).'"';
				return false;
				break;
		}

		return true;

	}

	public function ParseBink() {
		$info = &$this->Getid3->info;
		$info['fileformat']          = 'bink';
		$info['video']['dataformat'] = 'bink';

		$fileData = 'BIK'.$this->fread(13);

		$info['bink']['data_size']   = Getid3_lib::LittleEndian2Int(substr($fileData, 4, 4));
		$info['bink']['frame_count'] = Getid3_lib::LittleEndian2Int(substr($fileData, 8, 2));

		if (($info['avdataend'] - $info['avdataoffset']) != ($info['bink']['data_size'] + 8)) {
			$info['error'][] = 'Probably truncated file: expecting '.$info['bink']['data_size'].' bytes, found '.($info['avdataend'] - $info['avdataoffset']);
		}

		return true;
	}

	public function ParseSmacker() {
		$info = &$this->Getid3->info;
		$info['fileformat']          = 'smacker';
		$info['video']['dataformat'] = 'smacker';

		return true;
	}

}
