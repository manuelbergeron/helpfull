/** 
* Xpath to search for a node value and return the parent of the parent of this node value.
*/

 $xmlMunicipalites = $xml->xpath("/ListeMunicipalités/Municipalité/DirectionRégionale/Ville[.='" . $municipalite ."']/parent::*/parent::*");
