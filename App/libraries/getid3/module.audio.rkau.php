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
// module.audio.shorten.php                                    //
// module for analyzing Shorten Audio files                    //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_rkau extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;

		$this->fseek($info['avdataoffset']);
		$RKAUHeader = $this->fread(20);
		$magic = 'RKA';
		if (substr($RKAUHeader, 0, 3) != $magic) {
			$info['error'][] = 'Expecting "'.Getid3_lib::PrintHexBytes($magic).'" at offset '.$info['avdataoffset'].', found "'.Getid3_lib::PrintHexBytes(substr($RKAUHeader, 0, 3)).'"';
			return false;
		}

		$info['fileformat']            = 'rkau';
		$info['audio']['dataformat']   = 'rkau';
		$info['audio']['bitrate_mode'] = 'vbr';

		$info['rkau']['raw']['version']   = Getid3_lib::LittleEndian2Int(substr($RKAUHeader, 3, 1));
		$info['rkau']['version']          = '1.'.str_pad($info['rkau']['raw']['version'] & 0x0F, 2, '0', STR_PAD_LEFT);
		if (($info['rkau']['version'] > 1.07) || ($info['rkau']['version'] < 1.06)) {
			$info['error'][] = 'This version of Getid3() ['.$this->Getid3->version().'] can only parse RKAU files v1.06 and 1.07 (this file is v'.$info['rkau']['version'].')';
			unset($info['rkau']);
			return false;
		}

		$info['rkau']['source_bytes']     = Getid3_lib::LittleEndian2Int(substr($RKAUHeader,  4, 4));
		$info['rkau']['sample_rate']      = Getid3_lib::LittleEndian2Int(substr($RKAUHeader,  8, 4));
		$info['rkau']['channels']         = Getid3_lib::LittleEndian2Int(substr($RKAUHeader, 12, 1));
		$info['rkau']['bits_per_sample']  = Getid3_lib::LittleEndian2Int(substr($RKAUHeader, 13, 1));

		$info['rkau']['raw']['quality']   = Getid3_lib::LittleEndian2Int(substr($RKAUHeader, 14, 1));
		$this->RKAUqualityLookup($info['rkau']);

		$info['rkau']['raw']['flags']            = Getid3_lib::LittleEndian2Int(substr($RKAUHeader, 15, 1));
		$info['rkau']['flags']['joint_stereo']   = (bool) (!($info['rkau']['raw']['flags'] & 0x01));
		$info['rkau']['flags']['streaming']      =  (bool)  ($info['rkau']['raw']['flags'] & 0x02);
		$info['rkau']['flags']['vrq_lossy_mode'] =  (bool)  ($info['rkau']['raw']['flags'] & 0x04);

		if ($info['rkau']['flags']['streaming']) {
			$info['avdataoffset'] += 20;
			$info['rkau']['compressed_bytes']  = Getid3_lib::LittleEndian2Int(substr($RKAUHeader, 16, 4));
		} else {
			$info['avdataoffset'] += 16;
			$info['rkau']['compressed_bytes'] = $info['avdataend'] - $info['avdataoffset'] - 1;
		}
		// Note: compressed_bytes does not always equal what appears to be the actual number of compressed bytes,
		// sometimes it's more, sometimes less. No idea why(?)

		$info['audio']['lossless']        = $info['rkau']['lossless'];
		$info['audio']['channels']        = $info['rkau']['channels'];
		$info['audio']['bits_per_sample'] = $info['rkau']['bits_per_sample'];
		$info['audio']['sample_rate']     = $info['rkau']['sample_rate'];

		$info['playtime_seconds']         = $info['rkau']['source_bytes'] / ($info['rkau']['sample_rate'] * $info['rkau']['channels'] * ($info['rkau']['bits_per_sample'] / 8));
		$info['audio']['bitrate']         = ($info['rkau']['compressed_bytes'] * 8) / $info['playtime_seconds'];

		return true;

	}


	public function RKAUqualityLookup(&$RKAUdata) {
		$level   = ($RKAUdata['raw']['quality'] & 0xF0) >> 4;
		$quality =  $RKAUdata['raw']['quality'] & 0x0F;

		$RKAUdata['lossless']          = (($quality == 0) ? true : false);
		$RKAUdata['compression_level'] = $level + 1;
		if (!$RKAUdata['lossless']) {
			$RKAUdata['quality_setting'] = $quality;
		}

		return true;
	}

}
