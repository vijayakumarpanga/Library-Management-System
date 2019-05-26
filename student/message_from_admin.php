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
        mysqli_query($link,"update messages set read1='y' where dusername='$_SESSION[username]'");

      ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Messages from Admin</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class='table table-bordered'>
                                    <tr>
                                        <th>Name</th>
                                        <th>title</th>
                                        <th>message</th>
                                    </tr>
                                    <?php 

                                    $res2=mysqli_query($link,"select * from messages where dusername='$_SESSION[username]' order by id desc ");
                                    while($row1=mysqli_fetch_array($res2))
                                    {
                                        $ress=mysqli_query($link,"select * from admi_registration where username='$row1[susername]'");
                                        while ($rows=mysqli_fetch_array($ress)) {
                                           $Name=$rows["firstname"]." ".$rows["lastname"];
                                        }
                                            
                                                echo "<tr>";
                                    echo "<td>"; echo $Name; echo "</td>";
                                    echo "<td>"; echo $row1["title"]; echo "</td>";
                                    echo "<td>"; echo $row1["msg"]; echo "</td>";
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
       