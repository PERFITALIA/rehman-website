var base_url ='https://rahman-group.com/aos/public/admin/';
    
//=======Year================   
    //Year Listing
    var ilength = $('#year').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#year').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"year",  
              columns: [
                  {data: 'year', name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Year Add
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_year').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Year successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Year Delate
   function deleteYear(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"year/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
    }
    
    //=======Composition of CSR Committee================   
    //Year Listing
    var ilength = $('#composition_csr').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#composition_csr').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"compostion_of_csr_committee",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Composition  Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_compostiton_csr').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Composition of Csr Committe successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Composition Delate
   function deleteComposition(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"composition/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
    }
     //====== CSR Plolicy================   
    //CSR Listing
    var ilength = $('#csr').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#csr').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"csr_policy",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Csr  Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_csr').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Csr policy added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Csr Delete
   function deleteCsr(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"csr/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}
     


//====== Vigil Mechanism Plolicy================   
    //Vigil Listing
    var ilength = $('#vigil').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#vigil').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"vigil_mechanism_policy",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Vigil  Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_vigil').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Vigil Mechanism Policy added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Vigil Delete
   function deleteVigil(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"vigil/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}


//====== Nrc Plolicy================   
    //Nrc Listing
    var ilength = $('#nrc').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#nrc').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"nrc_policy",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Nrc  Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_nrc').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Nrc Policy successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Nrc Delete
   function deleteNrc(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"nrc/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}


//====== Code of Independent Director================   
    //Code of Independent Director Listing
    var ilength = $('#code').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#code').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"code_of_independent_director",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Code of Independent Director Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_code').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Code of Independent Director successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Code of Independent Director Delete
   function deleteCode(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"code/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}


//====== Notice of Agm================   
    //Notice of Agm Listing
    var ilength = $('#notice').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#notice').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"notice_of_agm",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Notice of Agm Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_notice').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Notice of Agm successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Notice of Agm Delete
   function deleteNotice(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"notice/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}
//====== Code of Independent Director================   
    //Code of Independent Director Listing
    var ilength = $('#code').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#code').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"code_of_independent_director",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Code of Independent Director Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_code').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Code of Independent Director successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Code of Independent Director Delete
   function deleteCode(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"code/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}


//====== Annual Return================   
    //Annual Return Listing
    var ilength = $('#annual').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#annual').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"annual_return",  
              columns: [
                  {data: 'title', name},
                  {data:'link',name},
                  {data:'year',name},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Annual Return Add
    
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_annual').ajaxForm({
              
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>Annual Return successfully added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('name').value="";
                document.getElementById('file').value="";
                document.getElementById('year').value="";
                
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Annual Return Delete
   function deleteAnnual(id) {
    const userInput = window.prompt('Please type "delete" to confirm deletion:');
    if (userInput === 'delete') {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"annual/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
}
 
    









//     //=======Job Location================   
//     //Job Location Listing
//     var ilength = $('#jobs_location').length;
// 	if(ilength != 0){
//         $(function () {
    
//           var table = $('#jobs_location').DataTable({
//               processing: true,
//               serverSide: true,
//               ajax: base_url+"jobs_location",
//               columns: [
//                   {data: 'name', name},
//                   {data: 'action', name: 'action', orderable: false, searchable: false},
//               ]
//           });
          
//         });
// 	}
	
	
	
// 	//Job Location Add
// 	$(function() {
//       $(document).ready(function()
//       {
//           var bar = $('.bar');
//           var percent = $('.percent');
//             $('#add_joblocation').ajaxForm({
              
//               complete: function(xhr) {
//                 $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Job Location Added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
//                 document.getElementById('name').value="";
                
                
//                   // alert('File Has Been Uploaded Successfully');
//                   // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
//               }
//             });
//       }); 
//    });
   
   
//    //Job Location Delate
//    function deleteJoblocation(id) {
//         swal({
//             title: "Delete?",
//             text: "Please ensure and then confirm!",
//             type: "warning",
//             showCancelButton: !0,
//             confirmButtonText: "Yes, delete it!",
//             cancelButtonText: "No, cancel!",
//             reverseButtons: !0
//         }).then(function (e) {

//             if (e.value === true) {
//                 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

//                 $.ajax({
//                     type: 'POST',
//                     url: base_url+"jobs_location/delete/" + id,
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                     },
//                     data: {_token: CSRF_TOKEN},
//                     dataType: 'JSON',
//                     success: function (results) {
//                         swal("Done!", results.message, "success");
//                         location.reload();

//                     }
//                 });

//             } else {
//                 e.dismiss;
//             }

//         }, function (dismiss) {
//             return false;
//         })
//     }
	
	
// 	    //=======Job Opening================   
//     //Job Opening Listing
//     var ilength = $('#jobs_opening').length;
// 	if(ilength != 0){
//         $(function () {
    
//           var table = $('#jobs_opening').DataTable({
//               processing: true,
//               serverSide: true,
//               ajax: base_url+"jobs_opening",
//               columns: [
//                   {data: 'title', name: 'title'},
//                   {data: 'category_id', name: 'category'},
//                  {data: 'location_id', name: 'location'},
//                   {data: 'action', name: 'action', orderable: false, searchable: false},
//               ]
//           });
          
//         });
// 	}
	
	
	
// 	//Job Opening Add
// 	$(function() {
//       $(document).ready(function()
//       {
//           var bar = $('.bar');
//           var percent = $('.percent');
//             $('#jobopening_add').ajaxForm({
              
//               complete: function(xhr) {
//                 $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Job Opening Added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
//                 document.getElementById('name').value="";
                
                
//                   // alert('File Has Been Uploaded Successfully');
//                   // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
//               }
//             });
//       }); 
//    });
   
   
//    //Job Opening Delate
//    function deletjobopening(id) {
//         swal({
//             title: "Delete?",
//             text: "Please ensure and then confirm!",
//             type: "warning",
//             showCancelButton: !0,
//             confirmButtonText: "Yes, delete it!",
//             cancelButtonText: "No, cancel!",
//             reverseButtons: !0
//         }).then(function (e) {

//             if (e.value === true) {
//                 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

//                 $.ajax({
//                     type: 'POST',
//                     url: base_url+"jobs_opening/delete/" + id,
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                     },
//                     data: {_token: CSRF_TOKEN},
//                     dataType: 'JSON',
//                     success: function (results) {
//                         swal("Done!", results.message, "success");
//                         location.reload();

//                     }
//                 });

//             } else {
//                 e.dismiss;
//             }

//         }, function (dismiss) {
//             return false;
//         })
//     }
	
	
	
		    //=======Product Category================   
    //Job Opening Listing
    var ilength = $('#product_category').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#product_category').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"product_category",
              columns: [
                  {data: 'name', name},
                  { data: 'image', name: 'image',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"https://coolkaki.com/2021-22/perf_cms/storage/app/public/product_category/" + data + "\" height=\"50\"/>";
                    }
                },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	
	//Product category Add
	
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_productcategory').ajaxForm({
              beforeSend: function() {
                  $("#cmn-respns").html("");
                  var percentVal = '0%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              uploadProgress: function(event, position, total, percentComplete) {
                  var percentVal = percentComplete + '%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('year').value="";
                document.getElementById('title').value="";
                document.getElementById('file_image').value="";
                document.getElementById('file_pdf').value="";
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   
   //Prod cat Edit
   $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#product_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
   
   
   //Product category Delate
   function deleteProductcategory(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"product_category/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
	
	
	
	
	//================ Brands==========================
	//Job Category Listing
    var ilength = $('#brands').length;
	if(ilength != 0){
        $(function () {
    
          var table = $('#brands').DataTable({
              processing: true,
              serverSide: true,
              ajax: base_url+"brands",
              columns: [
                  {data: 'title', name: 'title'},
                  { data: 'image', name: 'image',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"https://coolkaki.com/2021-22/perf_cms/storage/app/public/brands/" + data + "\" height=\"50\"/>";
                    }
                },
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
	}
	
	
	$(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#brands_upload').ajaxForm({
              beforeSend: function() {
                  $("#cmn-respns").html("");
                  var percentVal = '0%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              uploadProgress: function(event, position, total, percentComplete) {
                  var percentVal = percentComplete + '%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('year').value="";
                document.getElementById('title').value="";
                document.getElementById('file_image').value="";
                document.getElementById('file_pdf').value="";
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   
   //Brands Edit
   $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#brands_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
     
     
     //Product category Delate
   function deleteBrands(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"brands/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
   
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#brands').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
     
     
    //==================Products Start================
    
    	//Product Listing
        var ilength = $('#products_list').length;
        if(ilength != 0){
            $(function () {
        
              var table = $('#products_list').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: base_url+"products",
                  columns: [
                      {data: 'name', name: 'name'},
                      {data: 'product_category', name: 'product_category'},
                      {data: 'color', name: 'color'},
                      {data: 'status', name: 'status'},
                     
                      { data: 'image', name: 'image',
                        render: function( data, type, full, meta ) {
                            return "<img src=\"https://coolkaki.com/2021-22/perf_cms/storage/app/public/products/" + data + "\" height=\"50\"/>";
                        }
                    },
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                  ]
              });
              
            });
        }
    
     
     
     
     
     
     
	
	
	
    $(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#add_product').ajaxForm({
              beforeSend: function() {
                  $("#cmn-respns").html("");
                  var percentVal = '0%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              uploadProgress: function(event, position, total, percentComplete) {
                  var percentVal = percentComplete + '%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('date').value="";
                document.getElementById('heading').value="";
                document.getElementById('text').value="";
                document.getElementById('text1').value="";
                document.getElementById('file').value="";
                $(window).scrollTop(0);
              }
            });
      }); 
   });
   
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#media_releases_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
     
    function deleteMediaReleases(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"media_releases/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
    //Media END
    
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#page_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
     
     
     $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#background_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
     
     $(function() {
      $(document).ready(function()
      {
          var bar = $('.bar');
          var percent = $('.percent');
            $('#milestone_add').ajaxForm({
              beforeSend: function() {
                  $("#cmn-respns").html("");
                  var percentVal = '0%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              uploadProgress: function(event, position, total, percentComplete) {
                  var percentVal = percentComplete + '%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              complete: function(xhr) {
                $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                document.getElementById('year').value="";
                document.getElementById('text').value="";
                document.getElementById('file').value="";
                
                  // alert('File Has Been Uploaded Successfully');
                  // $('<div>Success!</div>').insertBefore('#btnSubmit').delay(3000).fadeOut();
              }
            });
      }); 
   });
   
   $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#milestone_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
     
     function deletemile_stone(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"mile_stone/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
    
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('#leadership_edit').ajaxForm({
                beforeSend: function() {
                    $("#cmn-respns").html("");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                  $("#cmn-respns").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> File uploaded successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  location.reload();
                }
              });
        }); 
     });
    function deleteLeadership(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: base_url+"leadership/delete/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        swal("Done!", results.message, "success");
                        location.reload();

                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }