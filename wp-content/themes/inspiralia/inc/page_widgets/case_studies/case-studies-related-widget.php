<?php
function case_studies_intro_meta_box_markup($post) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'case_studies_intro_meta_box_nonce' );
  $args = array(
      'depth'                 => 2,
      // 'child_of'              => $post->post_parent,
      'selected'              => get_post_meta($post->ID, "case-studies-intro-meta-page_id", true),
      'name'                  => 'case-studies-intro-meta-page_id'
  );
 ?>
  <div style="display: block;">
    <?php $image_url = (get_post_meta($post->ID, "case-studies-intro-imagen", true )) ? get_post_meta($post->ID, "case-studies-intro-imagen", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="case-studies-intro-imagen-preview"/><br/>
    <label for="case-studies-intro-image" class="post-attributes-label">Image</label><br/>
    <input id="case-studies-intro-imagen" type="text" name="case-studies-intro-imagen" value="<?php echo $image_url ?>" />
    <input id="case-studies-intro-imagen-button" class="button" type="button" value="Upload Image" /><br/>
    <hr/>
    <?php $logo_url = (get_post_meta($post->ID, "case-studies-intro-logo", true )) ? get_post_meta($post->ID, "case-studies-intro-logo", true ) : ''; ?>
    <img src="<?php echo $logo_url ?>" width="150" id="case-studies-intro-logo-preview"/><br/>
    <label for="case-studies-intro-logo" class="post-attributes-label">Logo</label><br/>
    <input id="case-studies-intro-logo" type="text" name="case-studies-intro-logo" value="<?php echo $logo_url ?>" />
    <input id="case-studies-intro-logo-button" class="button" type="button" value="Upload Image" /><br/>
    <hr/>
    <?php $pdf_url = (get_post_meta($post->ID, "case-studies-intro-pdf", true )) ? get_post_meta($post->ID, "case-studies-intro-pdf", true ) : ''; ?>
    <label for="case-studies-intro-pdf" class="post-attributes-label">PDF</label><br/>
    <input id="case-studies-intro-pdf" type="text" name="case-studies-intro-pdf" value="<?php echo $pdf_url ?>" />
    <input id="case-studies-intro-pdf-button" class="button" type="button" value="Upload PDF" /><br/>


    <label for="case-studies-intro-title" class="post_attributes_label">Title</label><br/>
    <input name="case-studies-intro-title" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "case-studies-intro-title", true); ?>"><br/>
    <label for="case-studies-intro" class="post_attributes_label">Introduction</label><br/>
    <input name="case-studies-intro" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "case-studies-intro", true); ?>"><br/>
    <hr/>
    <fieldset>
      <legend><h1>Services</h1></legend>
      <?php echo show_page_selects('case_studies_intro_services', 2); ?>
    </fieldset>
    <hr/>
    <fieldset>
      <legend><h1>Markets</h1></legend>
      <?php echo show_page_selects('case_studies_intro_markets', 2); ?>
    </fieldset>
    <hr/>
    <fieldset>
      <legend><h1>Countries</h1></legend>
      <?php
      $countries = array("AF" => "Afghanistan",
                         "AX" => "Åland Islands",
                         "AL" => "Albania",
                         "DZ" => "Algeria",
                         "AS" => "American Samoa",
                         "AD" => "Andorra",
                         "AO" => "Angola",
                         "AI" => "Anguilla",
                         "AQ" => "Antarctica",
                         "AG" => "Antigua and Barbuda",
                         "AR" => "Argentina",
                         "AM" => "Armenia",
                         "AW" => "Aruba",
                         "AU" => "Australia",
                         "AT" => "Austria",
                         "AZ" => "Azerbaijan",
                         "BS" => "Bahamas",
                         "BH" => "Bahrain",
                         "BD" => "Bangladesh",
                         "BB" => "Barbados",
                         "BY" => "Belarus",
                         "BE" => "Belgium",
                         "BZ" => "Belize",
                         "BJ" => "Benin",
                         "BM" => "Bermuda",
                         "BT" => "Bhutan",
                         "BO" => "Bolivia",
                         "BA" => "Bosnia and Herzegovina",
                         "BW" => "Botswana",
                         "BV" => "Bouvet Island",
                         "BR" => "Brazil",
                         "IO" => "British Indian Ocean Territory",
                         "BN" => "Brunei Darussalam",
                         "BG" => "Bulgaria",
                         "BF" => "Burkina Faso",
                         "BI" => "Burundi",
                         "KH" => "Cambodia",
                         "CM" => "Cameroon",
                         "CA" => "Canada",
                         "CV" => "Cape Verde",
                         "KY" => "Cayman Islands",
                         "CF" => "Central African Republic",
                         "TD" => "Chad",
                         "CL" => "Chile",
                         "CN" => "China",
                         "CX" => "Christmas Island",
                         "CC" => "Cocos (Keeling) Islands",
                         "CO" => "Colombia",
                         "KM" => "Comoros",
                         "CG" => "Congo",
                         "CD" => "Congo, The Democratic Republic of The",
                         "CK" => "Cook Islands",
                         "CR" => "Costa Rica",
                         "CI" => "Cote D'ivoire",
                         "HR" => "Croatia",
                         "CU" => "Cuba",
                         "CY" => "Cyprus",
                         "CZ" => "Czech Republic",
                         "DK" => "Denmark",
                         "DJ" => "Djibouti",
                         "DM" => "Dominica",
                         "DO" => "Dominican Republic",
                         "EC" => "Ecuador",
                         "EG" => "Egypt",
                         "SV" => "El Salvador",
                         "GQ" => "Equatorial Guinea",
                         "ER" => "Eritrea",
                         "EE" => "Estonia",
                         "ET" => "Ethiopia",
                         "FK" => "Falkland Islands (Malvinas)",
                         "FO" => "Faroe Islands",
                         "FJ" => "Fiji",
                         "FI" => "Finland",
                         "FR" => "France",
                         "GF" => "French Guiana",
                         "PF" => "French Polynesia",
                         "TF" => "French Southern Territories",
                         "GA" => "Gabon",
                         "GM" => "Gambia",
                         "GE" => "Georgia",
                         "DE" => "Germany",
                         "GH" => "Ghana",
                         "GI" => "Gibraltar",
                         "GR" => "Greece",
                         "GL" => "Greenland",
                         "GD" => "Grenada",
                         "GP" => "Guadeloupe",
                         "GU" => "Guam",
                         "GT" => "Guatemala",
                         "GG" => "Guernsey",
                         "GN" => "Guinea",
                         "GW" => "Guinea-bissau",
                         "GY" => "Guyana",
                         "HT" => "Haiti",
                         "HM" => "Heard Island and Mcdonald Islands",
                         "VA" => "Holy See (Vatican City State)",
                         "HN" => "Honduras",
                         "HK" => "Hong Kong",
                         "HU" => "Hungary",
                         "IS" => "Iceland",
                         "IN" => "India",
                         "ID" => "Indonesia",
                         "IR" => "Iran, Islamic Republic of",
                         "IQ" => "Iraq",
                         "IE" => "Ireland",
                         "IM" => "Isle of Man",
                         "IL" => "Israel",
                         "IT" => "Italy",
                         "JM" => "Jamaica",
                         "JP" => "Japan",
                         "JE" => "Jersey",
                         "JO" => "Jordan",
                         "KZ" => "Kazakhstan",
                         "KE" => "Kenya",
                         "KI" => "Kiribati",
                         "KP" => "Korea, Democratic People's Republic of",
                         "KR" => "Korea, Republic of",
                         "KW" => "Kuwait",
                         "KG" => "Kyrgyzstan",
                         "LA" => "Lao People's Democratic Republic",
                         "LV" => "Latvia",
                         "LB" => "Lebanon",
                         "LS" => "Lesotho",
                         "LR" => "Liberia",
                         "LY" => "Libyan Arab Jamahiriya",
                         "LI" => "Liechtenstein",
                         "LT" => "Lithuania",
                         "LU" => "Luxembourg",
                         "MO" => "Macao",
                         "MK" => "Macedonia, The Former Yugoslav Republic of",
                         "MG" => "Madagascar",
                         "MW" => "Malawi",
                         "MY" => "Malaysia",
                         "MV" => "Maldives",
                         "ML" => "Mali",
                         "MT" => "Malta",
                         "MH" => "Marshall Islands",
                         "MQ" => "Martinique",
                         "MR" => "Mauritania",
                         "MU" => "Mauritius",
                         "YT" => "Mayotte",
                         "MX" => "Mexico",
                         "FM" => "Micronesia, Federated States of",
                         "MD" => "Moldova, Republic of",
                         "MC" => "Monaco",
                         "MN" => "Mongolia",
                         "ME" => "Montenegro",
                         "MS" => "Montserrat",
                         "MA" => "Morocco",
                         "MZ" => "Mozambique",
                         "MM" => "Myanmar",
                         "NA" => "Namibia",
                         "NR" => "Nauru",
                         "NP" => "Nepal",
                         "NL" => "Netherlands",
                         "AN" => "Netherlands Antilles",
                         "NC" => "New Caledonia",
                         "NZ" => "New Zealand",
                         "NI" => "Nicaragua",
                         "NE" => "Niger",
                         "NG" => "Nigeria",
                         "NU" => "Niue",
                         "NF" => "Norfolk Island",
                         "MP" => "Northern Mariana Islands",
                         "NO" => "Norway",
                         "OM" => "Oman",
                         "PK" => "Pakistan",
                         "PW" => "Palau",
                         "PS" => "Palestinian Territory, Occupied",
                         "PA" => "Panama",
                         "PG" => "Papua New Guinea",
                         "PY" => "Paraguay",
                         "PE" => "Peru",
                         "PH" => "Philippines",
                         "PN" => "Pitcairn",
                         "PL" => "Poland",
                         "PT" => "Portugal",
                         "PR" => "Puerto Rico",
                         "QA" => "Qatar",
                         "RE" => "Reunion",
                         "RO" => "Romania",
                         "RU" => "Russian Federation",
                         "RW" => "Rwanda",
                         "SH" => "Saint Helena",
                         "KN" => "Saint Kitts and Nevis",
                         "LC" => "Saint Lucia",
                         "PM" => "Saint Pierre and Miquelon",
                         "VC" => "Saint Vincent and The Grenadines",
                         "WS" => "Samoa",
                         "SM" => "San Marino",
                         "ST" => "Sao Tome and Principe",
                         "SA" => "Saudi Arabia",
                         "SN" => "Senegal",
                         "RS" => "Serbia",
                         "SC" => "Seychelles",
                         "SL" => "Sierra Leone",
                         "SG" => "Singapore",
                         "SK" => "Slovakia",
                         "SI" => "Slovenia",
                         "SB" => "Solomon Islands",
                         "SO" => "Somalia",
                         "ZA" => "South Africa",
                         "GS" => "South Georgia and The South Sandwich Islands",
                         "ES" => "Spain",
                         "LK" => "Sri Lanka",
                         "SD" => "Sudan",
                         "SR" => "Suriname",
                         "SJ" => "Svalbard and Jan Mayen",
                         "SZ" => "Swaziland",
                         "SE" => "Sweden",
                         "CH" => "Switzerland",
                         "SY" => "Syrian Arab Republic",
                         "TW" => "Taiwan, Province of China",
                         "TJ" => "Tajikistan",
                         "TZ" => "Tanzania, United Republic of",
                         "TH" => "Thailand",
                         "TL" => "Timor-leste",
                         "TG" => "Togo",
                         "TK" => "Tokelau",
                         "TO" => "Tonga",
                         "TT" => "Trinidad and Tobago",
                         "TN" => "Tunisia",
                         "TR" => "Turkey",
                         "TM" => "Turkmenistan",
                         "TC" => "Turks and Caicos Islands",
                         "TV" => "Tuvalu",
                         "UG" => "Uganda",
                         "UA" => "Ukraine",
                         "AE" => "United Arab Emirates",
                         "GB" => "United Kingdom",
                         "US" => "United States",
                         "UM" => "United States Minor Outlying Islands",
                         "UY" => "Uruguay",
                         "UZ" => "Uzbekistan",
                         "VU" => "Vanuatu",
                         "VE" => "Venezuela",
                         "VN" => "Viet Nam",
                         "VG" => "Virgin Islands, British",
                         "VI" => "Virgin Islands, U.S.",
                         "WF" => "Wallis and Futuna",
                         "EH" => "Western Sahara",
                         "YE" => "Yemen",
                         "ZM" => "Zambia",
                         "ZW" => "Zimbabwe");
      ?>
      <?php for($i=0; $i<=2; $i++) { ?>
        <label for="case_studies_intro_countries_<?php echo $i ?>_page_id" class="post_attributes_related">Related to:</label><br/>
        <select name="case_studies_intro_countries_<?php echo $i ?>_page_id" id="case_studies_intro_countries_<?php echo $i ?>_page_id">
            <?php foreach($countries as $key => $country) { ?>
                <option <?php echo (get_post_meta('case_studies_intro_countries_'. $i . "_page_id", true) == $key ? 'selected="selected"' : '') ?> value="<?php echo $key ?>"><?php echo $country ?></option>
            <?php } ?>
        </select><br/>
      <?php } ?>
    </fieldset>
  </div>
  <div style="clear: both;"></div>
<?php }

function show_page_selects($name, $elements) {
  global $post;
  $args = array();
  for($i=0; $i<=$elements; $i++) {
    $args = array(
      'depth'                 => 2,
      'selected'              => get_post_meta($post->ID, $name .'_'. $i . "_page_id", true),
      'name'                  => $name .'_'. $i . "_page_id",
      'show_option_none'      => '(no parent)'
    ); ?>
    <label for="<?php echo $name .'_'. $i ?>_page_id" class="post_attributes_related">Related to:</label><br/>
    <?php wp_dropdown_pages($args); ?><br/>
  <? }
}

function add_case_studies_intro_meta_box() {
  global $post;
    if ( 'templates/case_studies.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( count(get_ancestors( $post->ID, 'page', 'post_type' ) ) > 0 ) )  {
    add_meta_box("case_studies_intro_meta_box", "Case Studies Related Element Box", "case_studies_intro_meta_box_markup", "page", "normal", "high", null);
  }
}

  add_action("add_meta_boxes", "add_case_studies_intro_meta_box");

function save_page_selects($name, $elements, $post_id) {
  for($i=0; $i<=$elements; $i++) {
    if(isset($_POST[$name .'_'. $i . "_page_id"])) {
        $related_items = $_POST[$name .'_'. $i . "_page_id"];
    }
    update_post_meta($post_id, $name .'_'. $i . "_page_id", $related_items);
  }
}


function save_case_studies_intro_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    save_page_selects('case_studies_intro_services', 2, $post_id);
    save_page_selects('case_studies_intro_markets', 2, $post_id);
    save_page_selects('case_studies_intro_countries', 2, $post_id);

    if(isset($_POST["case-studies-intro-imagen"])) {
        $market_meta_background_image= $_POST["case-studies-intro-imagen"];
    }
    update_post_meta($post_id, "case-studies-intro-imagen", $market_meta_background_image);

    if(isset($_POST["case-studies-intro-logo"])) {
        $market_meta_logo= $_POST["case-studies-intro-logo"];
    }
    update_post_meta($post_id, "case-studies-intro-logo", $market_meta_logo);

    if(isset($_POST["case-studies-intro-pdf"])) {
        $market_meta_pdf= $_POST["case-studies-intro-pdf"];
    }
    update_post_meta($post_id, "case-studies-intro-pdf", $market_meta_pdf);

    if(isset($_POST["case-studies-intro-title"])) {
        $meta_box_title_value = $_POST["case-studies-intro-title"];
    }
    update_post_meta($post_id, "case-studies-intro-title", $meta_box_title_value);

    if(isset($_POST["case-studies-intro"])) {
        $meta_box_title_value = $_POST["case-studies-intro"];
    }
    update_post_meta($post_id, "case-studies-intro", $meta_box_title_value);
}


add_action("save_post", "save_case_studies_intro_meta_box", 10, 3);
