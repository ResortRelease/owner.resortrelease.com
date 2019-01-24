<?php
/**
 * Template Name: Presentation
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>
<?php 
require __DIR__ . '/vendor/autoload.php'; 

putenv('GOOGLE_APPLICATION_CREDENTIALS=' . __DIR__ . '/client_secret.json');
$client = new Google_Client;
$client->useApplicationDefaultCredentials();

$client->setApplicationName("Get Lead Data");
$client->setScopes(['https://www.googleapis.com/auth/drive','https://spreadsheets.google.com/feeds']);

if ($client->isAccessTokenExpired()) {
    $client->refreshTokenWithAssertion();
}

$accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];
ServiceRequestFactory::setInstance(
    new DefaultServiceRequest($accessToken)
);

// // Get our spreadsheet
// $spreadsheet = (new Google\Spreadsheet\SpreadsheetService)
//    ->getSpreadsheetFeed()
//    ->getByTitle('Client Survey - Live Production Doc');

// // Get the first worksheet (tab)
// $worksheets = $spreadsheet->getWorksheetFeed()->getEntries();
// $worksheet = $worksheets[3];

?>
<style>
  #accreditation-new-row,
  .main-nav,
  .svg-container,
  #footer {
    display: none;
  }
  section {
    position:relative;
    height: 100vh;
    padding: 20px 0;
    background: #ffffff!important;
  }
  .previous, .next {
    position: absolute;
    width: 30px;
    background: rgba(0,0,0,0.8);
    color: white;
    text-align: center;
    border-radius: 3px;
  }
  .previous i, .next i {
    font-size:1.4em;
    margin: 0 auto;
  }
  .previous {
    top:20px;
    left:0;
    right:0;
    margin: 0 auto;
  }
  .next {
    bottom:20px;
    left:0;
    right:0;
    margin: 0 auto;
  }
  iframe {
    width:100%;
  }
  .graph {
    position: relative;
  }
  .graph .table {
    position: absolute;
    top: 0px;
    text-align: center;
    height: 100%;
    width: 100%;
  }
  .graph .table * {
    /* border: 1px solid red; */
    margin-bottom: 0;
  }
  .graph .table .table-header {
    position: absolute;
    top: 8px;
    left: 0px;
    right: 127px;
    margin: 0 auto;
    width: 348px;
  }
  .graph .table .table-header .sep {
    height: 4px;
    width: 50%;
    background: linear-gradient(90deg, #51acc2, #7177c5, #7e65c5, #e24172, #f0a100);
    margin: 0 auto;
  }
  .graph .table .t {
    position: absolute;
    bottom: 200px;
    width: 135px;
    color: hsla(0, 0%, 0%, 0.42);
  }
  .graph .table .b {
    position: absolute;
    bottom: 63px;
    width: 103px;
    color: hsla(0, 0%, 0%, 0.42);
  }
  .table .t b, .table .b b {
    font-size: 1.3em;
    color: hsla(0, 0%, 0%);
  }
  .d1 {
    left: 39px;
  }
  .d2 {
    left: 201px;
  }
  .d3 {
    left: 363px;
  }
  .d4 {
    left: 252px;
  }
  .d4 {
    left: 525px;
  }
  .d5 {
    left: 52px;
  }
  .d6 {
    left: 217px;
  }
  .d7 {
    left: 378px;
  }
  .d8 {
    left: 540px;
  }
  .d9 {
    left: 675px;
    width: 147px!important;
    bottom: 68px!important;
  }
</style>
<section id="section-1">
  <a href="#section-1">
    <div class="previous">
      <i class="fa fa-chevron-up"></i>
    </div>
  </a>
  <div class="container">
    <h1>Section 1</h1>
    <div class="row">
      <div class="col-md-3">
        <h1>Data!</h1>
        <!-- <iframe src="https://exploratory.io/viz/wmf8uxX6CC/Leads-mnk9KoO7WX?embed=true" frameborder="0"></iframe> -->
      </div>
      <div class="col-md-9">
        <div class="graph">
          <div class="table">
            <div class="table-header">
              <h1>Jan 2019</h1>
              <p>RESULTS</p>
              <div class="sep"></div>
            </div>
            <div class="t d1">LEADS<br><b>3973</b></div>
            <div class="t d2">ASAP<br><b>4951</b></div>
            <div class="t d3">SALES<br><b>418</b></div>
            <div class="t d4">DEALS<br><b>500</b></div>
            <div class="b d5">LEADS<br><b>3398</b></div>
            <div class="b d6">ASAP<br><b>-</b></div>
            <div class="b d7">SALES<br><b>400</b></div>
            <div class="b d8">DEALS<br><b>461</b></div>
            <div class="b d9"><b>JAN 2018<b></div>
          </div>
          <img class="img-fluid" src="../wp-content/themes/understrap-child/assets/presentation/circles.jpg" alt="circles">
        </div>
      </div>
    </div>
  </div>
  <a href="#section-2">
    <div class="next">
      <i class="fa fa-chevron-down"></i>
    </div>
  </a>
</section>
<section id="section-2">
  <div class="container">
    <h1>Section 2</h1>
  </div>
</section>
<section id="section-3">
  <div class="container">
    <h1>Section 3</h1>
  </div>
</section>
<section id="section-4">
  <div class="container">
    <h1>Section 4</h1>
  </div>
</section>
<section id="section-5">
  <div class="container">
    <h1>Section 5</h1>
  </div>
</section>
<section id="section-6">
  <div class="container">
    <h1>Section 6</h1>
  </div>
</section>
<?php get_footer(); ?>