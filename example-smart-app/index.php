<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>OP Note Example-SMART-App</title>

    <link rel='stylesheet' type='text/css' href='./src/css/example-smart-app.css'>
    <link rel='stylesheet' type='text/css' href='./lib/css/cerner-smart-embeddable-lib-1.0.0.min.css'>
  </head>



  <body>

      <style>
          .header {
              background-color: lightblue;
              height: 10vh;
              display: table;
              width: 100%;
              padding-left:10%;
              
          }
          .headerCentered {
              display: table-cell;
              vertical-align: middle;
              
          }

          .footer {
              background-color: lightblue;
              height: 10vh;
              display: table;
              width: 100%;
              text-align: center;
          }
          .footerCentered {
              display: table-cell;
              vertical-align: middle;
          }
          .mainViewPort {
              height: 75vh;
              display: table;
              width: 100%;
          }

          .leftMenu {
              background-color: lightblue;
              width: 20%;
              display: table-cell;
              padding: 2px 6px;
          }

          .OpNote {
              background-color: lightgoldenrodyellow;
              width: 80% ;
              display: table-cell;
              padding: 2px 6px;
          }


      </style>


    <div id='errors'>
    </div>
    <div id="loading" class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
    <div id='holder' >
      
      
      <!-- 
      <h2>28573-4 Physician, Operation note</h2>
      <h2>34868-0 Orthopaedic surgery Surgical operation note</h2>-->
      

        <div class="header" id="header" height="10vh" >
            <div class="headerCentered">
                Select a document :
                <select name="userDocuments">
                    <option value="" selected="selected">-----</option>
                    <?php
                    foreach(glob('./templates/opnotes/*.html') as $filename){
                    $filename = explode(".",basename($filename));
                    echo "
                    <option value='" . $filename . "'>".$filename[0]."</option>";
                    }
                    ?>

                </select>
            </div>
        </div>


        <div class="mainViewPort" >

          

            <div class="OpNote" contenteditable="true">

            </div>

            </div>

        <div class="footer"  id="footer">
            <div class="footerCentered">
                <button id="btnSave" type="button">Save</button>
            </div>
        </div>

    </div>
      <!-- REQUIRED Cerner Files -->

    <!-- Required JS files to enable this page to embed within an MPage -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js'></script>
    <script src='./lib/js/cerner-smart-embeddable-lib-1.0.0.min.js'></script>

    <!-- Application-level javascript-->
      <script src='./src/js/example-smart-app.js'></script>

    <!-- FHIR Client JS Library -->
      <script src='./lib/js/fhir-client-v0.1.12.js'></script>

    <!-- Prevent session bleed caused by single threaded embedded browser and sessionStorage API -->
    <!-- https://github.com/cerner/fhir-client-cerner-additions -->
      <script src='./lib/js/fhir-client-cerner-additions-1.0.0.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
      extractData().then(
        //Display Patient Demographics and Observations if extractData was success
        function(p) {
          drawVisualization(p);
        },

        //Display 'Failed to call FHIR Service' if extractData failed
        function() {
          $('#loading').hide();
          $('#errors').html('<p> Failed to call FHIR Service </p>');
        }
      );
    </script>

      
      <script>

           

          /*Save */
          function CommitOpNote() {
                         
             
            
          }
          $("#btnSave").click(CommitOpNote) ;


      </script>
      

  </body>
</html>
