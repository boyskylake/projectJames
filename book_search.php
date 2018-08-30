<?php
	$itemname = $_POST['itemname'];
	$booksearch = $_POST['booksearch'];
	if ($booksearch == 1) {
		$bookselect = 'book_BookName';
	}
	if ($booksearch == 2) {
		$bookselect = 'book_Author';
	}
	if ($booksearch == 3) {
		$bookselect = 'book_Heading1';
	}
	if ($booksearch == 4) {
		$bookselect = 'book_Publisher';
	}
	if ($booksearch == 5) {
		$bookselect = 'book_ISBN';
	}
	if ($booksearch == 6) {
		$bookselect = 'book_Initials';
	}
	// echo $itemname;
	// echo $booksearch;

	include 'includes/config.php';
	$sql = "select * from book where ".$bookselect." like '%{$itemname}%'";
	$query = mysqli_query($conn,$sql);

    $Num_Rows1 = mysqli_num_rows($query);

    // $Per_Page1 = 9;   // Per Page
    // if (isset($_GET["Page1"])) {
    //   $Page1 = $_GET["Page1"];
    // }

    // if(!isset($_GET["Page1"]))
    // {
    //   $Page1 = 1;
    // }

    // $Prev_Page1 = $Page1 - 1;
    // $Next_Page1 = $Page1 + 1;

    // $Page_Start1 = (($Per_Page1*$Page1)-$Per_Page1);
    // if($Num_Rows1<=$Per_Page1)
    // {
    //   $Num_Pages1 =1;
    // }
    // else if(($Num_Rows1 % $Per_Page1)==0)
    // {
    //   $Num_Pages1 =($Num_Rows1/$Per_Page1) ;
    // }
    // else
    // {
    //   $Num_Pages1 =($Num_Rows1/$Per_Page1)+1;
    //   $Num_Pages1 = (int)$Num_Pages1;
    // }

    // $sql.=" order  by book_id desc LIMIT $Page_Start1 , $Per_Page1";
    // $querynum  = mysqli_query($conn,$sql);


    echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
    $intRows1 = 0;
    while($resutCat=mysqli_fetch_array($query))
    {
      echo "<td>"; 
      $intRows1++;
?>

      <table cellspacing="10" cellpadding="5" width="100%">
          <tbody>
            <tr>
              <td height="255" valign="top">
              <table width="126" height="100" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><img src="img/<?php
                      if($resutCat['book_Picture'] != '')
                      {
                      echo $resutCat['book_Picture'];
                      }
                      else
                      {
                      echo"empty.gif";
                      }
                      ?>" width="195" height="123" border="0"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
                  <br />
                  <b>
                  <font size="2">
                    <?php echo $resutCat["book_BookName"];?>
                    </font></b><br />

                  <font color="#999999" size="2">
                  เวลา :<?php echo $resutCat["book_DateOfIssue"];?>
                </font><br />
                  <font size="2">
                    <?php echo  $message = substr($resutCat['book_Initials'],0,40)."&nbsp;..."; ?>
                  </font><br />
                  <font  size="2"><a href="javascript:getpopup('<?php echo $resutCat['book_id']; ?>');">ดูรายละเอียด...</a></font> </td>
            </tr>
          </tbody>
        </table>
        <?php
        echo"</td>";
      if(($intRows1)%3==0)
      {
        echo"</tr>";
      }
    }
    echo"</tr></table>";
    ?>
     <script type="text/javascript">
    function getpopup(id) {
      window.open('view_book.php?book_id='+id,'','width=700, height=700, scrollbars=yes, resizable=no');
    }

    function updateValue(value){
    // this gets called from the popup window and updates the field with a new value
    // document.getElementById(pid).value = value;
    window.location='Order.php?book_id='+value;
    }
  </script>