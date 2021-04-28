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