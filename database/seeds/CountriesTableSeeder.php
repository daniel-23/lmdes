<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
        	['AF', 'Afganistán'],
			['AX', 'Islas Gland'],
			['AL', 'Albania'],
			['DE', 'Alemania'],
			['AD', 'Andorra'],
			['AO', 'Angola'],
			['AI', 'Anguilla'],
			['AQ', 'Antártida'],
			['AG', 'Antigua y Barbuda'],
			['AN', 'Antillas Holandesas'],
			['SA', 'Arabia Saudí'],
			['DZ', 'Argelia'],
			['AR', 'Argentina'],
			['AM', 'Armenia'],
			['AW', 'Aruba'],
			['AU', 'Australia'],
			['AT', 'Austria'],
			['AZ', 'Azerbaiyán'],
			['BS', 'Bahamas'],
			['BH', 'Bahréin'],
			['BD', 'Bangladesh'],
			['BB', 'Barbados'],
			['BY', 'Bielorrusia'],
			['BE', 'Bélgica'],
			['BZ', 'Belice'],
			['BJ', 'Benin'],
			['BM', 'Bermudas'],
			['BT', 'Bhután'],
			['BO', 'Bolivia'],
			['BA', 'Bosnia y Herzegovina'],
			['BW', 'Botsuana'],
			['BV', 'Isla Bouvet'],
			['BR', 'Brasil'],
			['BN', 'Brunéi'],
			['BG', 'Bulgaria'],
			['BF', 'Burkina Faso'],
			['BI', 'Burundi'],
			['CV', 'Cabo Verde'],
			['KY', 'Islas Caimán'],
			['KH', 'Camboya'],
			['CM', 'Camerún'],
			['CA', 'Canadá'],
			['CF', 'República Centroafricana'],
			['TD', 'Chad'],
			['CZ', 'República Checa'],
			['CL', 'Chile'],
			['CN', 'China'],
			['CY', 'Chipre'],
			['CX', 'Isla de Navidad'],
			['VA', 'Ciudad del Vaticano'],
			['CC', 'Islas Cocos'],
			['CO', 'Colombia'],
			['KM', 'Comoras'],
			['CD', 'República Democrática del Congo'],
			['CG', 'Congo'],
			['CK', 'Islas Cook'],
			['KP', 'Corea del Norte'],
			['KR', 'Corea del Sur'],
			['CI', 'Costa de Marfil'],
			['CR', 'Costa Rica'],
			['HR', 'Croacia'],
			['CU', 'Cuba'],
			['CW', 'Curazao'],
			['DK', 'Dinamarca'],
			['DM', 'Dominica'],
			['DO', 'República Dominicana'],
			['EC', 'Ecuador'],
			['EG', 'Egipto'],
			['SV', 'El Salvador'],
			['AE', 'Emiratos Árabes Unidos'],
			['ER', 'Eritrea'],
			['SK', 'Eslovaquia'],
			['SI', 'Eslovenia'],
			['ES', 'España'],
			['UM', 'Islas ultramarinas de Estados Unidos'],
			['US', 'Estados Unidos'],
			['EE', 'Estonia'],
			['ET', 'Etiopía'],
			['FO', 'Islas Feroe'],
			['PH', 'Filipinas'],
			['FI', 'Finlandia'],
			['FJ', 'Fiyi'],
			['FR', 'Francia'],
			['GA', 'Gabón'],
			['GM', 'Gambia'],
			['GE', 'Georgia'],
			['GS', 'Islas Georgias del Sur y Sandwich del Sur'],
			['GH', 'Ghana'],
			['GI', 'Gibraltar'],
			['GD', 'Granada'],
			['GR', 'Grecia'],
			['GL', 'Groenlandia'],
			['GP', 'Guadalupe'],
			['GU', 'Guam'],
			['GT', 'Guatemala'],
			['GF', 'Guayana Francesa'],
			['GN', 'Guinea'],
			['GQ', 'Guinea Ecuatorial'],
			['GW', 'Guinea-Bissau'],
			['GY', 'Guyana'],
			['HT', 'Haití'],
			['HM', 'Islas Heard y McDonald'],
			['HN', 'Honduras'],
			['HK', 'Hong Kong'],
			['HU', 'Hungría'],
			['IN', 'India'],
			['ID', 'Indonesia'],
			['IR', 'Irán'],
			['IQ', 'Iraq'],
			['IE', 'Irlanda'],
			['IS', 'Islandia'],
			['IL', 'Israel'],
			['IT', 'Italia'],
			['JM', 'Jamaica'],
			['JP', 'Japón'],
			['JO', 'Jordania'],
			['KZ', 'Kazajstán'],
			['KE', 'Kenia'],
			['KG', 'Kirguistán'],
			['KI', 'Kiribati'],
			['KW', 'Kuwait'],
			['LA', 'Laos'],
			['LS', 'Lesotho'],
			['LV', 'Letonia'],
			['LB', 'Líbano'],
			['LR', 'Liberia'],
			['LY', 'Libia'],
			['LI', 'Liechtenstein'],
			['LT', 'Lituania'],
			['LU', 'Luxemburgo'],
			['MO', 'Macao'],
			['MK', 'ARY Macedonia'],
			['MG', 'Madagascar'],
			['MY', 'Malasia'],
			['MW', 'Malawi'],
			['MV', 'Maldivas'],
			['ML', 'Malí'],
			['MT', 'Malta'],
			['FK', 'Islas Malvinas'],
			['MP', 'Islas Marianas del Norte'],
			['MA', 'Marruecos'],
			['MH', 'Islas Marshall'],
			['MQ', 'Martinica'],
			['MU', 'Mauricio'],
			['MR', 'Mauritania'],
			['YT', 'Mayotte'],
			['MX', 'México'],
			['FM', 'Micronesia'],
			['MD', 'Moldavia'],
			['MC', 'Mónaco'],
			['MN', 'Mongolia'],
			['MS', 'Montserrat'],
			['MZ', 'Mozambique'],
			['MM', 'Myanmar'],
			['NA', 'Namibia'],
			['NR', 'Nauru'],
			['NP', 'Nepal'],
			['NI', 'Nicaragua'],
			['NE', 'Níger'],
			['NG', 'Nigeria'],
			['NU', 'Niue'],
			['NF', 'Isla Norfolk'],
			['NO', 'Noruega'],
			['NC', 'Nueva Caledonia'],
			['NZ', 'Nueva Zelanda'],
			['OM', 'Omán'],
			['NL', 'Países Bajos'],
			['PK', 'Pakistán'],
			['PW', 'Palau'],
			['PS', 'Palestina'],
			['PA', 'Panamá'],
			['PG', 'Papúa Nueva Guinea'],
			['PY', 'Paraguay'],
			['PE', 'Perú'],
			['PN', 'Islas Pitcairn'],
			['PF', 'Polinesia Francesa'],
			['PL', 'Polonia'],
			['PT', 'Portugal'],
			['PR', 'Puerto Rico'],
			['QA', 'Qatar'],
			['GB', 'Reino Unido'],
			['RE', 'Reunión'],
			['RW', 'Ruanda'],
			['RO', 'Rumania'],
			['RU', 'Rusia'],
			['EH', 'Sahara Occidental'],
			['SB', 'Islas Salomón'],
			['WS', 'Samoa'],
			['AS', 'Samoa Americana'],
			['KN', 'San Cristóbal y Nevis'],
			['SM', 'San Marino'],
			['PM', 'San Pedro y Miquelón'],
			['VC', 'San Vicente y las Granadinas'],
			['SH', 'Santa Helena'],
			['LC', 'Santa Lucía'],
			['ST', 'Santo Tomé y Príncipe'],
			['SN', 'Senegal'],
			['CS', 'Serbia y Montenegro'],
			['SC', 'Seychelles'],
			['SL', 'Sierra Leona'],
			['SG', 'Singapur'],
			['SY', 'Siria'],
			['SO', 'Somalia'],
			['LK', 'Sri Lanka'],
			['SZ', 'Suazilandia'],
			['ZA', 'Sudáfrica'],
			['SD', 'Sudán'],
			['SE', 'Suecia'],
			['CH', 'Suiza'],
			['SR', 'Surinam'],
			['SJ', 'Svalbard y Jan Mayen'],
			['TH', 'Tailandia'],
			['TW', 'Taiwán'],
			['TZ', 'Tanzania'],
			['TJ', 'Tayikistán'],
			['IO', 'Territorio Británico del Océano Índico'],
			['TF', 'Territorios Australes Franceses'],
			['TL', 'Timor Oriental'],
			['TG', 'Togo'],
			['TK', 'Tokelau'],
			['TO', 'Tonga'],
			['TT', 'Trinidad y Tobago'],
			['TN', 'Túnez'],
			['TC', 'Islas Turcas y Caicos'],
			['TM', 'Turkmenistán'],
			['TR', 'Turquía'],
			['TV', 'Tuvalu'],
			['UA', 'Ucrania'],
			['UG', 'Uganda'],
			['UY', 'Uruguay'],
			['UZ', 'Uzbekistán'],
			['VU', 'Vanuatu'],
			['VE', 'Venezuela'],
			['VN', 'Vietnam'],
			['VG', 'Islas Vírgenes Británicas'],
			['VI', 'Islas Vírgenes de los Estados Unidos'],
			['WF', 'Wallis y Futuna'],
			['YE', 'Yemen'],
			['DJ', 'Yibuti'],
			['ZM', 'Zambia'],
			['ZW', 'Zimbabue']
		];

		foreach ($countries as $country) {
			$data = array('Prefix' => $country[0], 'Name' => $country[1]);
			Country::create($data);
		}

    }
}