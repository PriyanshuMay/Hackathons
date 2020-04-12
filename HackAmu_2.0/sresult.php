<?php session_start(); ?>
<?php
//include("essentials/script.php");
include("header.php");
include("essentials/database.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="forum.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        @media only screen and (max-width:480px ) {
        body{
        margin:0;
        height: 100%;
        padding-right: 10%;
        padding-left: 10%;
        overflow-y: scroll;
        background-color:#f3f7f7 ;
        }
        body::-webkit-scrollbar {
        display: none;
        }
        #top_button_index {
        font-family:bold;
        display: none;
        align-content: center;
        box-shadow: 0 0 5px gray;
        position: fixed;
        bottom: 10px;
        right: 10px;
        z-index: 99;
        font-size: 25px;
        border: none;
        outline: none;
        background-color:  #4CAF50;
        color: white;
        cursor: pointer;
        padding: 15px;
        font-family:courier new;
        border-radius: 50%;
        }
        #top_button_index:hover {
        background-color:  #833AB4;}
        
        }
        @media only screen and (min-width:481px) {
        body{
        overflow-y: scroll;
        background-color:#f3f7f7 ;
        padding-left: 25px;
        padding-right: 80px;
        }
        body::-webkit-scrollbar {
        display: none;
        }
        .collapsible {
        background-color: white;
        cursor: pointer;
        width: 100%;
        padding: 50px;
        border: none;
        border-radius: 4px;
        text-align: left;
        font-size: 15px;
        }
        .content {
        padding: 0 18px;
        display: none;
        overflow: auto;
        background-color:;
        }
        
        #title{
        line-height: 1.5;
        color: #333;
        tab-size: 4;
        word-break: break-word;
        text-align: left;
        direction: ltr;
        user-select: text;
        font-size: 25px;
        font-family: Courier new ;
        }
        #anstitle{
        line-height: 1.5;
        color: black;
        tab-size: 4;
        word-break: break-word;
        text-align: left;
        direction: ltr;
        user-select: text;
        font-size: 15px;
        font-family: Courier new ;
        }
        #specs{
        font-size:12px;
        font-family: courier new ;
        font-weight: bold;
        color: #833AB4;
        }
        #details{
        font-weight: bold;
        color: red;
        font-size:12px;
        }
        #answer_box{
        padding:10px;
        padding-bottom: 20px;
        background-color: white;
        width: 97%;
        height: auto;
        }
        #answer_box:hover {
        background-color: white;
        }
        #maintitle{
        line-height: 1.5;
        color: red;
        tab-size: 4;
        word-break: break-word;
        text-align: left;
        direction: ltr;
        user-select: text;
        font-size: 25px;
        font-family: Courier new ;
        }
        #details{
        font-weight:bold;
        color: red;
        font-size:12px;
        }
        #content{
        font-weight:;
        color: #222;
        font-size:20px;
        }
        #top_button_index {
        font-family:bold;
        display: none;
        align-content: center;
        box-shadow: 0 0 5px gray;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 25px;
        border: none;
        outline: none;
        background-color:  #4CAF50;
        color: white;
        cursor: pointer;
        padding: 15px;
        font-family:courier new;
        border-radius: 50%;
        }
        #top_button_index:hover {
        background-color:  #833AB4;}
        }
        </style>
    </head>
    <body>
    <?php
include("essentials/database.php");
?><?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 1;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
       
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con,"SELECT * FROM questions
            WHERE (`content` LIKE '%".$query."%') OR (`title` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             echo '<form method="post" action="viewcomplaint.php">
             <button type="submit" class="collapsible"> <center><br></center>
             <center><span id="maintitle" style="">'.$results["title"].'</span><br>
             <span id="content" style="">'. $results["content"].'</span></center><br>
             <br><span id="specs">&emsp;&emsp;&emsp;&emsp;Offered by </span>&emsp;<span id="details">'.$results["username"].'</span>&emsp;
             <span id="specs">&emsp;&emsp;Quantity</span> &nbsp;<span id="details">'. $results["officer"].'</span>
             <span id="specs">&emsp;&emsp;&emsp;Type&nbsp;</span><span id="details">'. $results["department"].'</span> &emsp;
             &emsp;&emsp;<span id="specs">&emsp;&emsp;Contributer is a resident of</span> &nbsp;<span id="details">'. $results["locality"].'
             &emsp;<span id="specs">&emsp;&emsp;&emsp;Posted on</span> &nbsp;<span id="details">'. $results["datetym"].'</span>
             <input type="hidden" name="id" value="'. $results["id"].'"/>
             </button><br>
         <br></form>';
            }
             
        }
        else{ // if there is no matching resultss do following
            echo "<script>
            alert('No results were found');
            document.location='index.php';
            </script>";
        }
         
    }
    else{ // if query length is less than minimum
        echo "<script>
            alert('One character is must');
            document.location='index.php';
            </script>";
    }
?>
 <button onclick="topFunction()" id="top_button_index" title="Go to top">UP</button>
        <script>
        var mybutton = document.getElementById("top_button_index");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
        } else {
        mybutton.style.display = "none";
        }
        }
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
        </script>
        <br><br>
    </body>
</html>