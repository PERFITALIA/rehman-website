<?php 
require_once('include/config.php');
require('include/function.php');

/* ====== DOCUMENT SETTINGS ====== */
// Saari PDFs is folder me rakhni hain (website root ke andar)
$docDir = 'investor-docs/';

// Tab 1 to 5: single PDFs  (title => file name)
$tabs = array(
   1 => array('title' => 'Composition of CSR Committee', 'file' => '1- Composition of CSR Committee.pdf'),
   2 => array('title' => 'CSR Policy',                   'file' => '2-CSR Policy.pdf'),
   3 => array('title' => 'Vigil Mechanism Policy',       'file' => '3-Vigil Mechanism Policy.pdf'),
   4 => array('title' => 'NRC Policy',                   'file' => '4-NRC Policy.pdf'),
   5 => array('title' => 'Code of Independent Director', 'file' => '5- Code of ID.pdf'),
);

// Tab 6 & 7: year wise PDFs (naye year ke liye bas array me add kar do)
$agmYears    = array(2025, 2024, 2023, 2022, 2021, 2020);
$returnYears = array(2025, 2024, 2023, 2022, 2021, 2020);

function doc_url($path){
   // spaces wali file names ke liye safe URL
   $parts = explode('/', $path);
   return implode('/', array_map('rawurlencode', $parts));
}

function render_pdf_links($url, $title){
   $safeUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
   $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
   ?>
   <div class="sectionPdfnw">
      <a class="pdf-view" href="<?php echo $safeUrl; ?>" target="_blank" rel="noopener">
         <p><?php echo $safeTitle; ?></p>
         <img src="svg/pdf-icon.svg" alt="PDF">
      </a>
      <a class="pdf-download" href="<?php echo $safeUrl; ?>" download>Download PDF</a>
   </div>
   <?php
}
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

   <section class="tabsMain">
      <div class="container">
         <div class="row">

            <!-- LEFT TABS -->
            <div class="col-md-5">
               <ul class="investorTabs nav-tabs">
                  <li class="tablinks active"><a href="#tab_in_1" data-toggle="tab">Composition of CSR Committee</a></li>
                  <li class="tablinks"><a href="#tab_in_2" data-toggle="tab">CSR Policy</a></li>
                  <li class="tablinks"><a href="#tab_in_3" data-toggle="tab">Vigil Mechanism Policy</a></li>
                  <li class="tablinks"><a href="#tab_in_4" data-toggle="tab">NRC Policy</a></li>
                  <li class="tablinks"><a href="#tab_in_5" data-toggle="tab">Code of Independent Director</a></li>
                  <li class="tablinks"><a href="#tab_in_6" data-toggle="tab">Notice of AGM</a></li>
                  <li class="tablinks"><a href="#tab_in_7" data-toggle="tab">Annual Return</a></li>
               </ul>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-md-7">
               <div class="tab-content investorContent">

                  <?php foreach($tabs as $n => $t){ ?>
                  <div id="tab_in_<?php echo $n; ?>" class="tab-pane fade<?php echo ($n == 1) ? ' in active' : ''; ?>">
                     <div class="tbData">
                        <?php render_pdf_links($docDir . doc_url($t['file']), $t['title']); ?>
                     </div>
                  </div>
                  <?php } ?>

                  <!-- tab 6 : Notice of AGM -->
                  <div id="tab_in_6" class="tab-pane fade">
                     <div class="tbData">
                        <div class="businessData businessDataInvestor">
                           <select class="form-control year-select">
                              <?php foreach($agmYears as $y){ ?>
                                 <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <?php foreach($agmYears as $y){ ?>
                        <div class="year-item" data-year="<?php echo $y; ?>">
                           <?php render_pdf_links($docDir . doc_url($y . '.pdf'), 'Notice of AGM ' . $y); ?>
                        </div>
                        <?php } ?>
                     </div>
                  </div>

                  <!-- tab 7 : Annual Return -->
                  <div id="tab_in_7" class="tab-pane fade">
                     <div class="tbData">
                        <div class="businessData businessDataInvestor">
                           <select class="form-control year-select">
                              <?php foreach($returnYears as $y){ ?>
                                 <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <?php foreach($returnYears as $y){ ?>
                        <div class="year-item" data-year="<?php echo $y; ?>">
                           <?php render_pdf_links($docDir . doc_url('Form_MGT_7 ' . $y . '.pdf'), 'Annual Return (Form MGT-7) ' . $y); ?>
                        </div>
                        <?php } ?>
                     </div>
                  </div>

               </div>
            </div>

         </div>
      </div>
   </section>

<?php  require("include/footer.php"); ?>
<?php  require("include/footer-links.php"); ?>
<script>
// Year dropdown: sirf selected year ki PDF dikhegi
document.querySelectorAll('.year-select').forEach(function(sel){
   function showYear(){
      var wrap = sel.closest('.tbData');
      wrap.querySelectorAll('.year-item').forEach(function(item){
         item.style.display = (item.getAttribute('data-year') === sel.value) ? '' : 'none';
      });
   }
   sel.addEventListener('change', showYear);
   showYear(); // page load pe latest year dikhao
});
</script>
</body>
</html>