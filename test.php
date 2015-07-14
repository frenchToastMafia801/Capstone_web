<?php
include("connect.php");
?>



<!DOCTYPE html>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script type = 'text/javascript' src='googleGraphs.js'></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/highcharts-more.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script>
        //checking to see if the document is ready 
        jQuery(document).ready(function() {
            //check to see if user clicked on the tab
             jQuery('.tabs .tab-links a').on('click', function(e)  {
                 ////current attribute value that grabs the href="" of the clicked anchor link
                var currentAttrValue = jQuery(this).attr('href');
 
                 // Show/Hide Tabs
                 //if .tabs has a child witn an #id that matches a .tabk-link href="", then they should be linked
                 //then show the elements that refers to the #ids, "such as #tab2"
                 //then find other tabs  (the siblings) and hide them
                jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
                // Change/remove current tab to active
                //find the active parent tab and hide it once the child is clicked
                jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
                // this removes the #id in the address bar
                e.preventDefault();
    });
});
    </script>
    </head>
    <body>
                    <?php 
					$searchStudent="";
					if(!empty($_GET['searchStudent']))
					{
						$searchStudent = $_GET['searchStudent'];
					}
					
					$sql1 = "SELECT name.givenName, name.familyName, k12student.studentId FROM name INNER JOIN k12student ON name.nameId = k12student.name WHERE (name.givenName like '%$searchStudent%' OR name.familyName like '%$searchStudent%')";
					
					$results1 = mysqli_query($link, $sql1);
					echo (!$results1?die(mysqli_error($link). "<br>$sql1"): ""); /*The "worked" note can be deleted once everything is finished and working*/
					$count = mysqli_num_rows($results1);
					for ($i=0; $i<$count;$i++)
					{
					list($firstName, $lastName, $studentId) = mysqli_fetch_array($results1);
					}
					/*echo $firstName, $lastName, $studentId; THIS NEEDS TO BE DELETED AND IS ONLY FOR CHECKING THE SEARCH RESULTS*/
					
					$sql2 = "SELECT demographics.birthDate, demographics.gender, demographics.image FROM (name INNER JOIN k12student ON name.nameId = k12student.name) INNER JOIN demographics ON k12student.personId = demographics.personId WHERE (((k12student.studentId)=$studentId));";
					
					$results2 = mysqli_query($link, $sql2);
					echo (!$results2?die(mysqli_error($link). "<br>$sql2"): ""); /*The "worked" note can be deleted once everything is finished and working*/
					$count = mysqli_num_rows($results2);
					for ($i=0; $i<$count;$i++)
					{
					list($birthdate, $gender, $image) = mysqli_fetch_array($results2);
					}
					?>
    <div id="header"> <img src="img/header.jpg" /> </div>
    <!--End of header-->
    <div id="wrapper">
        <div id="column1">
          <div class="tabs"><!--REVISED FROM id="profile"-->
            <ul class="tab-links"><!--REVISED FROM class="nav"-->
              <li class="profilestudentname"><?php echo $firstName; ?> <?php echo $lastName; ?></li>
              <li><a href="#tab1">Student Information</a></li>
              <li><a href="#tab2">Enrollment</a></li>
              <li><a href="#tab3">Groups</a></li>
            </ul>
            <div class="tabs">
              <div class="profiletab-content">
                <div id="tab1" class="tab active"> <img src="<?php echo $image; ?>" alt="image" height="150" width="110">

                  <table align="left" class="table1">
                    <tr>
                      <th>First Name:</th>
                      <td><?php echo $firstName; ?></td>
                    </tr>
                    <tr>
                      <th>Last Name:</th>
                      <td><?php echo $lastName; ?></td>
                    </tr>
                    <tr>
                      <th>SID:</th>
                      <td><?php echo $studentId; ?></td>
                    </tr>
                    <tr>
                      <th>Born:</th>
                      <td><?php echo $birthdate; ?></td>
                    </tr>
                    <tr>
                      <th>Gender:</th>
                      <td><?php echo $gender; ?></td>
                    </tr>
                  </table>
                </div>
                <!----End of tab1---->
                
                <div id="tab2" class="tab">
                  <p>Tab #2 Enrollment stuff goes here!</p>
                  <p>Stuff..</p>
                </div>
                <!----End of tab2---->
                <div id="tab3" class="tab">
                  <p>Tab #3 Groups stuff goes here!</p>
                  <p>Stuff..</p>
                </div>
                <!----End of tab3----> 
              </div>
              <!----End of tab content----> 
            </div>
            <!----End of tabs----> 
            
          </div>
          <!--End of profile-->
          
          <div class="tabs"><!--id="schedule"-->
            <ul class="tab-links">
              <!--<li class="scheduleschoolname">Slippery Slope Junior High</li>-->
              <li><a href="#tab4">Term 1</a></li>
              <li><a href="#tab5">Term 2</a></li>
              <li><a href="#tab6">Term 3</a></li>
              <li><a href="#tab7">Term 4</a></li>
            </ul>
            
              <div class="scheduletab-content">
                <div id="tab4" class="tab">
                  <p>Tab #4 Term 1 stuff goes here!</p>
                  <p>Stuff..</p>
                </div>
                <div id="tab5" class="tab">
                  <p>Tab #5 Term 2 stuff goes here!</p>
                  <p>Stuff..</p>
                </div>
                <div id="tab6" class="tab">
                  <p>Tab #6 Term 3 stuff goes here!</p>
                  <p>Stuff..</p>
                </div>
                <div id="tab7" class="active tab">
                  <h2>Term 4</h2>
                  <div class="classperiod">
                  Period 1
                  </div>
                  <hr />
                    <div class="classperiod">
                  Period 2</div>
                  <hr />
                    <div class="classperiod">
                  Period 3
                  </div>
                  <hr />
                    <div class="classperiod">
                  Period 4
                  </div>
                  <hr />
                    <div class="classperiod">
                  Period 5
                  </div>
                  <hr />
                    <div class="classperiod">
                  Period 6 
                  </div>
                  <hr />
                    <div class="classperiod">
                  Period 7 </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!--End of schedule--> 
        </div>
        <!--End of column1-->
        <div id="column2">
          <div id="assessment">
            <div id="search">
                <form method="GET" action="">
                <input type="text" name="searchStudent" value ="<?php echo $searchStudent;?>">
                <input type="submit" value="Search">
                </form>
                
            </div>
            <p class="chromeheader">Assessment </p>
            <div class="chromebody">
              <div id="container1">
                <p>Visualization 1: ELA SAGE Summative </p>
              </div>
              <br />
              <div id="container2">
                <p>Visualization 2: MA SAGE Summative </p>
              </div>
              <br />
              <div id="container3">
                <p>Visualization 3: SCI SAGE Summative </p>
              </div>
              <br />
              <div id="container4">
                <p>Visualization 4: DRP SAGE Summative </p>
              </div>
            </div>
            <!--End of chromebody--> 
          </div>
          <!--End of assessment--> 
        </div>
        <!--End of column2--> 

    <!--End of wrapper-->
    <div id="footer"> <img src="img/footer.jpg" /> </div>
    <!--End of footer-->
</body>
</html>