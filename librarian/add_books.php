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
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class ='table table-bordered'>
                                <tr>
                                    <td>
            
                             <input type="text" name="bname" class="form-control" placeholder="Bookname" required=""/>
                                
                                </td>
                            </tr>
                             <tr>
                                    <td>
                                Book Image
                             <input type="file" name="f1"   required=""/>
                                
                                </td>
                            </tr>
                             <tr>
                                    <td>
            
                             <input type="text" name="aname" class="form-control" placeholder="Authorname" required=""/>
                                
                                </td>
                            </tr>
                             <tr>
                                    <td>
            
                             <input type="text" name="pname" class="form-control" placeholder="Book Publisher Name" required=""/>
                              <tr>
                                    <td>
            
                             <input type="text" name="bprdate" class="form-control" placeholder="Book Purchase Date" required=""/>
                                
                                </td>
                            </tr>
                                
                                </td>
                            </tr>
                             <tr>
                                    <td>
            
                             <input type="text" name="bprice" class="form-control" placeholder="Book Price" required=""/>
                                
                                </td>
                            </tr>
                             <tr>
                                    <td>
            
                             <input type="text" name="bqty" class="form-control" placeholder="Book Quantity" required=""/>
                                
                                </td>
                            </tr>

                             <tr>
                                    <td>
            
                             <input type="text" name="aqty" class="form-control" placeholder="Available Quantity" required=""/>
                                
                                </td>
                            </tr>
                             <tr>
                                    <td>
            
                             <input type="submit" name="submit1" class="btn btn-default submit" value="Insert Book Details" style="background-color: blue; color:white"  />
                                
                                </td>
                            </tr>
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
        
<?php 
                if(isset($_POST["submit1"]))
                {
                    $P=$_SESSION[name];
                    $tm=md5(time());
                    $fnm=$_FILES["f1"]["name"];
                    $dst="./books_image/".$tm.$fnm;
                     $dst1="books_image/".$tm.$fnm;
                     move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);
                     mysqli_query($link,"insert into add_books
                (id,book_name,books_image,books_author_name,books_publication_name,books_purchase_date,books_price,books_qty,available_qty,admin_user_name) VALUES('','$_POST[bname]','$dst1','$_POST[aname]','$_POST[pname]','$_POST[bprdate]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]',
                '$P')");               
                   
                    ?>
                   <script type="text/javascript">

                    
                                      alert("books inserted successfully");
                   



                   </script>
                <?php
               }
                ?>
                
        <?php
            include "footer.php";
            ?>
       