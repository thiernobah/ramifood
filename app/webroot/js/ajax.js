$(function() {
$("#dep_display").hide();
$("#citie_display").hide();

			

	$.datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin',
			'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
		monthNamesShort: ['janv.', 'févr.', 'mars', 'avril', 'mai', 'juin',
			'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'],
		dayNames: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
		dayNamesShort: ['dim.', 'lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.'],
		dayNamesMin: ['D','L','M','M','J','V','S'],
		weekHeader: 'Sem.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['fr']);


$( "#datepicker" ).datepicker();
    /* find department */
    $("#an_region").change(function() {
        var str = "";
        $("#dep_display").after('<img src="/ramifood/img/blue_ajax.gif" class="aload">');
        $("#an_region option:selected").each(function() {
            region_id = $(this).val();
            url = '/ramifood/ajax/department';
            
            $.post(url, {region_id: region_id}, function(data) {
                options = $("#an_department");
                options.empty();
                $.each(data, function() {
                    options.append($('<option></option>').attr("value", this.id).text(this.name));
                });
                $("img.aload").fadeOut();
                $("#dep_display").show(100);
            }, 'json');
        });

    });
    /*end department finding*/
    
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
   //my_id = $("#province option:selected").val()
   $("#an_department").change(function(){
      department = $("#an_department option:selected").val();
      $("#an_cities").val('');
      $("#citie_display").show(100);
   });
 
    $( "#an_cities" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "/ramifood/ajax/cities/",
          dataType: "json",
          type:'post',
          data: {
            featureClass: "P",
            style: "full",
            department:department,
            maxRows: 5,
            name_startsWith: request.term
          },
          success: function( data ) {
            response($.map(data, function(value,key) {
            return { label:value.City.name+"   "+value.City.postalcode , 
                     value: value.City.name,
                     hvalue:value.City.id     
                }
          }));
          }
        });
      },
      minLength: 2,
      select: function( event, ui ) {
          $('input[name="cities_id"]').val(ui.item.hvalue);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });


});


