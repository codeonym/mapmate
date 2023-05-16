<?php

  require_once __DIR__."/dbconnect.php";

$countries = array(
    "Afghanistan" => array(
        "iso_code" => "AF",
        "timezone" => "Asia/Kabul"
    ),
    "Albania" => array(
        "iso_code" => "AL",
        "timezone" => "Europe/Tirane"
    ),
    "Algeria" => array(
        "iso_code" => "DZ",
        "timezone" => "Africa/Algiers"
    ),
    "American Samoa" => array(
        "iso_code" => "AS",
        "timezone" => "Pacific/Pago_Pago"
    ),
    "Andorra" => array(
        "iso_code" => "AD",
        "timezone" => "Europe/Andorra"
    ),
    "Angola" => array(
        "iso_code" => "AO",
        "timezone" => "Africa/Luanda"
    ),
    "Anguilla" => array(
        "iso_code" => "AI",
        "timezone" => "America/Anguilla"
    ),
    "Antarctica" => array(
        "iso_code" => "AQ",
        "timezone" => "Antarctica/Casey"
    ),
    "Antigua and Barbuda" => array(
        "iso_code" => "AG",
        "timezone" => "America/Antigua"
    ),
    "Argentina" => array(
        "iso_code" => "AR",
        "timezone" => "America/Argentina/Buenos_Aires"
    ),
    "Armenia" => array(
        "iso_code" => "AM",
        "timezone" => "Asia/Yerevan"
    ),
    "Aruba" => array(
        "iso_code" => "AW",
        "timezone" => "America/Aruba"
    ),
    "Australia" => array(
        "iso_code" => "AU",
        "timezone" => "Australia/Sydney"
    ),
    "Austria" => array(
        "iso_code" => "AT",
        "timezone" => "Europe/Vienna"
    ),
    "Azerbaijan" => array(
        "iso_code" => "AZ",
        "timezone" => "Asia/Baku"
    ),
    "Bahamas" => array(
        "iso_code" => "BS",
        "timezone" => "America/Nassau"
    ),
    "Bahrain" => array(
        "iso_code" => "BH",
        "timezone" => "Asia/Bahrain"
    ),
    "Bangladesh" => array(
        "iso_code" => "BD",
        "timezone" => "Asia/Dhaka"
    ),
    "Barbados" => array(
        "iso_code" => "BB",
        "timezone" => "America/Barbados"
    ),
    "Belarus" => array(
        "iso_code" => "BY",
        "timezone" => "Europe/Minsk"
    ),
    "Belgium" => array(
        "iso_code" => "BE",
        "timezone" => "Europe/Brussels"
    ),
    "Belize" => array(
        "iso_code" => "BZ",
        "timezone" => "America/Belize"
    ),
    "Benin" => array(
        "iso_code" => "BJ",
        "timezone" => "Africa/Porto-Novo"
    ),
    "Bermuda" => array(
        "iso_code" => "BM",
        "timezone" => "Atlantic/Bermuda"
    ),
    "Bhutan" => array(
        "iso_code" => "BT",
        "timezone" => "Asia/Thimphu"
    ),
    "Bolivia" => array(
        "iso_code" => "BO",
        "timezone" => "America/La_Paz"
    ),
    "Bonaire, Sint Eustatius and Saba" => array(
        "iso_code" => "BQ",
        "timezone" => "America/Kralendijk"
    ),
    "Bosnia and Herzegovina" => array(
        "iso_code" => "BA",
        "timezone" => "Europe/Sarajevo"
    ),
    "Botswana" => array(
        "iso_code" => "BW",
        "timezone" => "Africa/Gaborone"
    ),
    "Bouvet Island" => array(
        "iso_code" => "BV",
        "timezone" => "Antarctica/Troll"
    ),
    "Brazil" => array(
        "iso_code" => "BR",
        "timezone" => "America/Sao_Paulo"
    ),
    "British Indian Ocean Territory" => array(
        "iso_code" => "IO",
        "timezone" => "Indian/Chagos"
    ),
    "Brunei Darussalam" => array(
        "iso_code" => "BN",
        "timezone" => "Asia/Brunei"
    ),
    "Bulgaria" => array(
        "iso_code" => "BG",
        "timezone" => "Europe/Sofia"
    ),
    "Burkina Faso" => array(
        "iso_code" => "BF",
        "timezone" => "Africa/Ouagadougou"
    ),
    "Burundi" => array(
        "iso_code" => "BI",
        "timezone" => "Africa/Bujumbura"
    ),
    "Cambodia" => array(
        "iso_code" => "KH",
        "timezone" => "Asia/Phnom_Penh"
    ),
    "Cameroon" => array(
        "iso_code" => "CM",
        "timezone" => "Africa/Douala"
    ),
    "Canada" => array(
        "iso_code" => "CA",
        "timezone" => "America/Toronto"
    ),
    "Cape Verde" => array(
        "iso_code" => "CV",
        "timezone" => "Atlantic/Cape_Verde"
    ),
    "Cayman Islands" => array(
        "iso_code" => "KY",
        "timezone" => "America/Cayman"
    ),
    "Central African Republic" => array(
        "iso_code" => "CF",
        "timezone" => "Africa/Bangui"
    ),
    "Chad" => array(
        "iso_code" => "TD",
        "timezone" => "Africa/Ndjamena"
    ),
    "Chile" => array(
        "iso_code" => "CL",
        "timezone" => "America/Santiago"
    ),
    "China" => array(
        "iso_code" => "CN",
        "timezone" => "Asia/Shanghai"
    ),
    "Christmas Island" => array(
        "iso_code" => "CX",
        "timezone" => "Indian/Christmas"
    ),
    "Cocos (Keeling) Islands" => array(
        "iso_code" => "CC",
        "timezone" => "Indian/Cocos"
    ),
    "Colombia" => array(
        "iso_code" => "CO",
        "timezone" => "America/Bogota"
    ),
    "Comoros" => array(
        "iso_code" => "KM",
        "timezone" => "Indian/Comoro"
    ),
    "Congo" => array(
        "iso_code" => "CG",
        "timezone" => "Africa/Brazzaville"
    ),
    "Democratic Republic of the Congo" => array(
        "iso_code" => "CD",
        "timezone" => "Africa/Kinshasa"
    ),
    "Cook Islands" => array(
        "iso_code" => "CK",
        "timezone" => "Pacific/Rarotonga"
    ),
    "Costa Rica" => array(
        "iso_code" => "CR",
        "timezone" => "America/Costa_Rica"
    ),
    "Côte d'Ivoire" => array(
        "iso_code" => "CI",
        "timezone" => "Africa/Abidjan"
    ),
    "Croatia" => array(
        "iso_code" => "HR",
        "timezone" => "Europe/Zagreb"
    ),
    "Cuba" => array(
        "iso_code" => "CU",
        "timezone" => "America/Havana"
    ),
    "Curaçao" => array(
        "iso_code" => "CW",
        "timezone" => "America/Curacao"
    ),
    "Cyprus" => array(
        "iso_code" => "CY",
        "timezone" => "Asia/Nicosia"
    ),
    "Czech Republic" => array(
        "iso_code" => "CZ",
        "timezone" => "Europe/Prague"
    ),
    "Denmark" => array(
        "iso_code" => "DK",
        "timezone" => "Europe/Copenhagen"
    ),
    "Djibouti" => array(
        "iso_code" => "DJ",
        "timezone" => "Africa/Djibouti"
    ),
    "Dominica" => array(
        "iso_code" => "DM",
        "timezone" => "America/Dominica"
    ),
    "Dominican Republic" => array(
        "iso_code" => "DO",
        "timezone" => "America/Santo_Domingo"
    ),
    "Ecuador" => array(
        "iso_code" => "EC",
        "timezone" => "America/Guayaquil"
    ),
    "Egypt" => array(
        "iso_code" => "EG",
        "timezone" => "Africa/Cairo"
    ),
    "El Salvador" => array(
        "iso_code" => "SV",
        "timezone" => "America/El_Salvador"
    ),
    "Equatorial Guinea" => array(
        "iso_code" => "GQ",
        "timezone" => "Africa/Malabo"
    ),
    "Eritrea" => array(
        "iso_code" => "ER",
        "timezone" => "Africa/Asmara"
    ),
    "Estonia" => array(
        "iso_code" => "EE",
        "timezone" => "Europe/Tallinn"
    ),
    "Eswatini" => array(
        "iso_code" => "SZ",
        "timezone" => "Africa/Mbabane"
    ),
    "Ethiopia" => array(
        "iso_code" => "ET",
        "timezone" => "Africa/Addis_Ababa"
    ),
    "Falkland Islands (Malvinas)" => array(
        "iso_code" => "FK",
        "timezone" => "Atlantic/Stanley"
    ),
    "Faroe Islands" => array(
        "iso_code" => "FO",
        "timezone" => "Atlantic/Faroe"
    ),
    "Fiji" => array(
        "iso_code" => "FJ",
        "timezone" => "Pacific/Fiji"
    ),
    "Finland" => array(
        "iso_code" => "FI",
        "timezone" => "Europe/Helsinki"
    ),
    "France" => array(
        "iso_code" => "FR",
        "timezone" => "Europe/Paris"
    ),
    "French Guiana" => array(
        "iso_code" => "GF",
        "timezone" => "America/Cayenne"
    ),
    "French Polynesia" => array(
        "iso_code" => "PF",
        "timezone" => "Pacific/Tahiti"
    ),
    "French Southern Territories" => array(
        "iso_code" => "TF",
        "timezone" => "Indian/Kerguelen"
    ),
    "Gabon" => array(
        "iso_code" => "GA",
        "timezone" => "Africa/Libreville"
    ),
    "Gambia" => array(
        "iso_code" => "GM",
        "timezone" => "Africa/Banjul"
    ),
    "Georgia" => array(
        "iso_code" => "GE",
        "timezone" => "Asia/Tbilisi"
    ),
    "Germany" => array(
        "iso_code" => "DE",
        "timezone" => "Europe/Berlin"
    ),
    "Ghana" => array(
        "iso_code" => "GH",
        "timezone" => "Africa/Accra"
    ),
    "Gibraltar" => array(
        "iso_code" => "GI",
        "timezone" => "Europe/Gibraltar"
    ),
    "Greece" => array(
        "iso_code" => "GR",
        "timezone" => "Europe/Athens"
    ),
    "Greenland" => array(
        "iso_code" => "GL",
        "timezone" => "America/Godthab"
    ),
    "Grenada" => array(
        "iso_code" => "GD",
        "timezone" => "America/Grenada"
    ),
    "Guadeloupe" => array(
        "iso_code" => "GP",
        "timezone" => "America/Guadeloupe"
    ),
    "Guam" => array(
        "iso_code" => "GU",
        "timezone" => "Pacific/Guam"
    ),
    "Guatemala" => array(
        "iso_code" => "GT",
        "timezone" => "America/Guatemala"
    ),
    "Guernsey" => array(
        "iso_code" => "GG",
        "timezone" => "Europe/Guernsey"
    ),
    "Guinea" => array(
        "iso_code" => "GN",
        "timezone" => "Africa/Conakry"
    ),
    "Guinea-Bissau" => array(
        "iso_code" => "GW",
        "timezone" => "Africa/Bissau"
    ),
    "Guyana" => array(
        "iso_code" => "GY",
        "timezone" => "America/Guyana"
    ),
    "Haiti" => array(
        "iso_code" => "HT",
        "timezone" => "America/Port-au-Prince"
    ),
    "Heard Island and McDonald Islands" => array(
        "iso_code" => "HM",
        "timezone" => "Indian/Kerguelen"
    ),
    "Holy See" => array(
       "iso_code" => "VA",
        "timezone" => "Europe/Rome"
    ),
    "Honduras" => array(
        "iso_code" => "HN",
        "timezone" => "America/Tegucigalpa"
    ),
    "Hong Kong" => array(
        "iso_code" => "HK",
        "timezone" => "Asia/Hong_Kong"
    ),
    "Hungary" => array(
        "iso_code" => "HU",
        "timezone" => "Europe/Budapest"
    ),
    "Iceland" => array(
        "iso_code" => "IS",
        "timezone" => "Atlantic/Reykjavik"
    ),
    "India" => array(
        "iso_code" => "IN",
        "timezone" => "Asia/Kolkata"
    ),
    "Indonesia" => array(
        "iso_code" => "ID",
        "timezone" => "Asia/Jakarta"
    ),
    "Iran, Islamic Republic of" => array(
        "iso_code" => "IR",
        "timezone" => "Asia/Tehran"
    ),
    "Iraq" => array(
        "iso_code" => "IQ",
        "timezone" => "Asia/Baghdad"
    ),
    "Ireland" => array(
        "iso_code" => "IE",
        "timezone" => "Europe/Dublin"
    ),
    "Isle of Man" => array(
        "iso_code" => "IM",
        "timezone" => "Europe/Isle_of_Man"
    ),
    "Israel" => array(
        "iso_code" => "IL",
        "timezone" => "Asia/Jerusalem"
    ),
    "Italy" => array(
        "iso_code" => "IT",
        "timezone" => "Europe/Rome"
    ),
    "Jamaica" => array(
        "iso_code" => "JM",
        "timezone" => "America/Jamaica"
    ),
    "Japan" => array(
        "iso_code" => "JP",
        "timezone" => "Asia/Tokyo"
    ),
    "Jersey" => array(
        "iso_code" => "JE",
        "timezone" => "Europe/Jersey"
    ),
    "Jordan" => array(
        "iso_code" => "JO",
        "timezone" => "Asia/Amman"
    ),
    "Kazakhstan" => array(
        "iso_code" => "KZ",
        "timezone" => "Asia/Almaty"
    ),
    "Kenya" => array(
        "iso_code" => "KE",
        "timezone" => "Africa/Nairobi"
    ),
    "Kiribati" => array(
        "iso_code" => "KI",
        "timezone" => "Pacific/Tarawa"
    ),
    "Korea, Democratic People's Republic of" => array(
        "iso_code" => "KP",
        "timezone" => "Asia/Pyongyang"
    ),
    "Korea, Republic of" => array(
        "iso_code" => "KR",
        "timezone" => "Asia/Seoul"
    ),
    "Kuwait" => array(
        "iso_code" => "KW",
        "timezone" => "Asia/Kuwait"
    ),
    "Kyrgyzstan" => array(
        "iso_code" => "KG",
        "timezone" => "Asia/Bishkek"
    ),
    "Lao People's Democratic Republic" => array(
        "iso_code" => "LA",
        "timezone" => "Asia/Vientiane"
    ),
"Latvia" => array(
        "iso_code" => "LV",
        "timezone" => "Europe/Riga"
    ),
    "Lebanon" => array(
        "iso_code" => "LB",
        "timezone" => "Asia/Beirut"
    ),
    "Lesotho" => array(
        "iso_code" => "LS",
        "timezone" => "Africa/Maseru"
    ),
    "Liberia" => array(
        "iso_code" => "LR",
        "timezone" => "Africa/Monrovia"
    ),
    "Libya" => array(
        "iso_code" => "LY",
        "timezone" => "Africa/Tripoli"
    ),
    "Liechtenstein" => array(
        "iso_code" => "LI",
        "timezone" => "Europe/Vaduz"
    ),
    "Lithuania" => array(
        "iso_code" => "LT",
        "timezone" => "Europe/Vilnius"
    ),
    "Luxembourg" => array(
        "iso_code" => "LU",
        "timezone" => "Europe/Luxembourg"
    ),
    "Macao" => array(
        "iso_code" => "MO",
        "timezone" => "Asia/Macau"
    ),
    "Madagascar" => array(
        "iso_code" => "MG",
        "timezone" => "Indian/Antananarivo"
    ),
    "Malawi" => array(
        "iso_code" => "MW",
        "timezone" => "Africa/Blantyre"
    ),
    "Malaysia" => array(
        "iso_code" => "MY",
        "timezone" => "Asia/Kuala_Lumpur"
    ),
    "Maldives" => array(
        "iso_code" => "MV",
        "timezone" => "Indian/Maldives"
    ),
    "Mali" => array(
        "iso_code" => "ML",
        "timezone" => "Africa/Bamako"
    ),
    "Malta" => array(
        "iso_code" => "MT",
        "timezone" => "Europe/Malta"
    ),
    "Marshall Islands" => array(
        "iso_code" => "MH",
        "timezone" => "Pacific/Majuro"
    ),
    "Martinique" => array(
        "iso_code" => "MQ",
        "timezone" => "America/Martinique"
    ),
    "Mauritania" => array(
        "iso_code" => "MR",
        "timezone" => "Africa/Nouakchott"
    ),
    "Mauritius" => array(
        "iso_code" => "MU",
        "timezone" => "Indian/Mauritius"
    ),
    "Mayotte" => array(
        "iso_code" => "YT",
        "timezone" => "Indian/Mayotte"
    ),
    "Mexico" => array(
        "iso_code" => "MX",
        "timezone" => "America/Mexico_City"
    ),
    "Micronesia, Federated States of" => array(
        "iso_code" => "FM",
        "timezone" => "Pacific/Chuuk"
    ),
    "Moldova, Republic of" => array(
        "iso_code" => "MD",
        "timezone" => "Europe/Chisinau"
    ),
    "Monaco" => array(
        "iso_code" => "MC",
        "timezone" => "Europe/Monaco"
    ),
    "Mongolia" => array(
        "iso_code" => "MN",
        "timezone" => "Asia/Ulaanbaatar"
    ),
    "Montenegro" => array(
        "iso_code" => "ME",
        "timezone" => "Europe/Podgorica"
    ),
    "Montserrat" => array(
        "iso_code" => "MS",
        "timezone" => "America/Montserrat"
    ),
    "Morocco" => array(
        "iso_code" => "MA",
        "timezone" => "Africa/Casablanca"
    ),
    "Mozambique" => array(
        "iso_code" => "MZ",
        "timezone" => "Africa/Maputo"
    ),
    "Myanmar" => array(
        "iso_code" => "MM",
        "timezone" => "Asia/Yangon"
    ),
    "Namibia" => array(
        "iso_code" => "NA",
        "timezone" => "Africa/Windhoek"
    ),
    "Nauru" => array(
        "iso_code" => "NR",
        "timezone" => "Pacific/Nauru"
    ),
    "Nepal" => array(
        "iso_code" => "NP",
        "timezone" => "Asia/Kathmandu"
    ),
    "Netherlands" => array(
        "iso_code" => "NL",
        "timezone" => "Europe/Amsterdam"
    ),
    "New Caledonia" => array(
        "iso_code" => "NC",
        "timezone" => "Pacific/Noumea"
    ),
    "New Zealand" => array(
        "iso_code" => "NZ",
        "timezone" => "Pacific/Auckland"
    ),
    "Nicaragua" => array(
        "iso_code" => "NI",
        "timezone" => "America/Managua"
    ),
    "Niger" => array(
        "iso_code" => "NE",
        "timezone" => "Africa/Niamey"
    ),
    "Nigeria" => array(
        "iso_code" => "NG",
        "timezone" => "Africa/Lagos"
    ),
    "Niue" => array(
        "iso_code" => "NU",
        "timezone" => "Pacific/Niue"
    ),
    "Norfolk Island" => array(
        "iso_code" => "NF",
        "timezone" => "Pacific/Norfolk"
    ),
    "North Macedonia" => array(
        "iso_code" => "MK",
        "timezone" => "Europe/Skopje"
    ),
    "Northern Mariana Islands" => array(
        "iso_code" => "MP",
        "timezone" => "Pacific/Saipan"
    ),
    "Norway" => array(
        "iso_code" => "NO",
        "timezone" => "Europe/Oslo"
    ),
    "Oman" => array(
        "iso_code" => "OM",
        "timezone" => "Asia/Muscat"
    ),
    "Pakistan" => array(
        "iso_code" => "PK",
        "timezone" => "Asia/Karachi"
    ),
    "Palau" => array(
        "iso_code" => "PW",
        "timezone" => "Pacific/Palau"
    ),
    "Palestine, State of" => array(
        "iso_code" => "PS",
        "timezone" => "Asia/Gaza"
    ),
    "Panama" => array(
        "iso_code" => "PA",
        "timezone" => "America/Panama"
    ),
    "Papua New Guinea" => array(
        "iso_code" => "PG",
        "timezone" => "Pacific/Port_Moresby"
    ),
    "Paraguay" => array(
        "iso_code" => "PY",
        "timezone" => "America/Asuncion"
    ),
    "Peru" => array(
        "iso_code" => "PE",
        "timezone" => "America/Lima"
    ),
    "Philippines" => array(
        "iso_code" => "PH",
        "timezone" => "Asia/Manila"
    ),
    "Pitcairn" => array(
        "iso_code" => "PN",
        "timezone" => "Pacific/Pitcairn"
    ),
    "Poland" => array(
        "iso_code" => "PL",
        "timezone" => "Europe/Warsaw"
    ),
    "Portugal" => array(
        "iso_code" => "PT",
        "timezone" => "Europe/Lisbon"
    ),
    "Puerto Rico" => array(
        "iso_code" => "PR",
        "timezone" => "America/Puerto_Rico"
    ),
    "Qatar" => array(
        "iso_code" => "QA",
        "timezone" => "Asia/Qatar"
    ),
    "Romania" => array(
        "iso_code" => "RO",
        "timezone" => "Europe/Bucharest"
    ),
    "Russian Federation" => array(
        "iso_code" => "RU",
        "timezone" => "Europe/Moscow"
    ),
    "Rwanda" => array(
        "iso_code" => "RW",
        "timezone" => "Africa/Kigali"
    ),
    "Réunion" => array(
        "iso_code" => "RE",
        "timezone" => "Indian/Reunion"
    ),
    "Saint Barthélemy" => array(
        "iso_code" => "BL",
        "timezone" => "America/St_Barthelemy"
    ),
    "Saint Helena, Ascension and Tristan da Cunha" => array(
        "iso_code" => "SH",
        "timezone" => "Atlantic/St_Helena"
    ),
    "Saint Kitts and Nevis" => array(
        "iso_code" => "KN",
        "timezone" => "America/St_Kitts"
    ),
    "Saint Lucia" => array(
        "iso_code" => "LC",
        "timezone" => "America/St_Lucia"
    ),
    "Saint Martin (French part)" => array(
        "iso_code" => "MF",
        "timezone" => "America/Marigot"
    ),
    "Saint Pierre and Miquelon" => array(
        "iso_code" => "PM",
        "timezone" => "America/Miquelon"
    ),
    "Saint Vincent and the Grenadines" => array(
        "iso_code" => "VC",
        "timezone" => "America/St_Vincent"
    ),
    "Samoa" => array(
        "iso_code" => "WS",
        "timezone" => "Pacific/Apia"
    ),
    "San Marino" => array(
        "iso_code" => "SM",
        "timezone" => "Europe/San_Marino"
    ),
    "Sao Tome and Principe" => array(
        "iso_code" => "ST",
        "timezone" => "Africa/Sao_Tome"
    ),
    "Saudi Arabia" => array(
        "iso_code" => "SA",
        "timezone" => "Asia/Riyadh"
    ),
    "Senegal"=> array(
        "iso_code" => "SN",
        "timezone" => "Africa/Dakar"
    ),
    "Serbia" => array(
        "iso_code" => "RS",
        "timezone" => "Europe/Belgrade"
    ),
    "Seychelles" => array(
        "iso_code" => "SC",
        "timezone" => "Indian/Mahe"
    ),
    "Sierra Leone" => array(
        "iso_code" => "SL",
        "timezone" => "Africa/Freetown"
    ),
    "Singapore" => array(
        "iso_code" => "SG",
        "timezone" => "Asia/Singapore"
    ),
    "Sint Maarten (Dutch part)" => array(
        "iso_code" => "SX",
        "timezone" => "America/Lower_Princes"
    ),
    "Slovakia" => array(
        "iso_code" => "SK",
        "timezone" => "Europe/Bratislava"
    ),
    "Slovenia" => array(
        "iso_code" => "SI",
        "timezone" => "Europe/Ljubljana"
    ),
    "Solomon Islands" => array(
        "iso_code" => "SB",
        "timezone" => "Pacific/Guadalcanal"
    ),
    "Somalia" => array(
        "iso_code" => "SO",
        "timezone" => "Africa/Mogadishu"
    ),
    "South Africa" => array(
        "iso_code" => "ZA",
        "timezone" => "Africa/Johannesburg"
    ),
    "South Georgia and the South Sandwich Islands" => array(
        "iso_code" => "GS",
        "timezone" => "Atlantic/South_Georgia"
    ),
    "South Sudan" => array(
        "iso_code" => "SS",
        "timezone" => "Africa/Juba"
    ),
    "Spain" => array(
        "iso_code" => "ES",
        "timezone" => "Europe/Madrid"
    ),
    "Sri Lanka" => array(
        "iso_code" => "LK",
        "timezone" => "Asia/Colombo"
    ),
    "Sudan" => array(
        "iso_code" => "SD",
        "timezone" => "Africa/Khartoum"
    ),
    "Suriname" => array(
        "iso_code" => "SR",
        "timezone" => "America/Paramaribo"
    ),
    "Svalbard and Jan Mayen" => array(
        "iso_code" => "SJ",
        "timezone" => "Arctic/Longyearbyen"
    ),
    "Sweden" => array(
        "iso_code" => "SE",
        "timezone" => "Europe/Stockholm"
    ),
    "Switzerland" => array(
        "iso_code" => "CH",
        "timezone" => "Europe/Zurich"
    ),
    "Syrian Arab Republic" => array(
        "iso_code" => "SY",
        "timezone" => "Asia/Damascus"
    ),
    "Taiwan, Province of China" => array(
        "iso_code" => "TW",
        "timezone" => "Asia/Taipei"
    ),
    "Tajikistan" => array(
        "iso_code" => "TJ",
        "timezone" => "Asia/Dushanbe"
    ),
    "Tanzania, United Republic of" => array(
        "iso_code" => "TZ",
        "timezone" => "Africa/Dar_es_S
alaam"
    ),
    "Thailand" => array(
        "iso_code" => "TH",
        "timezone" => "Asia/Bangkok"
    ),
    "Timor-Leste" => array(
        "iso_code" => "TL",
        "timezone" => "Asia/Dili"
    ),
    "Togo" => array(
        "iso_code" => "TG",
        "timezone" => "Africa/Lome"
    ),
    "Tokelau" => array(
        "iso_code" => "TK",
        "timezone" => "Pacific/Fakaofo"
    ),
    "Tonga" => array(
        "iso_code" => "TO",
        "timezone" => "Pacific/Tongatapu"
    ),
    "Trinidad and Tobago" => array(
        "iso_code" => "TT",
        "timezone" => "America/Port_of_Spain"
    ),
    "Tunisia" => array(
        "iso_code" => "TN",
        "timezone" => "Africa/Tunis"
    ),
    "Turkey" => array(
        "iso_code" => "TR",
        "timezone" => "Europe/Istanbul"
    ),
    "Turkmenistan" => array(
        "iso_code" => "TM",
        "timezone" => "Asia/Ashgabat"
    ),
    "Turks and Caicos Islands" => array(
        "iso_code" => "TC",
        "timezone" => "America/Grand_Turk"
    ),
    "Tuvalu" => array(
        "iso_code" => "TV",
        "timezone" => "Pacific/Funafuti"
    ),
    "Uganda" => array(
        "iso_code" => "UG",
        "timezone" => "Africa/Kampala"
    ),
    "Ukraine" => array(
        "iso_code" => "UA",
        "timezone" => "Europe/Kiev"
    ),
    "United Arab Emirates" => array(
        "iso_code" => "AE",
        "timezone" => "Asia/Dubai"
    ),
    "United Kingdom of Great Britain and Northern Ireland" => array(
        "iso_code" => "GB",
        "timezone" => "Europe/London"
    ),
    "United States Minor Outlying Islands" => array(
        "iso_code" => "UM",
        "timezone" => "Pacific/Midway"
    ),
    "United States of America" => array(
        "iso_code" => "US",
        "timezone" => "America/New_York"
    ),
    "Uruguay" => array(
        "iso_code" => "UY",
        "timezone" => "America/Montevideo"
    ),
    "Uzbekistan" => array(
        "iso_code" => "UZ",
        "timezone" => "Asia/Tashkent"
    ),
    "Vanuatu" => array(
        "iso_code" => "VU",
        "timezone" => "Pacific/Efate"
    ),
    "Venezuela (Bolivarian Republic of)" => array(
        "iso_code" => "VE",
        "timezone" => "America/Caracas"
    ),
    "Viet Nam" => array(
        "iso_code" => "VN",
        "timezone" => "Asia/Ho_Chi_Minh"
    ),
    "Virgin Islands (British)" => array(
        "iso_code" => "VG",
        "timezone" => "America/Tortola"
    ),
    "Virgin Islands (U.S.)" => array(
        "iso_code" => "VI",
"timezone" => "America/St_Thomas"
    ),
    "Wallis and Futuna" => array(
        "iso_code" => "WF",
        "timezone" => "Pacific/Wallis"
    ),
    "Western Sahara" => array(
        "iso_code" => "EH",
        "timezone" => "Africa/El_Aaiun"
    ),
    "Yemen" => array(
        "iso_code" => "YE",
        "timezone" => "Asia/Aden"
    ),
    "Zambia" => array(
        "iso_code" => "ZM",
        "timezone" => "Africa/Lusaka"
    ),
    "Zimbabwe" => array(
        "iso_code" => "ZW",
        "timezone" => "Africa/Harare"
    )
);
  $query = "UPDATE pays SET timezone = :timezone WHERE alpha2 = :iso";
    $statement = $pdo->prepare($query);

    foreach ($countries as  $country) {
        $statement->bindParam(':timezone', $country['timezone']);
        $statement->bindParam(':iso', $country["iso_code"]);
        $statement->execute();
        echo "Updated timezone for ".$country['iso_code']." to ".$country['timezone'].".<br>";
    }