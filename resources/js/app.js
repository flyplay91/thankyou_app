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

  // From - To Date Picker
  $('#fromDate').datepicker({});

  $('#toDate').datepicker({});

  $('body').on('click', '#btn-date-picker', function() {
  	var page_handle = $('#page_handle').val().split('.')[0];
  	var from_date = $('#fromDate').val();
  	var to_date = $('#toDate').val();
  	
  	if (page_handle == 'feedback') {
  		var route_url = '/feedback';
  	}

  	if (from_date == '' || to_date == '') {
  		alert('Please select date!');
  	} else {
  		$.ajax({
  			url: route_url,
  			method: "GET",
				data: {
					fromDate: from_date,
					toDate: to_date,
					__token: $('meta[name=csrf-token]').attr("content")
				},
				success: function(results) {
					console.log(results.feedback_arr);

					var html = '';
					var index = 1;
						$.each(results.feedback_arr, function( key, value ) {
							html += '<tr>';
								html += '<td>'+(index++)+'</td>';
							  html += '<td>'+value.store_url+'</td>';
							  html += '<td>'+value.rating_1+'</td>';
							  html += '<td>'+value.rating_2+'</td>';
							  html += '<td>'+value.rating_3+'</td>';
							  html += '<td>'+value.rating_4+'</td>';
							  html += '<td>'+value.rating_5+'</td>';
						  html += '</tr>';
						});
					
					$('.table-feedback tbody').empty();
					$('.table-feedback tbody').append(html);

				}
  		});
  	}
  });

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