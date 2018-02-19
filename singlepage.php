
<?php
$vorname = $_GET['id'];
$img = $_GET['img'];
$name = $_GET['name'];
$img = $_GET['img'];
$price = $_GET['price'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
    font-family: Arial;
    padding: 20px;
    background: #f1f1f1;
}

/* Header/Blog Title */
.header {
    padding: 30px;
    font-size: 40px;
    text-align: center;
    background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
    float: left;
    width: 75%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {

    width: 100%;
    padding: 20px;
}
.fakeimg img {

     margin: 5%;
}
.fakeimg1 img {

    width: 100%;
    padding: 20px;
}

/* Add a card effect for articles */
.card {
     background-color: white;
     padding: 20px;
     margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
    margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
}
</style>
</head>
<body>

<div class="header">
  <h2><?php echo "$name"; ?></h2>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2><?php echo "$name"; ?></h2>
      <h5><?php echo "$price"; ?></h5>
      <div class="fakeimg">
        <center class="container">
        <img src="<?php echo "$img"; ?>" >
        </center>
      </div>
      <hr>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    <div class="card">
      <h2>The Car location</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <hr>
      <div class="fakeimg1" style="height:150px;">
        <img src="img/1.png">
      </div>
      
    </div>
    <div class="card">
      <h3>Popular Car</h3>
      <div class="fakeimg1"><img src="img/5.png"></div><br>
      <hr>
      <div class="fakeimg1"><img src="img/9.png"></div><br>
      <hr>
      <div class="fakeimg1"><img src="img/8.png"></div>
      <hr>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>omar AL tayyar</h2>
</div>

</body>
</html>




 
 