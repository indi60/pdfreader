<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as Pdf;
use Session;

class PdfReaderController extends Controller
{
	public function search(Request $request){
		if(isset($request->word) && $request->word != ""){
			try{
				$parser = new Pdf();
				$pdf = $parser->parseFile(public_path().'/example.pdf');
				$text = $pdf->getText();

				// case censitive
				if(strpos(strtolower($text), strtolower($request->word))){
					return "'".$request->word."' Ditemukan";
				}else{
					return "'".$request->word."' Tidak Ditemukan";
				}
			}catch(Exception $e){
				return "Operation Failed";
			}
		}else{
			return "The word is blank";
		}
	}
}
