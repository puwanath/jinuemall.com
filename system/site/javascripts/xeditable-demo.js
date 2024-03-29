(function() {
  var c;

  c = (window.location.href.match(/c=inline/i) ? "inline" : "popup");

  $.fn.editable.defaults.mode = (c === "inline" ? "inline" : "popup");
  $(function() {
    var countries;
    $("#c").val(c);
    $.fn.editable.defaults.url = "";
    $.fn.editable.defaults.mode = "inline";
    $("#enable").click(function() {
      return $("#user .editable").editable("toggleDisabled");
    });
    
    $(".editable-form #username").editable({
		url: "ajax?process=member_username_check",
		type: "text",
		success: function(response, newValue){
			if (response==0) {
			  $("#username_check_status").html("<i class='fa fa-check-circle'></i>");
			  $("#username_check_status").attr("style" , "color:green");
			}else{
			  $("#username_check_status").html("<i class='fa fa-times-circle'></i> This username isn't available.");
			  $("#username_check_status").attr("style" , "color:red");
			}
		}
    });
    $(".editable-form #username_check_only").editable({
		url: "ajax?process=member_username_check_only",
		type: "text",
		validate: function(value) {
			if ($.trim(value) === "") {
			  return "This field is required";
			}
		},
		success: function(response, newValue){
			if (response==0) {
			  $("#username_check_status").html("<i class='fa fa-check-circle'></i>");
			  $("#username_check_status").attr("style" , "color:green");
			}else{
			  $("#username_check_status").html("<i class='fa fa-times-circle'></i> This username isn't available.");
			  $("#username_check_status").attr("style" , "color:red");
			}
		}
    });
    $(".editable-form #firstname").editable({
		mode: "inline",
      url: "ajax?process=member_edit&edit=member_name",
      type: "text"
    });
    $(".editable-form #surname").editable({
		mode: "inline",
      url: "ajax?process=member_edit&edit=member_surname",
      type: "text"
    });
    $(".editable-form #address").editable({
      url: "ajax?process=member_edit&edit=member_address",
      type: "text"
    });
    $(".editable-form #phone").editable({
      url: "ajax?process=member_edit&edit=member_phone",
      type: "text"
    });
    $(".editable-form #email").editable({
      url: "ajax?process=member_edit&edit=member_email",
      type: "text"
    });
    $(".editable-form #zipcode").editable({
      url: "ajax?process=member_edit&edit=member_zipcode",
      type: "text"
    });
    $(".editable-form #oldpassword").editable({

      url: "ajax?process=member_password_check",
      type: 'password',
      success: function(response, newValue){
        if (response==1) {
          $("#newpassword").attr("style" , "");
          $("#oldpassword").attr("style" , "display:none");
          $("#password_check_status").html("<i class='fa fa-check-circle'></i>");
          $("#password_check_status").attr("style" , "color:green");
        }else{
          $("#newpassword").attr("style" , "display:none");
          $("#oldpassword").attr("style" , "");
          $("#oldpassword").html("Enter your current password.");
          $("#password_check_status").html("<i class='fa fa-times-circle'></i> Password incorrect");
          $("#password_check_status").attr("style" , "color:red");
        }
      }
    });
     $(".editable-form #newpassword").editable({
	  mode: "inline",
      url: "ajax?process=member_password_update&edit=member_password",
      type: "password"
    });
    countries = [];
    $.each({
      BD: "Bangladesh",
      BE: "Belgium",
      BF: "Burkina Faso",
      BG: "Bulgaria",
      BA: "Bosnia and Herzegovina",
      BB: "Barbados",
      WF: "Wallis and Futuna",
      BL: "Saint Bartelemey",
      BM: "Bermuda",
      BN: "Brunei Darussalam",
      BO: "Bolivia",
      BH: "Bahrain",
      BI: "Burundi",
      BJ: "Benin",
      BT: "Bhutan",
      JM: "Jamaica",
      BV: "Bouvet Island",
      BW: "Botswana",
      WS: "Samoa",
      BR: "Brazil",
      BS: "Bahamas",
      JE: "Jersey",
      BY: "Belarus",
      O1: "Other Country",
      LV: "Latvia",
      RW: "Rwanda",
      RS: "Serbia",
      TL: "Timor-Leste",
      RE: "Reunion",
      LU: "Luxembourg",
      TJ: "Tajikistan",
      RO: "Romania",
      PG: "Papua New Guinea",
      GW: "Guinea-Bissau",
      GU: "Guam",
      GT: "Guatemala",
      GS: "South Georgia and the South Sandwich Islands",
      GR: "Greece",
      GQ: "Equatorial Guinea",
      GP: "Guadeloupe",
      JP: "Japan",
      GY: "Guyana",
      GG: "Guernsey",
      GF: "French Guiana",
      GE: "Georgia",
      GD: "Grenada",
      GB: "United Kingdom",
      GA: "Gabon",
      SV: "El Salvador",
      GN: "Guinea",
      GM: "Gambia",
      GL: "Greenland",
      GI: "Gibraltar",
      GH: "Ghana",
      OM: "Oman",
      TN: "Tunisia",
      JO: "Jordan",
      HR: "Croatia",
      HT: "Haiti",
      HU: "Hungary",
      HK: "Hong Kong",
      HN: "Honduras",
      HM: "Heard Island and McDonald Islands",
      VE: "Venezuela",
      PR: "Puerto Rico",
      PS: "Palestinian Territory",
      PW: "Palau",
      PT: "Portugal",
      SJ: "Svalbard and Jan Mayen",
      PY: "Paraguay",
      IQ: "Iraq",
      PA: "Panama",
      PF: "French Polynesia",
      BZ: "Belize",
      PE: "Peru",
      PK: "Pakistan",
      PH: "Philippines",
      PN: "Pitcairn",
      TM: "Turkmenistan",
      PL: "Poland",
      PM: "Saint Pierre and Miquelon",
      ZM: "Zambia",
      EH: "Western Sahara",
      RU: "Russian Federation",
      EE: "Estonia",
      EG: "Egypt",
      TK: "Tokelau",
      ZA: "South Africa",
      EC: "Ecuador",
      IT: "Italy",
      VN: "Vietnam",
      SB: "Solomon Islands",
      EU: "Europe",
      ET: "Ethiopia",
      SO: "Somalia",
      ZW: "Zimbabwe",
      SA: "Saudi Arabia",
      ES: "Spain",
      ER: "Eritrea",
      ME: "Montenegro",
      MD: "Moldova, Republic of",
      MG: "Madagascar",
      MF: "Saint Martin",
      MA: "Morocco",
      MC: "Monaco",
      UZ: "Uzbekistan",
      MM: "Myanmar",
      ML: "Mali",
      MO: "Macao",
      MN: "Mongolia",
      MH: "Marshall Islands",
      MK: "Macedonia",
      MU: "Mauritius",
      MT: "Malta",
      MW: "Malawi",
      MV: "Maldives",
      MQ: "Martinique",
      MP: "Northern Mariana Islands",
      MS: "Montserrat",
      MR: "Mauritania",
      IM: "Isle of Man",
      UG: "Uganda",
      TZ: "Tanzania, United Republic of",
      MY: "Malaysia",
      MX: "Mexico",
      IL: "Israel",
      FR: "France",
      IO: "British Indian Ocean Territory",
      FX: "France, Metropolitan",
      SH: "Saint Helena",
      FI: "Finland",
      FJ: "Fiji",
      FK: "Falkland Islands (Malvinas)",
      FM: "Micronesia, Federated States of",
      FO: "Faroe Islands",
      NI: "Nicaragua",
      NL: "Netherlands",
      NO: "Norway",
      NA: "Namibia",
      VU: "Vanuatu",
      NC: "New Caledonia",
      NE: "Niger",
      NF: "Norfolk Island",
      NG: "Nigeria",
      NZ: "New Zealand",
      NP: "Nepal",
      NR: "Nauru",
      NU: "Niue",
      CK: "Cook Islands",
      CI: "Cote d'Ivoire",
      CH: "Switzerland",
      CO: "Colombia",
      CN: "China",
      CM: "Cameroon",
      CL: "Chile",
      CC: "Cocos (Keeling) Islands",
      CA: "Canada",
      CG: "Congo",
      CF: "Central African Republic",
      CD: "Congo, The Democratic Republic of the",
      CZ: "Czech Republic",
      CY: "Cyprus",
      CX: "Christmas Island",
      CR: "Costa Rica",
      CV: "Cape Verde",
      CU: "Cuba",
      SZ: "Swaziland",
      SY: "Syrian Arab Republic",
      KG: "Kyrgyzstan",
      KE: "Kenya",
      SR: "Suriname",
      KI: "Kiribati",
      KH: "Cambodia",
      KN: "Saint Kitts and Nevis",
      KM: "Comoros",
      ST: "Sao Tome and Principe",
      SK: "Slovakia",
      KR: "Korea, Republic of",
      SI: "Slovenia",
      KP: "Korea, Democratic People's Republic of",
      KW: "Kuwait",
      SN: "Senegal",
      SM: "San Marino",
      SL: "Sierra Leone",
      SC: "Seychelles",
      KZ: "Kazakhstan",
      KY: "Cayman Islands",
      SG: "Singapore",
      SE: "Sweden",
      SD: "Sudan",
      DO: "Dominican Republic",
      DM: "Dominica",
      DJ: "Djibouti",
      DK: "Denmark",
      VG: "Virgin Islands, British",
      DE: "Germany",
      YE: "Yemen",
      DZ: "Algeria",
      US: "United States",
      UY: "Uruguay",
      YT: "Mayotte",
      UM: "United States Minor Outlying Islands",
      LB: "Lebanon",
      LC: "Saint Lucia",
      LA: "Lao People's Democratic Republic",
      TV: "Tuvalu",
      TW: "Taiwan",
      TT: "Trinidad and Tobago",
      TR: "Turkey",
      LK: "Sri Lanka",
      LI: "Liechtenstein",
      A1: "Anonymous Proxy",
      TO: "Tonga",
      LT: "Lithuania",
      A2: "Satellite Provider",
      LR: "Liberia",
      LS: "Lesotho",
      TH: "Thailand",
      TF: "French Southern Territories",
      TG: "Togo",
      TD: "Chad",
      TC: "Turks and Caicos Islands",
      LY: "Libyan Arab Jamahiriya",
      VA: "Holy See (Vatican City State)",
      VC: "Saint Vincent and the Grenadines",
      AE: "United Arab Emirates",
      AD: "Andorra",
      AG: "Antigua and Barbuda",
      AF: "Afghanistan",
      AI: "Anguilla",
      VI: "Virgin Islands, U.S.",
      IS: "Iceland",
      IR: "Iran, Islamic Republic of",
      AM: "Armenia",
      AL: "Albania",
      AO: "Angola",
      AN: "Netherlands Antilles",
      AQ: "Antarctica",
      AP: "Asia/Pacific Region",
      AS: "American Samoa",
      AR: "Argentina",
      AU: "Australia",
      AT: "Austria",
      AW: "Aruba",
      IN: "India",
      AX: "Aland Islands",
      AZ: "Azerbaijan",
      IE: "Ireland",
      ID: "Indonesia",
      UA: "Ukraine",
      QA: "Qatar",
      MZ: "Mozambique"
    }, function(k, v) {
      return countries.push({
        id: v,
        text: v
      });
    });
    $(".editable-form #country").editable({
      url: "process.php?process=member_edit&edit=member_country",
      source: countries,
      select2: {
        width: 200
      }
    });
    $(".editable-form #username_check_exist").editable({
      url: "process.php?process=username_check_exist",
      type: "text",
	  success: function(response, newValue){
        if (response==0) {
          document.getElementById("username_check_exist_status").innerHTML="You can use this username.";
        }else{
          document.getElementById("username_check_exist_status").innerHTML=response;   
        }
      }
    });

    
    $("#sex").editable({
      prepend: "not selected",
      source: [
        {
          value: 1,
          text: "Male"
        }, {
          value: 2,
          text: "Female"
        }
      ]
    });
    $(".editable-form #status").editable();
    $(".editable-form #group").editable({
      showbuttons: false
    });
    $(".editable-form #vacation").editable({
      datepicker: {
        todayBtn: "linked"
      }
    });
    $(".editable-form #dob").editable();
    $(".editable-form #event").editable({
      placement: "right",
      combodate: {
        firstItem: "name"
      }
    });
    $(".editable-form #meeting_start").editable({
      format: "yyyy-mm-dd hh:ii",
      viewformat: "dd/mm/yyyy hh:ii",
      validate: function(v) {
        if (v && v.getDate() === 10) {
          return "Day cant be 10!";
        }
      },
      datetimepicker: {
        todayBtn: "linked",
        weekStart: 1
      }
    });
    $(".editable-form #comments").editable({
      showbuttons: "bottom"
    });
    $(".editable-form #note").editable();
    $(".editable-form #pencil").click(function(e) {
      e.stopPropagation();
      e.preventDefault();
      return $("#note").editable("toggle");
    });
    $(".editable-form #state").editable({
      source: ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"]
    });
    $(".editable-form #state2").editable({
      value: "California",
      typeahead: {
        name: "state",
        local: ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"]
      }
    });
    $(".editable-form #fruits").editable({
      pk: 1,
      limit: 3,
      source: [
        {
          value: 1,
          text: "banana"
        }, {
          value: 2,
          text: "peach"
        }, {
          value: 3,
          text: "apple"
        }, {
          value: 4,
          text: "watermelon"
        }, {
          value: 5,
          text: "orange"
        }
      ]
    });
    $(".editable-form #tags").editable({
      inputclass: "input-large",
      select2: {
        tags: ["html", "javascript", "css", "ajax"],
        tokenSeparators: [",", " "]
      }
    });
    return $("#user .editable").on("hidden", function(e, reason) {
      var $next;
      if (reason === "save" || reason === "nochange") {
        $next = $(this).closest("tr").next().find(".editable");
        if ($("#autoopen").is(":checked")) {
          return setTimeout((function() {
            return $next.editable("show");
          }), 300);
        } else {
          return $next.focus();
        }
      }
    });
  });

}).call(this);
