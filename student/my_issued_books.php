      <?php
       session_start();
        if (!isset($_SESSION["username"])) 
        {
            ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
            <?php
        }
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
                                <h2>My Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                  <table class ='table table-bordered'>
                                    <th>Enrollment Number</th>
                                    <th>Book Name</th>
                                    <th>Issued Book Date</th>
                                <?php
                                $res=mysqli_query($link,"select * from issue_books where username='$_SESSION[username]'");
                                  while($row=mysqli_fetch_array($res))
                                 {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["enrollmentno"]; echo "</td>";
                                    echo "<td>"; echo $row["bookname"]; echo "</td>";
                                    echo "<td>"; echo $row["book_issue_date"]; echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                                  </table>
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
       