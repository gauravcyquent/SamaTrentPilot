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
// module.audio.mod.php                                        //
// module for analyzing MOD Audio files                        //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////


class Getid3_mod extends Getid3_handler
{

	public function Analyze() {
		$info = &$this->Getid3->info;
		$this->fseek($info['avdataoffset']);
		$fileheader = $this->fread(1088);
		if (preg_match('#^IMPM#', $fileheader)) {
			return $this->getITheaderFilepointer();
		} elseif (preg_match('#^Extended Module#', $fileheader)) {
			return $this->getXMheaderFilepointer();
		} elseif (preg_match('#^.{44}SCRM#', $fileheader)) {
			return $this->getS3MheaderFilepointer();
		} elseif (preg_match('#^.{1080}(M\\.K\\.|M!K!|FLT4|FLT8|[5-9]CHN|[1-3][0-9]CH)#', $fileheader)) {
			return $this->getMODheaderFilepointer();
		}
		$info['error'][] = 'This is not a known type of MOD file';
		return false;
	}


	public function getMODheaderFilepointer() {
		$info = &$this->Getid3->info;
		$this->fseek($info['avdataoffset'] + 1080);
		$FormatID = $this->fread(4);
		if (!preg_match('#^(M.K.|[5-9]CHN|[1-3][0-9]CH)$#', $FormatID)) {
			$info['error'][] = 'This is not a known type of MOD file';
			return false;
		}

		$info['fileformat'] = 'mod';

		$info['error'][] = 'MOD parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
		return false;
	}

	public function getXMheaderFilepointer() {
		$info = &$this->Getid3->info;
		$this->fseek($info['avdataoffset']);
		$FormatID = $this->fread(15);
		if (!preg_match('#^Extended Module$#', $FormatID)) {
			$info['error'][] = 'This is not a known type of XM-MOD file';
			return false;
		}

		$info['fileformat'] = 'xm';

		$info['error'][] = 'XM-MOD parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
		return false;
	}

	public function getS3MheaderFilepointer() {
		$info = &$this->Getid3->info;
		$this->fseek($info['avdataoffset'] + 44);
		$FormatID = $this->fread(4);
		if (!preg_match('#^SCRM$#', $FormatID)) {
			$info['error'][] = 'This is not a ScreamTracker MOD file';
			return false;
		}

		$info['fileformat'] = 's3m';

		$info['error'][] = 'ScreamTracker parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
		return false;
	}

	public function getITheaderFilepointer() {
		$info = &$this->Getid3->info;
		$this->fseek($info['avdataoffset']);
		$FormatID = $this->fread(4);
		if (!preg_match('#^IMPM$#', $FormatID)) {
			$info['error'][] = 'This is not an ImpulseTracker MOD file';
			return false;
		}

		$info['fileformat'] = 'it';

		$info['error'][] = 'ImpulseTracker parsing not enabled in this version of Getid3() ['.$this->Getid3->version().']';
		return false;
	}

}
