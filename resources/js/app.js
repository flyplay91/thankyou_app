require('./bootstrap');

$(document).ready(function() {
  $('input[type="file"]').on("change", function() {
	let filenames = [];
	let files = this.files;
	if (files.length > 1) {
	  filenames.push("Total Files (" + files.length + ")");
	} else {
	  for (let i in files) {
		if (files.hasOwnProperty(i)) {
		  filenames.push(files[i].name);
		}
	  }
	}
	$(this)
	  .next(".custom-file-label")
	  .html(filenames.join(","));
  });

  $('.select-product-store').on('change', function() {
	  var selected_store_id = $(this).val();

	  $.ajax({
			url: "/get-brands",
			method: "GET",
			data: {
				store_id: selected_store_id,
				__token: $('meta[name=csrf-token]').attr("content")
			},
			success: function(results) {
				var html = '';
				html += '<select class="browser-default custom-select mb-3" name="brand_id" required>';
					html += '<option selected>Select Brand</option>';
					$.each(results, function( index, value ) {
					  html += '<option value="'+value.brand_id+'">'+value.brand_title+'</option>';
					});
				html += '</select>';
				$('.select-product-store').after(html);
			}
		});	
	});

	// Brand Color 
	$('#colorpicker').on('input', function() {
		$('#hexcolor').val(this.value);
	});
	$('#hexcolor').on('input', function() {
	  $('#colorpicker').val(this.value);
	});
  

  // Tabel drog & drop
  // $('table').DataTable();

  // $( "tbody" ).sortable({
  //   items: "tr",
  //   cursor: 'move',
  //   opacity: 0.6,
  //   update: function() {
  //       sendOrderToServer();
  //   }
  // });

});

// function sendOrderToServer() {
//   var order = [];
//   var token = $('meta[name="csrf-token"]').attr('content');
//   console.log(token);
//   $('tr').each(function(index,element) {
//     order.push({
//       id: $(this).attr('data-id'),
//       position: index+1
//     });
//   });

//   $.ajax({
//     type: "POST", 
//     dataType: "json", 
//     url: "https://b8d064528f87.ngrok.io/product-sortable",
//       data: {
// 	      order: order,
// 	      _token: token
// 	    },
//     	success: function(response) {
//         if (response.status == "success") {
//           console.log(response);
//         } else {
//           console.log(response);
//         }
//     	}
//   	}
// 	);
// }