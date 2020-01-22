/**
 *
 * My Javascript custom author @Dwi Nuryadi.
 * 
 */

// data table
$(document).ready(function(){
      $('#tables').DataTable();
});

$(document).ready(function(){
    var table =  $('#tables1').DataTable({
		scrollCollapse : true,
		paging : true,
		fixedColumns: {
			leftColumns:1,
			rightColumns:1
		}
	});
});

// data tables child-row
$(document).ready(function (){
	var table = $('#tables2').DataTable({
		'responsive':true
	});

	$('#btn-show-all-data').on('click', function(){
		table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
	});

	$('#btn-hide-all-data').on('click', function(){
		table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
	});
});

// show hide div
function gantipass() {
	var checkBox =
	document.getElementById("myCheck");
		var text = document.getElementById("show");
		if (checkBox.checked == true) {
			text.style.display ="block";
		}else{
			text.style.display ="none";
		}
}

//show hide password
$(document).ready(function(){
  $(".reveal").on('click', function(){
    var $pwd = $(".pwd");
	    if($pwd.attr('type') === 'password') {
	      $pwd.attr('type', 'text');
	    }else{
	      $pwd.attr('type','password');
	    }
    });
});

//datepicker
$(document).ready(function(){
	$('.tanggal').datepicker({
		format:"dd-mm-yyyy",
		autoclose:true
	});
});

$(document).ready(function(){
	$('.tanggallahir').datepicker({
		format:"dd-mm-yyyy",
		startView: 'decade',
		autoclose:true
	});
});

//timepicker
$(document).ready(function(){
	$('.timepicker').timepicker({
		//showInputs: false,
		autoclose:true,
		showMeridian: false
	});
});

//show hide radio button
function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}


//show hide pilihan tugas
$(document).ready(function(){

    $('.tugas').on('change',function(){
        var value = $(this).val();
        if(value == "tambahan"){
            $( ".tambahan" ).show();
            $( ".jabatan" ).hide();

        }else if(value == "jabatan"){
            $( ".tambahan" ).hide();
            $( ".jabatan" ).show();
        }

    });

});









