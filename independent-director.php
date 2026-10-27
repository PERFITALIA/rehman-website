<?php 
// // ob_start();
// // session_start();
// // error_reporting(E_ALL);
// ini_set('display_errors', '1');
require_once('include/config.php');
require('include/function.php');
$year = $_GET['year'];
if($year == ""){
   $year = date("Y");
}
$years  = get_years();
$csr_policy  = get_independent_dir($year);

?>
<!doctype html>
<html lang="en" class="trans-html">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Rahman Group - Investor Relations</title>
   <link rel="shortcut icon" href="images/favicon.jpg" type="image/jpg"/>
   <meta name="description" content="We thank our investors for their support and encouragement and reward them with growth, expansion and returns.">
   <meta property="og:title" content="Rahman Group - Investor Relations" />
   <meta property="og:description" content="We thank our investors for their support and encouragement and reward them with growth, expansion and returns." />
   <meta property="og:image" content="images/logo-og.png" />
   <meta name="twitter:title" content="Rahman Group - Investor Relations">
   
   <meta property="twitter:image" content="images/logo-og.png" />
   <meta name="twitter:description" content="We thank our investors for their support and encouragement and reward them with growth, expansion and returns.">
   <?php  require("include/header-link.php"); ?>
</head>
<body class="homePage">
   <?php  require("include/header.php"); ?>
   <section class="insidePageBanner investor-relations">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="txtBanner">
                  <h2 class="wow fadeInUp"><span>Investor Relations</span>Rewarding<br>
                     Confidence<br>
                     with Returns <span>with utmost business integrity and governance </span></h2>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pageBreadcrumb">
         <div class="container">
            <div class="row" id="tabsMain">
               <div class="col-md-12">
                  <div class="sitemaplink wow fadeInUp">
                     <a href="index.php">Home</a>&gt;
                     <a href="#" class="active">Investor Relations</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
 <!-- 
      <section class="applyForJobI">
         <div class="container">
            <div class="row">
               <div class="investRelate">
                  <div class="col-md-12">
                     <h3 class="wow fadeInUp">Login</h3>
                  </div>
                  <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="wow fadeInUp">User ID</label>
                           <input type="text" name="email" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="wow fadeInUp">Password</label>
                           <input type="text" name="password" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" name = "login" class="btn btn-default">Sign In</button>
                     </div>  
                     <div class="col-md-6"> -->
                        <!--<div class="actionCreate">-->
                           <!--   <a href="">Create account</a>-->
                           <!--</div>-->
              <!--        </div>             
                     <div class="col-md-6">
                        <div class="actionLogin">
                           <a href="change_password.php">Change Password</a>
                        </div>
                     </div>             
                  </form> 
               </div>
            </div>
         </div>
      </section> -->
      <section class="tabsMain" >
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                
                  <ul class="investorTabs nav-tabs">
                      <li class="tablinks "><a  href="investor-relations.php?year=#tabsMain">Composition of CSR Committee</a>  </li>
                     <li class="tablinks"><a  href="csr-policy.php?year=#tabsMain">CSR Policy</a> </li>
                    <li class="tablinks"><a  href="vigil-mechanism-policy.php?year=#tabsMain">Vigil Mechanism Policy</a> </li>
                     <li class="tablinks "><a  href="nrc-policy.php?year=#tabsMain">NRC Policy</a> </li>
                     <li class="tablinks active"><a  href="independent-director.php?year=#tabsMain">Code of Independent Director</a> </li>
                     <li class="tablinks "><a  href="notice-agm.php?year=#tabsMain">Notice of AGM</a> </li>
                     <li class="tablinks"><a  href="annual-return.php?year=#tabsMain">Annual Return</a> </li>
                  </ul>
                   <?php if(isset($_SESSION['valid'])== true){?>
                  <a href="logout.php"><p>Click here to logout</p></a>
               <?php }?>

                  
               </div>

               <div class="col-md-7">
                  
                  <div class="tab-content investorContent">
                     <div id="tab_in_2" class="tab-pane fade in active">
                        
                        <div class="tbData">
                         
                     <?php if(isset($csr_policy['independent_dir'])){ foreach($csr_policy['independent_dir'] as $row){?> 
                           <?php if(isset($_SESSION['valid'])== true){?>
                        <div class="sectionPdfnw">
                           <a href="aos/public/files/<?php echo $row['link'];?>" target="_blank"> 
                            <p><?php echo $row['title'];?></p>
                            <img src="svg/pdf-icon.svg"></a><?php }else{?>
                             <div class="sectionPdfnw">
                           
                           <a href="" data-toggle="modal" data-target="#myModal1">
                            <p><?php echo $row['title'];?></p>
                             Login</a>
                           <?php } ?>
                         </div>
                     <?php }?>                                                
                         </div>
                     <?php }else{?>
                           No Files Found    
                        <?php }?> 
                         
                         
                   
                   </div>
                   <!--  tab 2 -->
                  
             </div>
             <!-- tab 6 -->
             <div id="tab_in_6" class="tab-pane fade">
               <div class="tbData">
                  <div class="businessData businessDataInvestor">
                     <select class="form-control annual-select-o">
                        <option value="Footwear" data-details="pdf1">2020</option>
                        <option value="Gloves" data-details="pdf2">2021</option>
                        <option value="Helmet" data-details="pdf3">2022</option>
                        <option value="Eye protection gear" data-details="pdf4">2023</option>
                        <option value="Ear protection gear" data-details="pdf5">2024</option>
                     </select>
                  </div>
                  <div class="sectionPdfnw">
                     <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                      <p>Composition of CSR Committee</p>
                      <img src="svg/pdf-icon.svg"></a>
                   </div>
                   <div class="sectionPdfnw">
                     <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                      <p>Composition of CSR Committee</p>
                      <img src="svg/pdf-icon.svg"></a>
                   </div>
                   <div class="sectionPdfnw">
                     <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                      <p>Composition of CSR Committee</p>
                      <img src="svg/pdf-icon.svg"></a>
                   </div>
                   <div class="sectionPdfnw">
                     <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                      <p>Composition of CSR Committee</p>
                      <img src="svg/pdf-icon.svg"></a>
                   </div>
                   <div class="sectionPdfnw">
                     <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                      <p>Composition of CSR Committee</p>
                      <img src="svg/pdf-icon.svg"></a>
                   </div>
                </div>
             </div>
             <!-- tab 7 -->
             <div id="tab_in_7" class="tab-pane fade">
               <div class="tbData">
                  
                <div class="sectionPdfnw">
                  <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                   <p>Composition of CSR Committee</p>
                   <img src="svg/pdf-icon.svg"></a>
                </div>
                <div class="sectionPdfnw">
                  <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                   <p>Composition of CSR Committee</p>
                   <img src="svg/pdf-icon.svg"></a>
                </div>
                <div class="sectionPdfnw">
                  <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                   <p>Composition of CSR Committee</p>
                   <img src="svg/pdf-icon.svg"></a>
                </div>
                <div class="sectionPdfnw">
                  <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                   <p>Composition of CSR Committee</p>
                   <img src="svg/pdf-icon.svg"></a>
                </div>
                <div class="sectionPdfnw">
                  <a href="excel/Shareholding Pattern-30.09.2019.XLSM" target="_blank"> 
                   <p>Composition of CSR Committee</p>
                   <img src="svg/pdf-icon.svg"></a>
                </div>
             </div>
          </div>
          
       </div>
       <div class="pop">
        
      </div>


   </div>
   



   
   
</div>
</div>
</section>
<div id="myModa" class="cmnmdl modal fade in" role="dialog">
 <div class="modal-dialog">
   <img class="close" data-dismiss="modal" src="images/cross.webp" width="30" height="30">
   <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-body">
       <div class="row">
        <div class="investRelate investRelateNw">
         <div class="col-md-12">
          <h3 class="wow fadeInUp">Login</h3>
       </div>
       <form action="/login.php" method="post">
         <div class="col-md-12">
            <div class="form-group">
               <label class="wow fadeInUp">Email</label>
               <input type="text" name="email" class="form-control">
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <label class="wow fadeInUp">Password</label>
               <input type="text" name="password" class="form-control">
            </div>
         </div>
         <div class="col-md-12">
            <button type="submit" name="login" class="btn btn-default">Sign In</button>
         </div>  
         <div class="col-md-6">
            <div class="actionCreate">
               <a href="">Create account</a>
            </div>
         </div>     
         
         <div class="col-md-6">
            <div class="actionLogin">
               <a href="change_password.php">Forgot your password?</a>

            </div>

         </div>  
         
      </form>
      
   </div>
</div>
</div>
</div>

</div>
</div>


<?php  require("include/footer.php"); ?>
<?php  require("include/footer-links.php"); ?>
<script>
   function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
     tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";

  
}
function refresh_year(){
   var e = document.getElementById("year");
   var value = e.value;
   window.location = "?year="+value +"#tabsMain";

  }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html> 
