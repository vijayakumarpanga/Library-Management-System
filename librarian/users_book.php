      <?php
      session_start();
        include "header.php";
        include "connection.php";
        
      ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
               

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Book Users</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <?php
                                echo "<table class='table table-bordered'>";
                                 echo "<tr>"; 
                                echo "<th>";echo "user name";  echo  "</th>";
                                 echo "<th>";echo "enrollment no";  echo  "</th>";
                                  echo "<th>";echo "book name";  echo  "</th>";
                                  echo "<th>";echo "email";  echo  "</th>";
                                   echo "<th>";echo "contact";  echo  "</th>";
                                    echo "<th>";echo "book issue date";  echo  "</th>";
                                   echo " </tr>";

                               
                                $res=mysqli_query($link,"select * from issue_books where bookname='$_GET[book_name]' && book_return_date=''");
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>";echo $row["name"];echo "</td>";

                                     echo "<td>";echo $row["enrollmentno"];echo "<t/d>";
                                      echo "<td>";echo $row["bookname"];echo "</td>";
                                       echo "<td>";echo $row["email"];echo "</td>";
                                        echo "<td>";echo $row["contact"];echo "</td>";
                                         echo "<td>";echo $row["book_issue_date"];echo "</td>";
                                    echo "</tr>";
                                }

                                  echo  "</table>";
                               ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php
            include "footer.php";
            ?>
       