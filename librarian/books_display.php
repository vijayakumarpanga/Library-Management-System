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
include "connection.php";
?>
      <?php
        include "header.php";
      ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Disaplay books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php 
                                 $res=mysqli_query($link,"select * from add_books");
                                 echo "<table class ='table table-bordered'>";
                                
                                 echo "<tr>"; 

                                 echo "<th>"; echo "book name"; echo "</th>";
                                 echo "<th>"; echo "book image"; echo "</th>";
                                 echo "<th>"; echo "author name"; echo "</th>";
                                 echo "<th>"; echo "publication name"; echo "</th>";
                                 echo "<th>"; echo "purchase date"; echo "</th>";
                                 echo "<th>"; echo "book price"; echo "</th>";
                                 echo "<th>"; echo "books quantity"; echo "</th>";
                                 echo "<th>"; echo "available quantity"; echo "</th>";

                                 echo "</tr>";
                                 while($row=mysqli_fetch_array($res))
                                 {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["book_name"]; echo "</td>";
                                    echo "<td>"; ?> <img src="<?php echo $row["books_image"];?>" height=100 width=100> <?php echo "</td>";
                                    echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_purchase_date"]; echo "</td>";
                                    echo "<td>"; echo $row["books_price"]; echo "</td>";
                                    echo "<td>"; echo $row["books_qty"]; echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                    echo "</tr>";
                                 }
                                 echo "</table>";
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
       