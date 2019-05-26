      <?php
         session_start();
        if (!isset($_SESSION["name"])) 
        {
            ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
            <?php
        }
        include "header.php";
        include"connection.php";
      ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
              

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                 <form name="form1" action="" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                        <td>
                                        <select name="enr" class="form-control selectpicker">
                                                
                                                         <?php
                                                    
                                                    $res=mysqli_query($link,"select enrollmentno from issue_books where book_return_date=''");
                                                    
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                         echo "<option>";
                                                         echo $row["enrollmentno"];
                                                         echo "</option>";
                                                     }

                                                ?>
                                               
                                            </select>
                                            </td>                                            

                                            <td>
                                                <input type="submit" value="search" name="submit1" class="form-control" style="margin-top:5px;">


                                            </td>

                                        </tr>


                                    </table>  
                                </form>
                                 <?php

                                    if(isset($_POST["submit1"])) 
                                     {
                                       $res=mysqli_query($link,"select * from issue_books where enrollmentno='$_POST[enr]'" );
                                      echo "<table class ='table table-bordered'>";
                                       echo "<tr>";
                                    echo "<th>";echo "enrollmentno"; echo "</th>";
                                    echo "<th>";echo "name"; echo "</th>";
                                    echo "<th>";echo "sem"; echo "</th>";
                                    echo "<th>";echo "email"; echo "</th>";
                                    echo "<th>";echo "contact"; echo "</th>";
                                    echo "<th>";echo "bookname"; echo "</th>";
                                    echo "<th>";echo "book_issue_date"; echo "</th>";
                                    echo "<th>";echo "return book"; echo "</th>";


                                   echo "</tr>";
                                    
                                  while($row=mysqli_fetch_array($res))
                                 {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["enrollmentno"]; echo "</td>";
                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                    echo "<td>"; echo $row["sem"]; echo "</td>";
                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                    echo "<td>"; echo $row["contact"]; echo "</td>";
                                    echo "<td>"; echo $row["bookname"]; echo "</td>";
                                    echo "<td>"; echo $row["book_issue_date"]; echo "</td>";
                                    echo "<td>"; ?> <a href="return.php?id=<?php echo $row["id"];?>">Return Book</a> <?php echo "</td>";

                                    echo "</tr>";
                                }


                                 echo "</table>";
                              }
                              ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php
            include "footer.php";
            ?>
       