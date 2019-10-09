// Siirtyy poista-sivulle
$(document).on('click', '.poista-aloite', function() {
  var id = $(this).attr('poista-aloite');
  
      bootbox.confirm({
          message: "<h4>Haluatko varmasti poistaa aloitteen?</h4>",
          buttons: {
              confirm: {
                  label: '<i class="fa fa-check"></i> Kyllä',
                  className: 'btn-danger' 
              },
              cancel: {
                  label: '<i class="fa fa-times"></i> En',
                  className: 'btn-primary'
              }
          },
          callback: function (result) {
              // Painettiinko Kyllä-painiketta?
              if(result==true){
                  var url = "/aloite/poista/" + id;
                  $(location).attr('href',url);                            
              }
          }
      });
  return false;
});