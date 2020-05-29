<?php

require_once './config.php';
include './header.php';
/************************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 8;


try {
  $keyword = trim($_GET["keyword"]);
  if ($keyword <> "" ) {
    $sql = "SELECT * FROM tbl_contacts WHERE 1 AND "
            . " (first_name LIKE :keyword) ORDER BY first_name ";
    $stmt = $DB->prepare($sql);
    
    $stmt->bindValue(":keyword", $keyword."%");
    
  } else {
    $sql = "SELECT * FROM tbl_contacts WHERE 1 ORDER BY first_name ";
    $stmt = $DB->prepare($sql);
  }
  
  $stmt->execute();
  $total_count = count($stmt->fetchAll());

  $last = ceil($total_count / $page_limit);

  if ($pagenum < 1) {
    $pagenum = 1;
  } elseif ($pagenum > $last) {
    $pagenum = $last;
  }

  $lower_limit = ($pagenum - 1) * $page_limit;
  $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;


  $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";
  
  $stmt = $DB->prepare($sql2);
  
  if ($keyword <> "" ) {
    $stmt->bindValue(":keyword", $keyword."%");
   }
   
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
/************************/
?>
<div class="row">
<?php if ($ERROR_MSG <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
      <button data-dismiss="alert" class="close" type="button">×</button>
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>

  <div class="panel panel-primary" style="background-color:#B0C4DE">
    <div class="panel-heading"style="background-color:#B0C4DE">
      <h3 style="color:black" class="panel-title">CONTACT LIST</h3>
    </div>
    <div class="panel-body">

    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!-- search bar styling -->
    <style>
    * {
  box-sizing: border-box;
}

    form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 100%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: skyblue;
  color: white;
  font-size: 15px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}
.round-button{
  display: inline-block;
  text-decoration: none;
  width: 50px;
  border-radius: 50%;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
  transition: .4s;
}

.round-button:hover{
    background: #668ad8;
}
    </style>

      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
        <form action="index.php" method="get" class="example">
        <div class="col-lg-6 pull-left"style="padding-left: 0;"  >
          <span class="pull-left">  
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="search by first name" id="" class="form-control" name="keyword">
            </label>
            </span>
          <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
        </div>
        </form>
        
        <div class="pull-right" ><a href="contacts.php" class ="round-button"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span>+</button></a></div>
      </div>

      <div class="clearfix"></div>
<?php if (count($results) > 0) { ?>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered ">
            <tbody><tr>
                <th>Snap</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact No #1 </th>
                <th>Email </th>
                <th>Action </th>

              </tr>
  <?php foreach ($results as $res) { ?>
                <tr>
                  <td style="text-align: center;">
                <?php $pic = ($res["profile_pic"] <> "" ) ? $res["profile_pic"] : "no_avatar.png" ?>
                    <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" style="border-radius: 50%;border: 1px solid grey;"></a>
                  </td>
                  <td><?php echo $res["first_name"]; ?></td>
                  <td><?php echo $res["last_name"]; ?></td>
                  <td><?php echo $res["contact_no1"]; ?></td>
                  <td><?php echo $res["email_address"]; ?></td>
                  <td>
                    <a href="view_contacts.php?cid=<?php echo $res["contact_id"]; ?>"><button class="btn btn-sm btn-info" style="background-color:#1E90FF"onMouseOver="this.style.color='black'"
        onMouseOut="this.style.color='white'"><span class="glyphicon glyphicon-zoom-in"></span> View</button></a>&nbsp;
                    <a href="contacts.php?m=update&cid=<?php echo $res["contact_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><button class="btn btn-sm btn-warning" style="background-color:#D2691E"onMouseOver="this.style.color='black'"
        onMouseOut="this.style.color='white'"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;
                    <a href="process_form.php?mode=delete&cid=<?php echo $res["contact_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-sm btn-danger"  style="background-color:red"onMouseOver="this.style.color='black'"
        onMouseOut="this.style.color='white'"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
                  </td>
                </tr>
  <?php } ?>
            </tbody></table>
        </div>
        <div class="col-lg-12 center">
          <ul class="pagination pagination-sm">
  <?php
  //Show page links
  for ($i = 1; $i <= $last; $i++) {
    if ($i == $pagenum) {
      ?>
                <li class="active"><a href="javascript:void(0);" ><?php echo $i ?></a></li>
                <?php
              } else {
                ?>
                <li><a href="index.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                <?php
              }
            }
            ?>
          </ul>
        </div>

          <?php } else { ?>
        <div class="well well-lg">No contacts found.</div>
<?php } ?>
    </div>
  </div>
</div>
      <?php
      include './footer.php';
      ?>

