<?php


// https://webdesignerhut.com/pass-data-with-ajax-to-a-php-file/
//https://stackoverflow.com/questions/3897396/can-a-table-row-expand-and-close


class Page{
    static public $title = "CSIS 3280: Final Project";

    public static function header(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?php echo self::$title ?></title>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
            
            <style>
                
            table{
                margin-top: 15px;
            }
            </style>
        
        </head>
        <body>
        
        <?php   
        }

    static function searchForm(){
        ?>

        <div class="container" style="width:500px; margin-left:5%;;">
            <form method="POST">
                <input type="text"  style="width:80%; margin-top:5%;" id="search" name="search" placeholder="Enter a search term..." />
                <input type="submit" class="btn btn-primary" value="Search" />
            </form>
            <div id="productList" style="width:80%">
            </div>
        </div>
    <script>
        //making an ajax call every time the value in search box changes
        $(document).ready(function(){
            $("#search").attr('autocomplete','off');
            $("#search").keyup(function(){
                var query = $(this).val();
                if(query != ''){
                    $.ajax({  
                        url:"search.php",  
                        method:"POST",  
                        data:{query:query},  
                        success:function(data)  
                        {  
                            console.log(data);
                            $('#productList').fadeIn();  
                            $('#productList').html(data);  
                        }  
                    });
                }
            });
            
            //seacrh bar is given the value of clicked list item
                $(document).on('click', 'li', function(){  
                $('#search').val($(this).text());  
                $('#productList').fadeOut();  
            });
        });
        </script>
        <?php
    }

    static function prodAddMessage($prod){
        //var_dump($prod);
        
        /*<div class="alert alert-info fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            The '.$prod->pname.' was successfully added to your cart.
        </div>
        echo '<div class="card-panel #fff9c4 yellow lighten-4"> The '.$prod->pname.' was successfully added to your cart.</div>';
        */

        echo '<div style="margin-top: 25px" class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        The '.$prod->pname.' was successfully added to your cart.</div>';
        
    }

    static function orderSubmitted(){

        echo '<div " class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        You order was submitted successfully</div>';
    }

    static function checkoutBtn(){
        ?>
        <button class = "btn btn-primary" style="float:right; margin-right:5%; margin-top: -2.5%;" id="checkout">Checkout</button>
        <script>
            var btn = document.getElementById('checkout');
            btn.addEventListener('click', function() {
                document.location.href = 'Checkout.php';
            });
        </script>
        <?php
    }

    static function logout(){
        ?>
        <div class="container" style="margin:0px; width:100%; padding: 20px; background-color: black;">
            <img src = "images/cart.png" style="float:left; width:100px; height: 100px">
            <a href="?action=logout" style ="float:right" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
        </div>
        <?php
    }

    static function SubmitOrder(){
        
        // <button id="submitOrder">Order</button>
        // <script>
        //     var btn = document.getElementById('submitOrder');
        //     btn.addEventListener('click', function() {
        //         document.location.href = 'SubmitOrder.php';
        //     });
        // </script>
        echo '<div class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <p>Please enter the shipping address and verify your order is correct.</p></div>';

        
        
        ?>

        <div class="container" style="width:500px; margin-left:5%;;">
            <form method="POST">
                <input type="text"  style="width:80%; margin-top:5%;"  name="address" placeholder="Enter your address..." />
                <input type="submit" class="btn btn-primary"  />
            </form>
            <div id="productList" style="width:80%">
            </div>
        </div>
        <?php
    }

    static function instructionsCustomer($customer){
        ?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Hello <strong><?php echo $customer?> </strong>
        </div>  
        <div class="alert alert-info fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Select items to add to your shopping cart. Press the checkout button when you're ready.
        </div>
        <?php
        
    }

    public static function showLogin(){
        ?>
        <div class="container" style="margin-top: 100px;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-3" align="center">
                    <img src="images/logo.jpeg" style="height:200px; width:400px;"><br><br>
                    <form method="post" action="">
                        <input class="form-control" name="username" type="text" placeholder="Username..." required><br>
                        <input class="form-control" minlength="5" name="password" type="password" placeholder="Password..." required><br>
                        <p>New user? <a href="register.php">Sign Up Here</a></p><br>
                        <input class="btn btn-primary" name="submit" type="submit" value="Log In"><br>
                    </form>
                </div>
            </div>
	    </div>
        <?php
    }
    public static function showSignUp(){
    ?>    
        <div class="container" style="margin-top: 100px;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-3" align="center">
                    <img src="images/logo.jpeg" style="height:200px; width: 400px"><br><br>
                    <form method="post" action="">
                        <input class="form-control" name="username" type="text" placeholder="Username..." required><br>
                        <input class="form-control" minlength="5" name="password" type="password" placeholder="Password..." required><br>
                        <input class="form-control" minlength="5" name="cPassword" type="password" placeholder="Confirm Password..."><br>
                        <select class="form-control" name="type" id ="userType" required>
                            <option value="customer" selected>Customer</option>
                            <option value="manufacturer">Manufacturer</option>
                        </select><br> 
                        <div id ='manForm'></div>
                        <p>Already a Member?<a href="login.php">SignIn</a></p>
                        <input class="btn btn-primary" name="submit" type="submit" value="Register..."><br>
                    </form>

                </div>
            </div>
	    </div>
    <?php    
    }
    public static function showManufForm(){?>
        <form method="post" action="">
            <input class="form-control" minlength="5" name="mname" type="text" placeholder="Manufacturer Name..." required><br>
            <input class="form-control" minlength="5" name="mdescription" type="text" placeholder="Manufacturer Description..."><br>
        </form>

    <?php
    }

    static function prodAddForm(){
        ?> 
        <div  class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
         You may modify your offered products by adding one through the form or by deleting a product from your list.
        </div>       
         
        <div class="conatiner" style="width:60%; margin-left:25%">   
            <form method="POST">
                <label for="name"><h6>Product Name</h6></label><br>
                <input type="text" class="form-control" id="name" name="name" /><br>

                <label for="type"><h6>Type </h6></label>
                <input type="text" class="form-control" id="type" name="type" /><br>

                <label for="description"><h6>Description</h6></label></br>
                <textarea rows="5" cols="110" id="description" name="description"/></textarea><br>

                <label for="price"><h6>Price</h6></label></br>
                <input  class="form-control" type="text" id="price" name="price" /><br>
                
                <input class= "btn btn-primary" type="submit" value="Add" />
            </form>
          </div>  
        <?php
    }

    //Print the products offered by the manufacturer - SANL July 29, 2018
    static function manufacturerProds(){
        $prodCount = 0;
        $manufacturer = $_SESSION['username'];
        $products = ProductMapper::getProdsByManu($manufacturer);

        ?>
        
        
        
            <?php  
        if($products == NULL){
            ?> 
            <div class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                Your <strong>product list</strong> is empty.
            </div>
            <?php
        } else{?>
            <table class="table table-striped" style="margin-top:2%"> 
            <tr><th>Name</th><th>Type</th><th>Description</th><th>Price</th><th></th></tr>
            <?php
            foreach($products as $prod){
                $prodCount++;
                echo '<tr>';
                echo '<td>'.$prod->pname.'</td>';
                echo '<td>'.$prod->type.'</td>';
                echo '<td>'.$prod->pdescription.'</td>';
                echo '<td>'.$prod->price.'</td>';
                echo '<td><a href="?action=delete&id='.$prod->pid.'">Delete</a></td>';
                echo '</tr>';
            }
            echo '</table>';
            
        }
        ?> 
        <div class="alert alert-info fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            You offer a total of <strong><?php echo $prodCount ?> </strong> Products.
        </div>
        <?php

    }
    
    

    //Print a table with the available products. If a search term is provided, print the corresponding table. - SANL July 26, 2018
    static function offeredProd($searchTerm = null){
        $prodCount = 0;
        $products = ProductMapper::prodSearch($searchTerm);
        
        ?>
        <table class="table table-striped" style="margin-top:2%"> 
            <tr><th>Name</th><th>Type</th><th>Description</th><th>Manufacturer</th><th>Price</th><th></th></tr>
        <?php
    
        foreach($products as $prod){
            $prodCount++;
            $man = ManufacturertMapper::manufacturers($prod->manufacturer);

            echo '<tr>';
            echo '<td>'.$prod->pname.'</td>';
            echo '<td>'.$prod->type.'</td>';
            echo '<td>'.$prod->pdescription.'</td>';
            echo '<td><a href="#" id="show_'.$prodCount.'" >'.$prod->manufacturer.'</a></td>';
            echo '<td>'.$prod->price.'</td>';
            echo '<td><a href="?action=add&id='.$prod->pid.'">Add</a></td>';

            echo '</tr>';

            // this is the hidden row that will be shown when the click event happen- Vania Oliveira July 30, 2018
            echo '<tr>
            <td colspan="5" style="border:none" >
                <div id="info'.$prodCount.'" style="display: none;">
                    <li>Adiministrator: '.$man->admin .'</li>'.'
                    <li>Manufacturer name: '.$man->mname .'</li>'.'
                    <li>Manufacturer Details: '.$man->mdescription .'</li>'.'

                </div>
            </td>
        </tr>';
        
        }
        echo '</table>';

        if(isset($searchTerm)){
            echo $prodCount.' products matched your search criteria.';
        } else{
            echo '<p><b>We offer a total of '.$prodCount.' products.</b></p>';
        }
    }
    

    //Print out the cutomer's cart based on the info stored in the session. - SANL July 28, 2018
    static function printCart($cart){
        $prodCount = 0;

        ?>
        <table class="table table-striped" style="margin-top:2%">  
            <tr><th>Name</th><th>Type</th><th>Description</th><th>Manufacturer</th><th>Price</th><th>Quantity</th><th></th></tr>
        <?php
        foreach($cart as $prod){ //Where prod is the array with the product id and quantity - SANL July 28, 2018
            $product = ProductMapper::getProdById($prod[0]);
            $man = ManufacturertMapper::manufacturers($product->manufacturer);
            $prodCount++;
            echo '<tr>';
            echo '<td>'.$product->pname.'</td>';
            echo '<td>'.$product->type.'</td>';
            echo '<td>'.$product->pdescription.'</td>';
            echo '<td> <a href="#" id="show_'.$prodCount.'" >'.$product->manufacturer.'</td>';
            echo '<td>'.$product->price.'</td>';
            echo '<td>'.$prod[1].'<td>';
            echo '<td><a href="?action=remove&id='.$product->pid.'">Remove</a></td>';
            echo '</tr>';



            // this is the hidden row that will be shown when the click event happen- Vania Oliveira July 30, 2018
            echo '<tr>
            <td colspan="5" style="border:none" >
                <div id="info'.$prodCount.'" style="display: none;">
                    <li>Adiministrator: '.$man->admin .'</li>'.'
                    <li>Manufacturer name: '.$man->mname .'</li>'.'
                    <li>Manufacturer Details: '.$man->mdescription .'</li>'.'

                </div>
            </td>
        </tr>';
        }
        echo '</table>';
        echo '<p><b>There are '.$prodCount.' products in your order.</b></p>';
    }

    static function footer(){
        ?>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
        <script>

       //this jquery will detect a click event in a link and will show the hidden roll - Vania Oliveira July 30, 2018
         $("a").click(function(event) {
            //var clickedItem= "#"+event.target.id;
            var hiddenRow = "#info"+event.target.id.substr(9,1);;
                        $(hiddenRow + $(this).attr('id').substr(7)).slideToggle("slow");
                        event.preventDefault();

                        $(hiddenRow + $(this).attr('id').substr(5)).slideToggle("slow");
                        event.preventDefault();
                        
            });

        

        //this jquery will show the form for the manufacturer - Vania Oliveira July 30, 2018
        $(document).ready(function(){
            $('#userType').change(function(){
                var selectedUsertype = $('#userType').val();
                console.log(selectedUsertype);

                if(selectedUsertype == 'manufacturer'){
                    console.log(selectedUsertype);

                    $.ajax({  
                        type: 'post',  
                        data: {action: 'show'},
                        url: 'inc/showForm.php', 
                        success: function(output) {
                            $('#manForm').html(output);
                            $('#manForm').show();
                        }
                    });
                }
                else{
                    $('#manForm').hide();

                }
            });

        })

                    
            </script>
           
        </body>
        </html>
        <?php
    }
    
}
?>