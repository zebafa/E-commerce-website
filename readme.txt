E-COMMERCE WEBSITE

ROLES AND RESPONSIBILITIES
------------------------------
Super advertisement
     Manage the platform-MVP(user experience, best UI, best graphics, high performance loading etc....) everything comes under this.
     Manage the user 
        Onboard
        Remove
      Payment Gateway Integration(Multiple paynment options).
Vendor
   Authentication(Authentication is a public url only vendor or customer used to signup superadmin doesnot need any signup that is outside of the product
    inside the product the signup work for vendor and customer. Admin management and super admin login is entirely different thing actually no one can signup in superadmin
    it should be unbothered by another admin person scope that is outside of the product scope. they should be manually added by the databse admin to the db)
     Signup
        UI
         HTML   
           Username
           Password
           Retype Password
           usertype
           (mail,Address details,pan,bank details, aadhaar,mobile,etc....)
          JS 
            validate both the passwowrds are same then submit to API
       API 
          Collect username,password,usertype
          hash password
          Connect to DB
          Write username,hashed password,usertype into DB  
       DB
         (in database we need to have thee same columns as )
         user table 
             user id - int - AI(automatically incremented)
             username - varchar(80) - unique
             password - varchar(100)
             usertype - varchar(15)
             created date - timestamp - current_timestamp 
             //modified date
      Login 
        UI
        API 
        DB 
   Manage the product - MVP
      Add (image, price details, titles,view, search edit, delete,discriptionetc...) - DONE
        
        UI
           HTML
              multipart/formadate  
              name
              price
              details
              image file(this image file cannot upload with normal form you need multi part form)
        API
         collect the product details 
         collect the product image
         move the product image from tmp folder into relevent folder path 
         save product details and imagepath into database
        DB
          create table product
           pid - AI primary
           name - varchar(100)
           price - float 
           details - text (a description maybe lengthy paragraph)
           image - varchar(200)   (since we are going to store the imagepath of the server 
           & not going to store the image into the database, the location or path we are going to store)
           owner - int forign key(fk)_userid 
           created_date - timestamp default current_stamp 
       
      view - DONE
      search 
      Edit - TASK
      Delete - DONE
   Manage the Orders
       View Order - MVP
       Assigned order to delivery partner 
       Track the Order
Customer
    Authentication
    View products - MVP
    Search products
    Compare products
    Manage the Cart - MVP
       Add
       View
       Edit
       Delete 
    Place Order - MVP
       Cash on delivery - MVP
       Online payment 
       Track order
    Reiview of product 
    Refund of product
Delivery partner
   View Assigned order 


MVP of a product: 
An MVP(Minimum viable product) for an e-commerce website is a basic version of the platform that includes 
only the essential features needed to test the core functionality, attract early users and validate the 
product idea. The is to launch quickly, gather feedback and make improvements based on the real world usage.
-------------------------------------------------------------------------
In input we added the class called form-control . it is a bootstrap class which will enlarge the input to occupy the full space 
Adding to div to button because text-centre doesn't work in display inline-block element 
to make bjtton centre we need display block element

print_r()
syntax:
(mixed $value, bool $return = false)
@param mixed $value — The expression to be printed.

print_r($_POST) becaause the method is in post method in signup.html and action to signup.php, giving validation to all inputs & select by required so that it should not submit the empty forms


mysqli():
syntax:
(?string $hostname = null, ?string $username = null, ?string $password = null, ?string $database = null, ?int $port = null, ?string $socket = null)
@param string $hostname
[optional] Can be either a host name or an IP address. Passing the NULL value or the string "localhost" to this parameter, the local host is assumed. When possible, pipes will be used

----------
Bachground colors: info, primary, secondary, danger, warning.
-------------
print_r is used to print array
echo is only able print a string, I cannot echo array
-> this is a dot operator in php points to means sql_result.num_rows
sql_result is object and num_rows is key that is a value that is property
-------------
header:
(string $header, bool $replace = true, int $response_code = 0)
@param string $header
The header string.

There are two special-case header calls. The first is a header that starts with the string "HTTP/" (case is not significant), which will be used to figure out the HTTP status code to send. For example, if you have configured Apache to use a PHP script to handle requests for missing files (using the ErrorDocument directive), you may want to make sure that your script generates the proper status code.

The second special case is the "Location:" header. Not only does it send this header back to the browser, but it also returns a REDIRECT (302) status code to the browser unless the 201 or a 3xx status code has already been set.
------------------------------------------------------------------------------------
SESSION:
Session is a only variable in php, mostly in any language sesssion is used to pass data between multiple server pages 
The session will actually store some data in to temporary file in php & it will hold login_status. 
it store in drive-> xamp->temp 
usually session will be store in this temp.
In login started the session updated a new variable login_status the value of a login_status is false.
Once the num of rows>0 the login_status is true & inside the home.php now i can use the session_start() then i can use the session variable login_status 
& i can check if the login_status is false then echo unAuthoprized Access then die. die means never proceed.
in login I am setting the session and in home I am checking the session. So, session is kind of a global variable 
to pass the dataacross multiple pages, but it is not a very good practise this is a starting and intermediate level practise
but if you go i  proffessional environment the sessions will be client side session not server side session.
Server side session is little rigid and cannot be used for lot of customer applications. actually we need to use "JWT token" in different authentication mechanism.
Mostly JWT token is a standardize one (JAVASCRIPT WEB TOKEN). so try to learn about "JWT tokens".

isset(): isset is a php function to check whether the variable is declared or not.
isset( mixed $var [, mixed $... ])
Determine if a variable is declared and is different than NULL.
First we are checking session is created login_status available, if it is available what it's value we are checking two things.
if we nerver attempted the login there won't be session at all.  if attempted the login & gave wrong crendentials there will be a session but status value will be false.
and the sesiion will be inside the cdrive->xamp->temp it will  be in server so no one can access it. In this way we protected the route in home.php by saving 
the session details.


In customer there will be security threat if we see the 3 files login, customer home and vendor home 
there is a security threat here. if we apply same logic to customer 
if we login and give a wrong password then i could not login to vendor home and also i could not login to the customer home.
It shows Unauthorized access to vendor home and Unauthorized access to customer homebecausse login is failed.
If I am login as vendor with correct password it is redirecting to the vendor home,
also it is redirecting to the customer home. As per the logic it should not redirect to the customer home
because the login is a  vendor. Customer  is redirecting because we checked the login status and the login
status is true even for customer and vendor that is the problem and it is a threat.
The logic is single login_status is not enough to stop the customer and vendor validation.
customer home should not work but it is working to prevent this we need to know which usertype is actually logedin 
we are not going to store the only login_status in session  we are going to store the usertype also 
usertype is from dbrow after fetching from dbrow. so, whatever the result we are getting we are updating that usertype
into the session now in vendor i will check whether the usertype is vendor and customer i will check whether the usertype is customer.
Now the vendor home is protected not only with login_status but also with the usertype.
------------
enctype="multipart/form-data : without this we cannot pass the files because file is not a data it is chunk
it is a binary raw file so, it will  be converted into multiple  chunks send it in different encoding.
----------------
$source=$_FILES['pdtimg']['tmp_name'];
$target=$_FILES['pdtimg']['name'];
this is from the upload.php file code as I'm not giving any path for the file to locate the file will
be stored in the server path or uploaded inthe vendor folder.
$target="../shared/images/".$_FILES['pdtimg']['name'];
now there is a path the will be uploaded in the given path that is images folder in shared folder 
here .(dot) is for concatenation as in other languages like java + i sfor concatenation here . is for concatenation
----------
move_uploaded_file():
SYNTAX:
(string $from, string $to)
@param string $from — The filename of the uploaded file.
--------------
connection.php file in shared folder purpose is to make the connection
instead of rewriting $conn=new mysqli("localhost","root","","acmeintern",3306);
we are including include "../shared/connection.php";
---------------
we need to start the session in every file before using it.


Cart : this will store the relationship between user and product
in cart table we will have the cartid,userid and pid
it is going to maintain a relationship between who added what 
-----------------------------------------------------------------------
DATABASE FOR CART:
 select * from cart;
 select * from cart join product on cart.pid=product.pid;
 after adding the css just refresh the page to get the output.
 ----------------------------------------------
 haveto remove the product  this follows the same principle of delete the product in vendor side 
 where we neeed to create a delete product and delete cartphp function we need to paas 
 the productid to delete the product but if we want to delete a cart item instead of productid we need 
 to paas the cartid 
 ---------------
 in delete product we passed the productid to the delete product to delete it but to delete a item from cart
 i cannot paas the productid.
 every user has the productid in the same cart so that means productid is duplicated in the same cart 
 i can have the same productid multiple times dor different users so that is not unique
  the basic rule to delete is to get the unique id.
  in product table productid is the unique id but in cart table productid is going to repeated for multiple users.
  the same product multiple users can purchase or added to the cart so we cannot use the productid
  therefore cartid is unique column in cart table while deleting  or clicking the remove from cart button we need to paas the
  cartid to delete cart php function from that it is just a simple execution of query that is it.
   
 TASK:
 view order and place order is a task
 ----------------------------------------
<?php
$pid = $_GET['pid'];
include "authguard.php";
include "../shared/connection.php";

mysqli_query($conn, "INSERT INTO car
t(userid, pid) VALUES($_SESSION[userid], $pid)");
echo $pid;

header("location:viewcart.php");
?>
----------------------------
<?php
$pid=$_GET['pid'];
include "authguard.php";

include "../shared/connection.php";

mysqli_query($conn,"insert into cart(userid,pid) values($_SESSION[userid],$pid)");

header("location:viewcart.php");

?>
------------------------------------------
Raahil code:
<?php
$pid = $_GET['pid'];
include "authguard.php";
include "../shared/connection.php";

mysqli_query($conn, "INSERT INTO cart(userid, pid) VALUES($_SESSION[userid], $pid)");
echo $pid;

header("location:viewcart.php");
?>
-----------------------------
viewcart Raahil code:
<?php
include "authguard.php"; 
include "../shared/connection.php";
$userid = $_SESSION['userid']; 

// Fetch the cart items for the current user
$query = "SELECT product.name, product.price, product.impath 
          FROM cart 
          INNER JOIN product ON cart.pid = product.pid 
          WHERE cart.userid = $userid";

$sql_result = mysqli_query($conn, $query);

if (mysqli_num_rows($sql_result) > 0) {
    echo "<h2>Your Cart</h2>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>Product</th><th>Price</th><th>Image</th></tr></thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($sql_result)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['price']} Rs</td>";
        echo "<td><img src='{$row['impath']}' alt='{$row['name']}' width='100' height='100'></td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Your cart is empty.</p>";
}

mysqli_close($conn);
?>
-----------------------------------------
 echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['price']} Rs</td>";
        echo "<td><img src='{$row['impath']}' alt='{$row['name']}' width='100' height='100'></td>";
        echo "</tr>";
















