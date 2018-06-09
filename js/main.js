let prc = 1;
let csr = 7000;
let csr1 = 800;
let rtc = 1;
  
    $( ".vali1" ).change(function() {
   $( "select option:selected" ).each(function() {
     $( this ).text();
     if($( this ).text()=="Bitcoin"){
       rtc = csr * 1;
         $( "#monbtn" ).trigger( "click" );
     } else if($( this ).text()=="Ethereum"){
       rtc = csr1 * 1;
       $( "#monbtn" ).trigger( "click" );
     }
   });
 })
    $( ".vali2" ).change(function() {
   $( "select option:selected" ).each(function() {
     $( this ).text();
     if($( this ).text()=="Naira"){
       prc = 355 * rtc;
         $( "#monbtn" ).trigger( "click" );
     } else if($( this ).text()=="US Dollars"){
       prc = 1 * rtc;
       $( "#monbtn" ).trigger( "click" );
     }  else if($( this ).text()=="Ethereum"){
       rtc = csr * csr1;
       $( "#monbtn" ).trigger( "click" );
     }
   });
 })
 .trigger( "change" );
    $("#monbtn").click(function() {
  $("#recmon").val($("#gvemon").val()*prc) ;
 });
