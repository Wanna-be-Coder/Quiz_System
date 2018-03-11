<?php    
   
	
   $xml = new DOMDocument( );
	
    $ele = $xml->createElement( 'quiz_info' );
    $ele2 = $xml->createElement( 'quiz' );
    $ele3 = $xml->createElement( 'question' );
    $ele3 = $xml->createElement( 'choice' );
    $ele4 = $xml->createElement( 'c' );
    $ele5 = $xml->createElement( 'answer' );
    $ele3->nodeValue = "s";
    $ele4->nodeValue = "s";
    $ele4->nodeValue = "s";
    $ele4->nodeValue = "s";
    $ele4->nodeValue = "s";
    $ele5->nodeValue = "s";
    $ele2->appendChild( $ele3 );
    $ele2->appendChild( $ele5 );
    $ele3->appendChild( $ele4 );
    $ele->appendChild( $ele2 );
    $xml->appendChild( $ele );
    $xml->save('quiz11.xml');
?>