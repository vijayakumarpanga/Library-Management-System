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
        include  "connection.php"
      ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                
                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>ISSUE BOOKS</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                            <select name="enr" class="form-control selectpicker">
                                                <?php
                                                    
                                                    $res=mysqli_query($link,"select enrollmentno from user_registration");
                                                    
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
                                                <input type="submit" value="search" name="submit1" class="form-control btn btn-default" style="margin-top:5px;">


                                            </td>

                                        </tr>


                                    </table>
                                    <?php
                                    if (isset($_POST["submit1"])) 
                                     {
                                       $ress=mysqli_query($link,"select * from user_registration where enrollmentno='$_POST[enr]'" );
                                       while($rows=mysqli_fetch_array($ress))
                                       {
                                        $firstname=$rows["firstname"];
                                        $lastname=$rows["lastname"];
                                        $username=$rows["username"];
                                        $email=$rows["email"];
                                        $contact=$rows["contact"];
                                        $sem=$rows["sem"];
                                        $enrollmentno=$rows["enrollmentno"];
                                        $_SESSION["enrollmentno"]=$enrollmentno;
                                        $_SESSION["username"]=$username;
                                       }
                                        ?>
                                         
                                    <table class ='table table-bordered'>
                                <tr>
                                    <td>
            
                             <input type="text" name="enrollmentno" placeholder="enrollmentno" value="<?php echo $enrollmentno;?>" disabled="" />
                                    </td>
                                     </tr>
                                       <tr>
                                    <td>
            
                             <input type="text" name="name" class="form-control"  placeholder="name" value="<?php echo $firstname.''.$lastname;?>" required="" />
                                    </td>
                                     </tr>
                                       <tr>
                                    <td>
            
                             <input type="text" name="sem" class="form-control" placeholder="sem" value="<?php echo $sem;?>" required="" />
                                    </td>
                                     </tr>
                                       <tr>
                                    <td>
            
                             <input type="text" name="contact" class="form-control" placeholder="contact" value="<?php echo $contact;?>" required="" />
                                    </td>
                                     </tr>
                                   <tr>
                                    <td>
            
                             <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email;?>" required="" />
                                    </td>
                                     </tr>
                                  <tr>
                                    <td>
            
                             <select name="bookname" class="form-control selectpicker">
                                 <?php 
                                    $res=mysqli_query($link,"select book_name from add_books");
                                    while ($row=mysqli_fetch_array($res)) 
                                    {
                                       echo"<option>";
                                       echo $row["book_name"];
                                       echo "</option>";
                                    }
                                  ?>
                             </select>
                                    </td>
                                     </tr>
                                              
                                       <tr>
                                    <td>
            
                             <input type="text" name="bookissuedate" class="form-control" placeholder="bookissuedate" value="<?php echo date("D-M-Y");?>" required="" />
                                    </td>
                                     </tr>
                                       <tr>
                                    <td>
            
                             <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username;?>" disabled="" />
                                    </td>
                                     </tr>
                                     <tr>
                                        <td>
                                             <input type="submit" value="ISSUE BOOKS" name="submit2" class="form-control btn btn-default" style="margin-top:5px;">


                                        </td>
                                    </tr>
                             </table>
                                 <?php

                                    }

                                    ?>

                                </form>
                                <?php
                                    if(isset($_POST["submit2"]))
                                     {  
                                        $qty=0;
                                        $res=mysqli_query($link,"select * from add_books where book_name='$_POST[bookname]'");
                                        while($row=mysqli_fetch_array($res))
                                         {
                                          $qty=$row["available_qty"];
                                         }
                                        if ($qty==0) 
                                        {
                                            ?>
                                                <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                                <strong style="color:white">
                                                    This book is out of stock
                                                </strong>
                                                 </div>

                                         <?php
                                        }
                                        else
                                        {

                
                                        mysqli_query($link,"insert into issue_books
                                            (id,enrollmentno,name,sem,email,contact,bookname,book_issue_date,book_return_date,username) 
                                            value('','$_SESSION[enrollmentno]','$_POST[name]','$_POST[sem]','$_POST[email]','$_POST[contact]','$_POST[bookname]',
                                            '$_POST[bookissuedate]','','$_SESSION[username]')");
                                        mysqli_query($link,"update add_books set available_qty=available_qty-1 where book_name='$_POST[bookname]'");
                                         ?>
                                        <script type="text/javascript">

                    
                                      alert("books issued successfully");
                   

                                        window.location.href=window.location.href;


                                         </script>
                                         <?php
                                     }

                                             
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
       