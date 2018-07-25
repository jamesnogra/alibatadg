var curent_character = '';
var at_index = 0;
var full_name = '';
var all_chars = [
	'a', 'e_i', 'o_u',
	'ba', 'be_bi', 'bo_bu', 'b',
	'ka', 'ke_ki', 'ko_ku', 'k',
	'da_ra', 'de_di', 'do_du', 'd',
	'ga', 'ge_gi', 'go_gu', 'g',
	'ha', 'he_hi', 'ho_hu', 'h',
	'la', 'le_li', 'lo_lu', 'l',
	'ma', 'me_mi', 'mo_mu', 'm',
	'na', 'ne_ni', 'no_nu', 'n',
	'nga', 'nge_ngi', 'ngo_ngu', 'ng',
	'pa', 'pe_pi', 'po_pu', 'p',
	'sa', 'se_si', 'so_su', 's',
	'ta', 'te_ti', 'to_tu', 't',
	'wa', 'we_wi', 'wo_wu', 'w',
	'ya', 'ye_yi', 'yo_yu', 'y',
];

function submitAndUpload() {
	full_name = document.getElementById("full-name").value;
	if (full_name.length < 5) {
		alert("Please enter your full name!");
		document.getElementById("full-name").focus();
		return;
	}
	//grab the context from your destination canvas
	var dest_context = document.getElementById('sheet-small').getContext("2d");
	var source_canvas = document.getElementById('sheet');
	dest_context.drawImage(source_canvas, 0, 0,28,28);
	// Generate the image data
    var pic = document.getElementById("sheet-small").toDataURL("image/png");
    pic = pic.replace(/^data:image\/(png|jpg);base64,/, "");
    // Sending the image data to Server
    $.post("http://64.137.221.224/test-upload.php", {'curent_character':curent_character, 'full_name':full_name, 'imageData':pic}, function(result) {
		//$( ".result" ).html( data );
	});
	clearCanvas();
	at_index++;
	if (at_index>=all_chars.length) {
		at_index = 0;
		shuffleArr(all_chars);
	}
	curent_character = all_chars[at_index];
	console.log("Showing character '"+curent_character+"' at index "+at_index+". Total characters is "+all_chars.length+".");
	showCharacter(curent_character);

    /*$.ajax({
        type: 'POST',
        url: 'http://64.137.221.224/test-upload.php',
        data: '{ "imageData" : "' + pic + '" }',
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function (msg) {
            alert(msg);
        }
    });*/
}

function showCharacter(letter) {
	curent_character = letter;
	document.getElementById("display-meaning").innerHTML = curent_character.replace('_', '/');
	for (var x=1; x<=3; x++) {
		document.getElementById("display-image-"+x).innerHTML = '<img class="display-image-container" src="images/characters/'+curent_character+'.'+x+'.bmp" width="150" height="150" />';
		//document.getElementById("display-image-"+x).style.backgroundImage = "url('images/characters/"+curent_character+"."+x+".bmp')";
	}
}

//from https://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
function shuffleArr(array) {
	var currentIndex = array.length, temporaryValue, randomIndex;
	while (0 !== currentIndex) {
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;
		temporaryValue = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temporaryValue;
	}
	return array;
}

shuffleArr(all_chars);
showCharacter(all_chars[at_index]);