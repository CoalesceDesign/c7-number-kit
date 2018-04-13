<?php
class C7NumberKit
{

	// =====================================================================================================
	/*
	* @param float $value
	* @param integer $precision
	* @return integer
	*/
	function roundUp( $value, $precision=0 )
	{
		// If the precision is 0 then default the factor to 1, otherwise use
		// 10^$precision. This effectively shifts the decimal point to the right.
		if ( $precision == 0 ) {
			$precisionFactor = 1;
		} else {
			$precisionFactor = pow( 10, $precision );
		}

		// ceil doesn't have any notion of precision, so by multiplying by the
		// right factor and then dividing by the same factor we emulate a precision
		return ceil( $value * $precisionFactor )/$precisionFactor;
	}


	// =====================================================================================================
	/*
	* Given a number in bytes, return appropriate string like 30MB, 3TB, etc.
	* @param float $bytes
	* @param integer $decimals
	* @return string
	*/
	public function humanizeFilesize( $bytes, $decimals = 2 )
	{
		$size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . @$size[$factor];
	}


} # End C7NumberKit