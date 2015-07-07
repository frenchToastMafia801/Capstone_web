
<%@ page import="java.sql.PreparedStatement"%>
<%@ page import="java.sql.SQLException"%>
<%@ page contentType="text/html" %>
<%@ page import="java.sql.Connection" %>
<%@ page import="java.sql.DriverManager" %>
<%@ page import="java.sql.ResultSet" %>
<%@ page import="java.sql.Statement"%>
<%@ page import="javax.sql.*"%>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>   
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/student.jsp"></script>
        <script src='js/gg.js'></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script>
            //checking to see if the document is ready 
           $(document).ready(function () {
                //check to see if user clicked on the tab
                $('.tabs .tab-links a').on('click', function (e) {
                    ////current attribute value that grabs the href="" of the clicked anchor link
                    var currentAttrValue = jQuery(this).attr('href');

                    // Show/Hide Tabs
                    //if .tabs has a child witn an #id that matches a .tabk-link href="", then they should be linked
                    //then show the elements that refers to the #ids, "such as #tab2"
                    //then find other tabs  (the siblings) and hide them
                    $('.tabs ' + currentAttrValue).show().siblings().hide();

                    // Change/remove current tab to active
                    //find the active parent tab and hide it once the child is clicked
                    $(this).parent('li').addClass('active').siblings().removeClass('active');
                    // this removes the #id in the address bar
                    e.preventDefault();
                });

            });
        </script>
  </head>
    <body>
        <div id="header"> <img src="img/header.jpg" alt="student"/> </div>
        <div id = "search">
            <!-- HTML for SEARCH BAR -->
            <div id="tfheader">
                <form id="tfnewsearch" method="get" action="http://www.google.com">
                    <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
                </form>
                <div class="tfclear"></div>
            </div> 
        </div>
        <!--End of header-->
        <div id="wrapper">
            <div id="column1">
                <div class="tabs"><!--REVISED FROM id="profile"-->
                    <ul class="tab-links"><!--REVISED FROM class="nav"-->
                        <li class="profilestudentname">FirstName LastName</li>
                        <li><a href="#tab1">Student Information</a></li>
                        <li><a href="#tab2">Enrollment</a></li>
                        <li><a href="#tab3">Groups</a></li>
                    </ul>
                    <div class="tabs">
                        <div class="profiletab-content">
                            <div id="tab1" class="tab active"> <img src="img/cat.JPG" alt="image" height="130" width="110">
                               
                                <table align="left" class="table1">
                                    <%
                                        String errMsg = "";
                                        try{
                                           Class.forName("com.microsoft.jdbc.sqlserver.SQLServerDriver");
                                           
                                          
                                              //try to connect to the database
                                            Connection  connection = DriverManager.getConnection("jdbc:microsoft:sqlserver://localhost:8080;DatabaseName=SchoolDB; user=sa; password=ZooS33k9989");
                                              //prepare the select student statment
                                            System.out.println("got connection");
                                            
                                            Statement stmnt = connection.createStatement();
                                            
                                            ResultSet rs = stmnt.executeQuery("SELECT lastName, firstName, studentSid, dob, gender FROM Student where studentSid = 100000 ");
                                            
                                            while (rs.next()){
                                                String firstName = rs.getString("firstName"); 
                                                String lastName = rs.getString("lastName");
                                                Integer studentSid = rs.getInt("studentSid");
                                                String dob = rs.getString("dob");
                                                String gender = rs.getString("gender");
                                        
                                                
                                                %>
                                                 <tr>
                                                    <th>First Name: </th>
                                                    <td> <%= firstName %>
                                                <tr>
                                                    <th>Last Name:</th>
                                                    <td> <%= lastName%></td>
                                                </tr>
                                                <tr>
                                                    <th>SID:</th>
                                                    <td> <%= studentSid %></td>
                                                </tr>
                                                <tr>
                                                    <th>Born:</th>
                                                    <td> <%= dob %></td>
                                                </tr>
                                                <tr>
                                                    <th>Gender:</th>
                                                    <td> <%= gender %></td>
                                                </tr>
                                                <%
                                            } 
                                            rs.close();
                                            stmnt.close();
                                            connection.close();
                                                                                                                                
                                              
                                          }catch(SQLException e){
                                              errMsg = ("Error Message: " + e);
                                          }catch (Exception e2){
                                              errMsg = ("Error Message: " + e2);
                                          }
                                       
                      
                                %>
                                             
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
