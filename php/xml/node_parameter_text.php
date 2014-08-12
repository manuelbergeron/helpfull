/**
* How to retreive node parameter text only from a simpleXmlElement
*/

<?php

$xml = new SimpleXmlElement("
<ListeMunicipalités>
	<Municipalité nomMunicipalité=\"Cayamant\">
		<DirectionRégionale nomDirection=\"Direction régionale de l'Outaouais\">
			<Adresse1></Adresse1>
			<Adresse2>107, rue Lois, bureau 100</Adresse2>
			<Ville>Gatineau</Ville>
			<CodePostal>J8Y 3R6</CodePostal>
			<Téléphone>819 772-3342</Téléphone>
			<TéléphoneSansFrais>1 800 676-2281</TéléphoneSansFrais>
			<Télécopieur>819 772-3474</Télécopieur>
		</DirectionRégionale>
	</Municipalité>
</ListeMunicipalités>
");



$xmlMunicipalites = $xml->xpath("/ListeMunicipalités/Municipalité/@nomMunicipalité");
foreach($xmlMunicipalites as xmlMunicipalite) {
	$value = (string)$xmlMunicipalite[0];
}
?>
